@props(['name', 'label', 'required' => false, 'value' => null])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <textarea id="{{ $name }}" name="{{ $name }}" class="form-control"
        {{ $required ? 'required' : '' }}>{{ $value }}</textarea>
</div>