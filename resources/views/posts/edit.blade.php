@foreach ($posts as $post)
<x-modal modalId="editPostModal{{ $post->id }}" modalTitle="Edit Post" formAction="true"
    formId="editPostForm{{ $post->id }}">
    <form id="editPostForm{{ $post->id }}" action="{{ route('posts.update', $post) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $post->title }}" required>
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea id="content" name="content" class="form-control" required>{{ $post->content }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" id="image" name="image" class="form-control">
            @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" width="100" class="mt-2">
            @endif
        </div>

        <input type="hidden" name="user_id" value="{{ $post->user_id }}">

        <button type="submit" class="btn btn-primary">Update</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
    </form>
</x-modal>
@endforeach