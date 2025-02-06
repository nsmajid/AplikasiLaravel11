@extends('layouts.navbar-fixed')

@section('title', 'Division Detail')

@section('content')
    <div class="row">
        <div class="col-lg-6">

            <h1>Divison {{ $division->division }}</h1>

            {{-- <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Division</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($divisions as $division)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $division->division }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table> --}}
        </div>
    </div>
@endsection
