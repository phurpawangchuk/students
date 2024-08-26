@include('layouts.header')

<div class="flex-grow-1 bg-gray-100">
    @include('layouts.navigation')

    <div class="container mt-4">
        <h1 class="mb-4">Products</h1>
        <x-authenticated-content>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#createProductModal">
                    <i class="fa fa-plus"></i> Create New Product
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
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    @if(Auth::check())
                    <th>Actions</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->description }}</td>

                    <x-authenticated-content>
                        <td>
                            <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm">Show</a>
                            @can('update', $product)
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                data-bs-target="#editProductModal{{ $product->id }}">Edit</button>
                            @else
                            <button class="btn btn-warning btn-sm" disabled>Edit</button>
                            @endcan

                            @can('delete', $product)
                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteProductModal{{ $product->id }}">Delete</button>
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
</div>

<x-authenticated-content>
    @include('products.create')
    @include('products.edit')
    @include('products.delete')
    @include('layouts.footer')
</x-authenticated-content>