 @include('layouts.header')
 <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100 py-4">
     <div class="w-100 w-sm-75 w-md-50 w-lg-40">
         <div class="card shadow-lg">
             <div class="card-body p-4 p-sm-5">
                 {{ $slot }}
             </div>
         </div>
     </div>
 </div>

 <!-- Bootstrap JS and dependencies -->
 <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script> -->
 </body>

 </html>