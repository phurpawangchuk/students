<div class="flex-grow-1 bg-gray-100">
    <div class="container mt-4">
        <h1 class="mb-4">Post</h1>
        <x-authenticated-content>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#createPostModal">
                    <i class="fa fa-plus"></i> Create New Post
                </button>


            </div>
        </x-authenticated-content>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
        @endif

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <x-authenticated-content>
                        <th>Actions</th>
                    </x-authenticated-content>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->title }}</td>
                    <td>{{ Str::limit($post->content, 50) }}</td>
                    <td>
                        {{ $post->image }}
                        @if ($post->image)
                        <!-- <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" width="100"> -->
                        <img src="https://posts3image.s3.amazonaws.com/uploads/{{$post->image}}" alt="Post Image"
                            width="100">
                        @endif
                    </td>

                    <x-authenticated-content>
                        <td>
                            @can('update', $post)
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editPostModal{{ $post->id }}">Edit</button>
                            @else
                            <button class="btn btn-warning btn-sm" disabled>Edit</button>
                            @endcan

                            @can('update', $post)
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deletePostModal{{ $post->id }}">Delete</button>
                            @else
                            <button class="btn btn-danger btn-sm" disabled>Delete</button>
                            @endcan
                        </td>
                    </x-authenticated-content>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @include('livewire.posts.create', ['formId' => 'createPostModal'])

</div>