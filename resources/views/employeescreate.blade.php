@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Employee</div>

                <nav>
                    <a class="nav-link" href="/home">Home</a>
                    <a class="nav-link" href="/employees">Employees</a>
                </nav>

                <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                    <form method="POST" action="/employees">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <input type="text" class="form-control" name="first_name" placeholder="First Name">
                            <br>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                            <br>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Enter email">
                            <br>
                        </div>
                        <div class="form-group">
                            <input type="test" class="form-control" name="phone" placeholder="Phone">
                            <br>
                        </div>
                        <div class="form-group">
                            <select name="company_id">
                                @foreach ($companies as $company)
                                    <option value="{{$company->id}}">
                                        {{$company->name}}
                                    </option>
                                @endforeach
                            </select>
                            <br>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
