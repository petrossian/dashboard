@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Companies</div>
                <div class="card-body">
                    <nav>
                        <a class="nav-link" href="/home">Home</a>
                        <a class="nav-link" href="/employees/create">New Employee</a>
                    </nav>
                </div>
            </div>
            <br>
        </div>
        <table class="table table-dark table-striped border-dark col-12">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phon</th>
                    <th>Company ID</th>
                    <th>SHOW</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->first_name }}</td>
                        <td>{{ $employee->last_name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->company_id }}</td>
                        <td><a href="/employees/{{ $employee->id }}" class="text-success">SHOW</a></td>
                        <td><a href="/employees/{{ $employee->id }}/edit" class="text-primary">EDIT</a></td>
                        <td>
                            <form method="post" action="/employees/{{ $employee->id }}">
                                @csrf
                                @method('DELETE')
                                <button><a class="text-danger">DELETE</a></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
