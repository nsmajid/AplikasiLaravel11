@extends('layouts.main')


@section('title', 'Login')


@section('content')
   <div class="container">
       <div class="row justify-content-center  mt-2">
           <div class="col-lg-6">
               <h2 class="mt-5 mb-5">Login Form</h2>
               @if (session('success'))
                   <div class="alert alert-success">{{ session('success') }}</div>
               @endif


               @if (session('error'))
                   <div class="alert alert-danger">{{ session('error') }}</div>
               @endif


               <form action="/auth/login" method="POST">
                   @csrf
                   <div class="mb-3">
                       <label for="email" class="form-label">Email address</label>
                       <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                           value="{{ old('email') }}">
                       @error('email')
                           <div class="form-text text-danger">{{ $message }}</div>
                       @enderror
                   </div>
                   <div class="mb-3">
                       <label for="password" class="form-label">Password</label>
                       <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                       @error('password')
                           <div class="form-text text-danger">{{ $message }}</div>
                       @enderror
                   </div>
                 
                   <button type="submit" class="btn btn-primary">Login</button>
               </form>
           </div>
       </div>


   </div>
@endsection
