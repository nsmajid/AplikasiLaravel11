@extends('layouts.navbar-fixed')


@section('title', 'Employee')


@section('content')
    <div class="row justify-content-center  mt-2">
        <div class="col-lg">
            <h2 class="">Employees</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <form>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search" name="search"
                                value="{{ request('search') }}">

                            <select name="division" id="division" class="form-control">
                                <option value="">All Division</option>
                                @foreach ($divisions as $division)
                                    <option value="{{ $division->id }}" @selected($division->id == request('division'))>
                                        {{ $division->division }}
                                    </option>
                                @endforeach
                            </select>
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                        </div>
                    </form>
                </div>
            </div>


            @can('only-sdm')
                <a href="/employee/create" type="button" class="btn btn-sm btn-primary">New Employee</a>
            @endcan



            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Code</th>
                        <th scope="col">Email</th>
                        <th scope="col">Whatsapp Number</th>
                        <th scope="col">Address</th>
                        <th scope="col">Pos Code</th>
                        <th scope="col">Division</th>
                        <th scope="col">Action</th>


                    </tr>
                </thead>
                <tbody>


                    @foreach ($employees as $employee)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $employee['name'] }}</td>
                            <td>{{ $employee['employee_code'] }}</td>
                            <td>{{ $employee->user->email }}</td>
                            <td>{{ $employee['whatsapp_number'] }}</td>
                            <td>{{ $employee['address'] }}</td>
                            <td>{{ $employee['pos_code'] }}</td>
                            <td>{{ $employee->division->division }}</td>
                            <td>
                                <a href="/employee/{{ $employee->id }}" type="button"
                                    class="btn btn-sm btn-primary">Show</a>
                                <a href="/employee/{{ $employee->id }}/edit" type="button"
                                    class="btn btn-sm btn-warning">Edit</a>


                                <form action="/employee/{{ $employee->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete Emplpoyee `{{ $employee->name }}`?');"
                                        class="btn btn-sm btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>

            <div>
                {{ $employees->onEachSide(2)->links() }}
            </div>

        </div>
    </div>


@endsection
