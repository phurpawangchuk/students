<x-modal modalId="createPostModal" modalTitle="Create Post">
    <div>
        @if (session()->has('message'))
        <div class="alert alert-success mt-3">
            {{ session('message') }}
        </div>
        @endif

        <form wire:submit.prevent="createPost" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" id="title" name="title" class="form-control" wire:model.lazy="title" />
                @error('title') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea id="content" name="content" class="form-control" wire:model.lazy="content"></textarea>
                @error('content') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">File</label>
                <input type="file" id="image" name="image" class="form-control" wire:model="image" />
                @error('image') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <div>
                    <input type="radio" id="male" name="gender" value="M" wire:model.lazy="gender" />
                    <label for="male">Male</label>
                </div>
                <div>
                    <input type="radio" id="female" name="gender" value="F" wire:model.lazy="gender" />
                    <label for="female">Female</label>
                </div>
                @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="state" class="form-label">State</label>
                <select id="state" name="state" class="form-select" wire:model="state">
                    <option value="">Select a state</option>
                    @foreach ($states as $state)
                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                    @endforeach
                </select>
                @error('state') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <select id="city" name="city" class="form-select" wire:model="city">
                    <option value="">Select a city</option>
                    @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
                @error('city') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </form>
    </div>
    </x-model>