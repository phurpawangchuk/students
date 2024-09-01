<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class SimpleForm extends Component
{
    use WithFileUploads;

    public $image;
    
    public function uploadImage()
    {
        $this->validate([
            'image' => 'required|mimes:jpg,jpeg,png,pdf|max:1024', // 1MB Max
        ]);

        $fileName = $this->image->store('uploads');
        session()->flash('message', 'File uploaded successfully!');
    }

    public function render()
    {
        return view('livewire.posts.simple-form');
    }
}