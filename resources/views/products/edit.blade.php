<!-- resources/views/products/edit-modal.blade.php -->
@foreach ($products as $product)
<x-modal modalId="editProductModal{{ $product->id }}" modalTitle="Edit Product" formAction="true"
    formId="editProductForm{{ $product->id }}">
    <form id="editProductForm{{ $product->id }}" action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name{{ $product->id }}" class="form-label">Name</label>
            <input type="text" id="name{{ $product->id }}" name="name" class="form-control" value="{{ $product->name }}"
                required>
        </div>
        <div class="mb-3">
            <label for="price{{ $product->id }}" class="form-label">Price</label>
            <input type="number" id="price{{ $product->id }}" name="price" class="form-control" step="0.01"
                value="{{ $product->price }}" required>
        </div>
        <div class="mb-3">
            <label for="description{{ $product->id }}" class="form-label">Description</label>
            <textarea id="description{{ $product->id }}" name="description"
                class="form-control">{{ $product->description }}</textarea>
        </div>

        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>

    </form>
</x-modal>
@endforeach