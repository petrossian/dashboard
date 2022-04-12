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
                        <a class="nav-link" href="/companies/create">New Company</a>
                    </nav>
                </div>
            </div>
            <br>
        </div>
        <table class="table table-dark table-striped border-dark col-12">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>File</th>
                    <th>SHOW</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->website }}</td>
                        <td>{{ $company->file }}</td>
                        <td><a href="/companies/{{ $company->id }}" class="text-success">SHOW</a></td>
                        <td><a href="/companies/{{ $company->id }}/edit" class="text-primary">EDIT</a></td>
                        <td>
                            <form method="post" action="/companies/{{ $company->id }}">
                                @csrf
                                @method('DELETE')
                                <button><a class="text-danger">DELETE</a></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $companies->links() }}
    </div>
</div>
@endsection
