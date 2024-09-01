@foreach ($posts as $post)
<x-modal modalId="editPostModal{{ $post->id }}" modalTitle="Edit Post">
    <x-post-form formId="editPostForm{{ $post->id }}" action="{{ route('posts.update', $post) }}" method="PUT"
        :post="$post" :fields="[
            ['label' => 'Title', 'name' => 'title', 'type' => 'text', 'required' => true, 'value' => $post->title],
            ['label' => 'Content', 'name' => 'content', 'type' => 'textarea', 'required' => true, 'value' => $post->content],
            ['label' => 'Image', 'name' => 'image', 'type' => 'file', 'required' => false, 'value' => $post->image],
            ]" buttonText="Update" />
</x-modal>
@endforeach