@props([
'formId',
'fields',
'buttonText' => 'Submit',
'stateOptions' => [], // For state options
'cityOptions' => [] // For city options
])

<div>
    <form id="{{ $formId }}" wire:submit.prevent="create" enctype="multipart/form-data">
        @csrf

        @foreach ($fields as $field)
        @if ($field['type'] === 'select')
        @php
        $options = $field['name'] === 'state' ? $stateOptions : ($field['name'] === 'city' ? $cityOptions :
        $field['options']);
        @endphp
        <div class="mb-3">
            <label for="{{ $field['name'] }}" class="form-label">{{ $field['label'] }}</label>
            <select id="{{ $field['name'] }}" name="{{ $field['name'] }}" class="form-select"
                wire:model="{{ $field['name'] }}" {{ $field['required'] ? 'required' : '' }}>
                <option value="">Select {{ $field['label'] }}</option>
                @foreach ($options as $key => $option)
                <option value="{{ $key }}">{{ $option }}</option>
                @endforeach
            </select>
        </div>

        @elseif ($field['type'] === 'radio')
        <div class="mb-3">
            <label class="form-label">{{ $field['label'] }}</label>
            @foreach ($field['options'] as $key => $option)
            <div class="form-check">
                <input type="radio" id="{{ $field['name'] . '-' . $key }}" name="{{ $field['name'] }}"
                    value="{{ $key }}" wire:model="{{ $field['name'] }}" {{ $field['required'] ? 'required' : '' }}
                    class="form-check-input" />
                <label for="{{ $field['name'] . '-' . $key }}" class="form-check-label">{{ $option }}</label>
            </div>
            @endforeach
        </div>

        @elseif ($field['type'] === 'textarea')
        <div class="mb-3">
            <label for="{{ $field['name'] }}" class="form-label">{{ $field['label'] }}</label>
            <textarea id="{{ $field['name'] }}" name="{{ $field['name'] }}" class="form-control"
                wire:model="{{ $field['name'] }}"
                {{ $field['required'] ? 'required' : '' }}>{{ old($field['name'], $field['value'] ?? '') }}</textarea>
        </div>

        @elseif ($field['type'] === 'file')
        <div class="mb-3">
            <label for="{{ $field['name'] }}" class="form-label">{{ $field['label'] }}</label>
            <input type="file" id="{{ $field['name'] }}" name="{{ $field['name'] }}" wire:model="{{ $field['name'] }}"
                {{ $field['required'] ? 'required' : '' }} class="form-control" />
        </div>

        @else
        <div class="mb-3">
            <label for="{{ $field['name'] }}" class="form-label">{{ $field['label'] }}</label>
            <input type="{{ $field['type'] }}" id="{{ $field['name'] }}" name="{{ $field['name'] }}"
                class="form-control" wire:model="{{ $field['name'] }}" {{ $field['required'] ? 'required' : '' }}
                value="{{ old($field['name'], $field['value'] ?? '') }}" />
        </div>
        @endif
        @endforeach

        <button type="submit" class="btn btn-primary">{{ $buttonText }}</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
    </form>
</div>