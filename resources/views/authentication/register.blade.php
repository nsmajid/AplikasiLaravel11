@extends('layouts.main')


@section('title', 'Register')


@section('content')
   <div class="container">
       <div class="row justify-content-center  mt-2">
           <div class="col-lg-6">
               <h2 class="mt-5 mb-5">Register Form</h2>
              
               @if (session('success'))
                   <div class="alert alert-success">{{ session('success') }}</div>
               @endif


               @if (session('error'))
                   <div class="alert alert-danger">{{ session('error') }}</div>
               @endif


               <form action="/auth/register" method="POST">
                   @csrf
                   <div class="mb-3">
                       <label for="name" class="form-label">Name</label>
                       <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                           value="{{ old('name') }}" name="name">
                       @error('name')
                           <div class="form-text text-danger">{{ $message }}</div>
                       @enderror
                   </div>


                   <div class="mb-3">
                       <label for="whatsapp_number" class="form-label">Whatsapp Number</label>
                       <input type="text" class="form-control @error('whatsapp_number') is-invalid @enderror"
                           value="{{ old('whatsapp_number') }}" id="whatsapp_number" name="whatsapp_number">
                       @error('whatsapp_number')
                           <div class="form-text text-danger">{{ $message }}</div>
                       @enderror
                   </div>


                   <div class="mb-3">
                       <label for="email" class="form-label">Email address</label>
                       <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                           value="{{ old('email') }}" name="email">
                       @error('email')
                           <div class="form-text text-danger">{{ $message }}</div>
                       @enderror
                   </div>


                   <div class="mb-3">
                       <label for="password" class="form-label">Password</label>
                       <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                           name="password">
                       @error('password')
                           <div class="form-text text-danger">{{ $message }}</div>
                       @enderror
                   </div>
                   <div class="mb-3">
                       <label for="password_confirmation" class="form-label">Password Confirmation</label>
                       <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                           id="password_confirmation" name="password_confirmation">
                       @error('password_confirmation')
                           <div class="form-text text-danger">{{ $message }}</div>
                       @enderror
                   </div>
                   <button type="submit" class="btn btn-primary">Register</button>
               </form>
           </div>
       </div>


   </div>
@endsection
