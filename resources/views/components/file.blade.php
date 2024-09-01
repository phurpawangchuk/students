@props(['name', 'label', 'required' => false, 'value' => null])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input type="file" id="{{ $name }}" name="{{ $name }}" class="form-control" wire:model.defer="{{ $name }}"
        {{ $required ? 'required' : '' }}>

    @if($value)
    @if($value instanceof \Livewire\TemporaryUploadedFile)
    <!-- Display the temporary preview if available -->
    <img src="{{ $value->temporaryUrl() }}" alt="{{ $label }}" width="100" class="mt-2">
    @else
    <!-- Display the stored image if $value is a path -->
    <img src="{{ asset('storage/' . $value) }}" alt="{{ $label }}" width="100" class="mt-2">
    @endif
    @endif
</div>