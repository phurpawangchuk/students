<!-- x-select.blade.php -->
@props(['name', 'label', 'options' => [], 'selected' => null, 'required' => false])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <select id="{{ $name }}" name="{{ $name }}" class="form-select" {{ $required ? 'required' : '' }} {{ $attributes }}>
        <option value="">Select {{ $label }}</option>
        @foreach ($options as $value => $display)
        <option value="{{ $value }}" {{ $value == $selected ? 'selected' : '' }}>
            {{ $display }}
        </option>
        @endforeach
    </select>
</div>