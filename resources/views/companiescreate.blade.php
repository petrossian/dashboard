@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">New Company</div>

                <nav>
                    <a class="nav-link" href="/home">Home</a>
                    <a class="nav-link" href="/companies">Companies</a>
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
                    <form method="POST" action="/companies" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Name">
                            <br>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Enter email">
                            <br>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="website" placeholder="Website">
                            <br>
                        </div>
                        <div class="form-group">
                            <input type="file" class="form-control-file" name="file">
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
