@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-5 mt-5 mx-auto">
            <div class="card shadow border-0 rounded">
                <div class="card-header border-0 bg-white">
                    <h4 class="text-center p-2 fw-bold">
                        Start your account with us
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('registerProcess') }}" method="POST">
                        @csrf
                        <div class="mt-0">
                            <label for="" class="form-label">Account ID</label>
                            <input type="number" class="form-control" name="account_id" value="{{ old('account_id') }}" placeholder="847234.*">
                            @error('account_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Your full name..">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Your email..">
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="" class="form-label">Please enter your preferred PIN number.</label>
                            <input type="number" class="form-control" name="password" value="{{ old('pin_number') }}" placeholder="Your PIN number..">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100 mt-3">Create account</button>
                    </form>
                    <div class="mt-3 float-end">
                        <a href="{{ route('login') }}">Login to your account here..</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection