    @include('layouts.header')

    <div class="flex-grow-1 bg-gray-100">
        @include('layouts.navigation')

        <div class="container mt-5 flex-grow-1">
            {{ $slot }}
        </div>
    </div>

    @include('layouts.footer')