<div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
    x-on:livewire-upload-finish="isUploading = false" x-on:livewire-upload-error="isUploading = false"
    x-on:livewire-upload-progress="progress = $event.detail.progress">

    <!-- File Input -->
    <input type="file" wire:model="image">

    <!-- Progress Bar -->
    <div x-show="isUploading" class="progress">
        <div class="progress-bar" role="progressbar" :style="`width: ${progress}%`"></div>
    </div>

    <button wire:click="uploadImage" class="btn btn-primary">Upload</button>

    @error('image') <span class="error">{{ $message }}</span> @enderror

    @if (session()->has('message'))
    <div class="alert alert-success mt-3">
        {{ session('message') }}
    </div>
    @endif
</div>