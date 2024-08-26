<x-modal modalId="deleteUserModal" modalTitle="Delete Account" data-bs-backdrop="static">
    <form id="deleteUserForm" action="{{ route('profile.destroy') }}" method="POST">
        @csrf
        @method('DELETE')
        <p>Are you sure you want to delete your account? This action cannot be undone.</p>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger" form="deleteUserForm">Delete</button>
    </form>
</x-modal>