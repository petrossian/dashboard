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
                            <form action="/companies/{{$company->id}}" method="post">
                                @csrf
                                @method('PUT')
                                <p class="d-flex justify-content-around">
                                    <span class="text-success text-center">
                                        <i class="fa fa-user"></i>
                                        {{$company->name}}
                                        <br>
                                        <input type="text" name="name" placeholder="Name">
                                    </span>
                                    <span class="text-center">
                                        <i class="fa fa-phone"></i>
                                        {{$company->website}}
                                        <br>
                                        <input type="text" name="website" placeholder="Website">
                                    </span>
                                    <span class="text-center">
                                        <i class="fa fa-envelope"></i>
                                        {{$company->email}}
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
                            <form method="post" action="/companies/{{ $company->id }}">
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
