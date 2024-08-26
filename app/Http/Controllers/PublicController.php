<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Post;
use App\Models\Product;
use App\Models\Student;


class PublicController extends Controller
{
    public function welcome()
    {
        $posts = Post::all();
        $products = Product::all();
        $students = Student::all();
        return view('welcome', compact('posts', 'products','students'));
    }
}