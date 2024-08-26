 @extends('layouts.header')
 @include('layouts.navigation')
 <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100 py-4">
     <div class="w-100 w-sm-75 w-md-50 w-lg-40">
         <div class="card shadow-lg">
             <div class="card-body p-4 p-sm-5">
                 {{ $slot }}
             </div>
         </div>
     </div>
 </div>