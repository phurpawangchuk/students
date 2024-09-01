<?php

namespace App\Livewire;

use App\Models\State;
use App\Models\City;
use Livewire\Component;

class LocationSelector extends Component
{
    public $states = [];
    public $cities = [];
    public $selectedState = null;
    public $selectedCity = null;
    
    public function mount()
    {
        $this->states = State::all(); // Load all states
    }


    public function updatedSelectedState($stateId)
    {
        $this->cities = City::where('state_id', $stateId)->get();
    }

    public function render()
    {
        return view('livewire.location-selector', [
            'states' => $this->states
        ]);
    }
}