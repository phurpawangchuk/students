<!-- resources/views/posts/show.blade.php -->
@include('layouts.header')
<div class="min-h-screen bg-gray-100">
    @include('layouts.navigation')
    <div class="container mt-4">
        <h1>post Details</h1>
        <div class="mb-3">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid">
        </div>
        <p><strong>Title:</strong> {{ $post->title }}</p>
        <p><strong>Description:</strong> {{ $post->content }}</p>
    </div>
</div>