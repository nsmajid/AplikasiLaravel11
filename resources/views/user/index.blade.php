@extends('layouts.main')

@section('title', 'Users')

@section('content')
    <div class="container">
        <div class="row justify-content-center  mt-2">
            <div class="col-lg-9">
                <h2 class="mt-5 mb-5">Users</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Employee Code</th>
                            <th scope="col">Email</th>
                            <th scope="col">Division</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->employee_code }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->division }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection
