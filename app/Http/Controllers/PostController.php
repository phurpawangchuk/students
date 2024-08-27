<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{
    use AuthorizesRequests;
     
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

  
public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation rules
    ]);

    $post = new Post();
    $post->title = $request->input('title');
    $post->content = $request->input('content');
    $post->user_id = Auth::id(); 

    if ($request->hasFile('image')) {
        // $file = $request->file('image');
        // $filename = time() . '.' . $file->getClientOriginalExtension();
        // $file->storeAs('public/images', $filename); // Store file in the 'public/images' directory
        // $post->image = $filename; // Save the filename to the database

        //  // Store the file - s3
        // $path = $request->file('image')->store('uploads', 's3');
        // $url = Storage::disk('s3')->url($path);

        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/images', $filename); 
        // Store the file on S3 with the custom filename
        $path = $file->storeAs('uploads', $filename, 's3');
        $url = Storage::disk('s3')->url($path);

        $post->image = $filename;
    }

    $post->save();

    return redirect()->route('posts.index')->with('success', 'Post created successfully.');
}

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        if (Gate::denies('update-post', $post)) {
            abort(403);
        }
    
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);
        
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->route('posts.edit', $post)
                ->withErrors($validator)
                ->withInput();
        }

        $imagePath = $post->image;
        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $post->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'image' => $imagePath,
        ]);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
         $this->authorize('update', $post);
        if ($post->image) {
            Storage::disk('public')->delete($post->image);
            Storage::disk('s3')->delete('uploads/'+$post->image);
        }
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}