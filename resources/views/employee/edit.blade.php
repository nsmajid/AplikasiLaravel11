@extends('layouts.navbar-fixed')


@section('title', 'Edit Employee')


@section('content')
   <div class="row  mt-2">
       <div class="col-lg-6">


           <h2>Edit Employee</h2>


           <div class="card">


               <div class="card-body">


                   <form action="/employee/{{ $employee->id }}" method="POST">
                       @csrf
                       @method('PUT')


                       <div class="mb-3">
                           <label for="name" class="form-label">Employee Name</label>
                           <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                               id="name" value="{{ old('name', $employee->name) }}">


                           @error('name')
                               <div class="form-text text-danger">{{ $message }}</div>
                           @enderror


                       </div>
                       <div class="mb-3">
                           <label for="employee_code" class="form-label">Employee Code</label>
                           <input type="number" class="form-control @error('employee_code') is-invalid @enderror"
                               name="employee_code" id="employee_code" value="{{ old('employee_code', $employee->employee_code) }}">


                           @error('employee_code')
                               <div class="form-text text-danger">{{ $message }}</div>
                           @enderror


                       </div>


                       <div class="mb-3">
                           <label for="email" class="form-label">Email</label>
                           <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                               id="email" value="{{ old('email', $employee->user->email) }}">


                           @error('email')
                               <div class="form-text text-danger">{{ $message }}</div>
                           @enderror


                       </div>


                       <div class="mb-3">
                           <label for="whatsapp_number" class="form-label">Whatsapp Number</label>
                           <input type="text" class="form-control @error('whatsapp_number') is-invalid @enderror"
                               name="whatsapp_number" id="whatsapp_number" value="{{ old('whatsapp_number', $employee->whatsapp_number) }}">


                           @error('whatsapp_number')
                               <div class="form-text text-danger">{{ $message }}</div>
                           @enderror


                       </div>


                       <div class="mb-3">
                           <label for="adddress" class="form-label">Address</label>
                           <textarea name="address" class="form-control @error('address') is-invalid @enderror" id="address" rows="3">{{ old('address', $employee->address) }}</textarea>


                           @error('address')
                               <div class="form-text text-danger">{{ $message }}</div>
                           @enderror


                       </div>


                       <div class="mb-3">
                           <label for="pos_code" class="form-label">POS Code</label>
                           <input type="number" class="form-control @error('pos_code') is-invalid @enderror"
                               name="pos_code" id="pos_code" value="{{ old('pos_code', $employee->pos_code) }}">


                           @error('pos_code')
                               <div class="form-text text-danger">{{ $message }}</div>
                           @enderror


                       </div>


                       <div class="mb-3">
                           <label for="pos_code" class="form-label">Division</label>


                           <select name="division_id" class="form-control @error('division_id') is-invalid @enderror"
                               id="division_id">
                               <option value="">--Choose Division--</option>
                               @foreach ($divisions as $division)
                                   <option value="{{ $division->id }}" 
                                    @selected(old('division_id', $employee->division_id) == $division->id)
                                    >
                                       {{ $division->division }}</option>
                               @endforeach
                           </select>
                           @error('division_id')
                               <div class="form-text text-danger">{{ $message }}</div>
                           @enderror


                       </div>


                       <button type="submit" class="btn btn-warning">Update</button>
                       <a href="/employee" type="button" class="btn btn-dark">Cancel</a>


                   </form>


               </div>
           </div>


       </div>
   </div>


@endsection
