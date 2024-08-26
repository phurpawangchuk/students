@include('layouts.header')

<div class="flex-grow-1 bg-gray-100">
    @include('layouts.navigation')

    <div class="container mt-4">
        <h1 class="mb-4">Products</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>${{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->description }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('layouts.footer')