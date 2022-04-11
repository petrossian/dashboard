@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Employees Edit</div>
                <div class="card-body">
                    <nav class="d-flex justify-content-between">
                        <a class="nav-link" href="/home">
                            <i class="fa fa-home"></i>&nbsp;Home
                        </a>
                        <a class="nav-link" href="/employees/create">New Employee</a>
                    </nav>
                    <hr>
                    <div>
                        <div>
                            <form action="/employees/{{$employee->id}}" method="post">
                                @csrf
                                @method('PUT')
                                <p class="d-flex justify-content-around">
                                    <span class="text-success text-center">
                                        <i class="fa fa-user"></i>
                                        {{$employee->first_name}} {{$employee->last_name}}
                                        <br>
                                        <input type="text" name="first_name" placeholder="First Name">
                                        <input type="text" name="last_name" placeholder="Last Name">
                                    </span>
                                    <span class="text-center">
                                        <i class="fa fa-phone"></i>
                                        {{$employee->phone}}
                                        <br>
                                        <input type="text" name="phone" placeholder="Phone">
                                    </span>
                                    <span class="text-center">
                                        <i class="fa fa-envelope"></i>
                                        {{$employee->email}}
                                        <br>
                                        <input type="text" name="email" placeholder="Email">
                                    </span>
                                </p>
                                <hr class="w-50 m-auto"><br>
                                <p class="d-flex justify-content-around">
                                    <button type="submit" class="btn btn-sm btn-outline-success">
                                        <i class="fas fa-check-circle"></i> Click for done
                                    </button>
                                </p>
                            </form>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-around">
                            <form method="post" action="/employees/{{ $employee->id }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm">
                                    <i class="fa fa-trash"></i>&nbsp;DELETE
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
@endsection
