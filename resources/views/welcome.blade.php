@include('layouts.navigation')
<!-- Main Content -->
<div class="container my-5">
    <!-- Students Section -->
    <div class="mb-4">
        <div class="card">
            <div class="card-header">
                <h2 class="h5 fw-semibold">Students</h2>
            </div>
            <div class="card-body">
                @include('students')
            </div>
        </div>
    </div>

    <!-- Product and Post News Section -->
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="h5 fw-semibold">Product News</h2>
                </div>
                <div class="card-body">
                    @include('products')
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="h5 fw-semibold">Post News</h2>
                </div>
                <div class="card-body">
                    @include('posts')
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="py-4 text-center text-muted small">
    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
</footer>