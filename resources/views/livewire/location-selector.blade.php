<div>
    <select wire:model.change="selectedState">
        <option value="" selected>Select State</option>
        @foreach ($states as $state)
        <option value="{{ $state->id }}">{{ $state->name }}</option>
        @endforeach
    </select>

    <select wire:model.change="selectedCity">
        <option value="" selected>Select City</option>
        @foreach ($cities as $city)
        <option value="{{ $city->id }}">{{ $city->name }}</option>
        @endforeach
    </select>
</div>