@extends('layouts.navbar-fixed')

@section('title', 'Edit Division Form')

@section('content')
    <div class="row">
        <div class="col-lg-6">


            <div class="card">
                <div class="card-header">
                    <h1>Edit Division Form</h1>

                </div>

                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                <div class="card-body">
                    <form method="POST" action="/division/{{ $division->id }}">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="division" class="form-label">Division Name</label>
                            <input type="text" class="form-control @error('division') is-invalid @enderror"
                                id="division" name="division" value="{{ $division->division }}">
                            @error('division')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

{{-- <input type="hidden" name="_method" value="PUT"> --}}
                        <button type="submit" class="btn btn-warning">Update</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
@endsection
