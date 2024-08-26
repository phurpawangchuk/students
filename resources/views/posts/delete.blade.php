@if(isset($post))
<x-modal modalId="deletePostModal{{ $post->id }}" modalTitle="Confirm Delete">
    <p>Are you sure you want to delete <strong>{{ $post->name }}</strong>?</p>
    <form id="deletePostForm{{ $post->id }}" action="{{ route('posts.destroy', $post) }}" method="POST">
        @csrf
        @method('DELETE')
        <p>Are you sure you want to delete this post?</p>
        <button type="submit" class="btn btn-danger">Delete</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
    </form>
</x-modal>
@else
<p class="mx-3">No post data available.</p>
@endif