<x-modal modalId="changePasswordModal" modalTitle="Change Password">
    <form id="changePasswordForm" action="{{ route('password.update') }}" method="POST">
        @csrf
        @method('PUT')
        <!-- Include form fields for changing the password -->
        <div class="mb-3">
            <label for="current_password" class="form-label">Current Password</label>
            <input type="password" id="current_password" name="current_password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="new_password" class="form-label">New Password</label>
            <input type="password" id="new_password" name="new_password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
            <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control"
                required>
        </div>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary" form="changePasswordForm">Save</button>
    </form>
</x-modal>