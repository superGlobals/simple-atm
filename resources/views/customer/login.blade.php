@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-5 mt-5 mx-auto">
            <x-message />
            <div class="card shadow border-0 rounded">
                <div class="card-header border-0 bg-white">
                    <h4 class="text-center p-3 fw-bold">
                        Manage your savings
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('loginProcess') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Please enter email..</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Please enter your PIN number..</label>
                            <input type="number" class="form-control" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                    <div class="mt-3 float-end">
                        <a href="{{ route('register') }}">Create your account here..</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection