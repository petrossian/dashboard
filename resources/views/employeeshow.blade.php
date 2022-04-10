@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Employees</div>
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
                            <p class="d-flex justify-content-around">
                                <span class="text-success">
                                    <i class="fa fa-user"></i>
                                    {{$employee->first_name}} {{$employee->last_name}}
                                </span>
                                <span>
                                    <i class="fa fa-phone"></i>
                                    {{$employee->phone}}
                                </span>
                                <span>
                                    <i class="fa fa-envelope"></i>
                                    {{$employee->email}}
                                </span>
                            </p>
                            <div class="d-flex justify-content-end">
                                <h4 class="text-dark d-flex justify-content-around">
                                    <span>Works In</span>&nbsp;
                                    <div id="logo" style="display: block;
    width: 100px;
    height: 100px;
    border: 1px solid black;">
                                        <img src="./../logos/{{$employee->file}}" alt="">
                                    </div>
                                    <b class="text-success">{{$employee->name}}</b>
                                </h4>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-around">
                            <a href="/employee/{{ $employee->id }}/edit" class="btn btn-outline-primary btn-sm">
                                <i class="fa fa-edit"></i>&nbsp;EDIT
                            </a>
                            <form method="post" action="/employee/{{ $employee->id }}">
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
