<div class="container mt-4">
    <div class="rounded-lg bg-white p-6">
        <table class="table table-dark table-hover w-100">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
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