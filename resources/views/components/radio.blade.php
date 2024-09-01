@props(['name', 'label', 'options', 'required' => false, 'value' => null])

<div class="mb-3">
    <label class="form-label">{{ $label }}</label>
    @foreach ($options as $optionValue => $optionLabel)
    <div class="form-check">
        <input class="form-check-input" type="radio" name="{{ $name }}" id="{{ $name }}_{{ $optionValue }}"
            value="{{ $optionValue }}" {{ $optionValue == $value ? 'checked' : '' }} {{ $required ? 'required' : '' }}>
        <label class="form-check-label" for="{{ $name }}_{{ $optionValue }}">
            {{ $optionLabel }}
        </label>
    </div>
    @endforeach
</div>