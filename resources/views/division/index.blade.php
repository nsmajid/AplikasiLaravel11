@extends('layouts.navbar-fixed')

@section('title', 'Division')

@section('content')
    <div class="row">
        <div class="col-lg-6">

            <h1>Divison</h1>
            <a href="/division/create" type="button" class="btn btn-sm btn-primary">Add New</a>
            <a href="/division/create?multiple=true" type="button" class="btn btn-sm btn-primary">Add New Multiple</a>
            <a href="/division?export=pdf" type="button" class="btn btn-sm btn-danger">Download PDF</a>
            <a href="/division?export=excel" type="button" class="btn btn-sm btn-success">Export PDF</a>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Division</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($divisions as $division)
                    {{-- @dd() --}}
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $division->division }}</td>
                            <td>
                                <a href="/division/{{ $division->id }}" type="button"
                                    class="btn btn-sm btn-primary">Show</a>
                                <a href="/division/{{ $division->id }}/edit" type="button"
                                    class="btn btn-sm btn-warning">Edit</a>

                                <form action="/division/{{ $division->id }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" {{ $division->employee->count() ? 'disabled' : null }}
                                        onclick="return confirm('Are you sure you want to delete `{{ $division->division }}`?');"
                                        class="btn btn-sm btn-danger">Remove</button>
                                </form>
                            </td>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
