<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="container flex-grow-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#updateProfileModal">
                        Update Profile
                    </button>
                    <!-- Include the Update Profile modal -->
                    @include('profile.update-profile')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                        Change Password
                    </button>
                    <!-- Include the Change Password modal -->
                    @include('profile.change-password')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUserModal">
                        Delete Account
                    </button>
                    <!-- Include the Delete User modal -->
                    @include('profile.delete-user')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>