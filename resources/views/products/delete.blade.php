@if(isset($product))
<x-modal modalId="deleteProductModal{{ $product->id }}" modalTitle="Confirm Delete">
    <p>Are you sure you want to delete <strong>{{ $product->name }}</strong>?</p>
    <form id="deleteProductForm{{ $product->id }}" action="{{ route('products.destroy', $product) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Yes, Delete</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
    </form>
</x-modal>
@else
<p class="mx-3">No product data available.</p>
@endif