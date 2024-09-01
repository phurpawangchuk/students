<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Post;
use App\Models\State;
use App\Models\City;
use Illuminate\Support\Facades\Auth;

class Posts extends Component
{
    use WithFileUploads;

    public $title, $content, $image, $gender, $state, $city, $user_id;
    public $posts = [];
    public $states = [], $cities = [];

    public function mount()
    {
        $this->posts = Post::all();
        $this->states = State::all();
        $this->user_id = Auth::id();
        $this->cities = City::all();
    }

    public function updated($field)
    {
        $validatedData = $this->validateOnly($field, [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gender' => 'required|in:M,F',
            'state' => 'required|exists:states,id',
            'city' => 'required|exists:cities,id',
        ]);

        // Clear the error message for the specific field after validation
        $this->resetErrorBag($field);
    }

    public function updatedState($value)
    {
        $this->cities = City::where('state_id', $value)->get();
    }

    public function createPost()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'gender' => 'required|in:M,F',
            'state' => 'required|exists:states,id',
            'city' => 'required|exists:cities,id',
        ]);

        $post = new Post();
        $post->title = $this->title;
        $post->content = $this->content;
        $post->user_id = $this->user_id;

        if ($this->image) {
            $filename = time() . '.' . $this->image->getClientOriginalExtension();
            $this->image->storeAs('public/images', $filename);
            $post->image = $filename;
        }

        $post->save();

        session()->flash('message', 'Post saved successfully.');

        // Reset form inputs and errors after successful submission
        $this->reset(['title', 'content', 'image', 'gender', 'state', 'city']);
        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.posts.index', [
            'states' => $this->states,
            'cities' => $this->cities,
        ])->layout('layouts.app')->with('debug', true);
        
    }

}