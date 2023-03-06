@extends('layouts.app')

@section('content')
    <div class="col-md-5 mx-auto mt-5">
        <div class="card shadow rounded border-0">
            <div class="card-header border-0 bg-white">
                <h4 class="text-center text-muted fs-5 mt-3">Transfer money to your account.</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('deposit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                      <label for="" class="form-label">Please specify the amount you wish to deposit.</label>
                      <input type="number" class="form-control" name="deposit_amount">
                      @error('deposit_amount')
                          <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Proceed..</button>
                </form>
            </div>
        </div>
    </div>
@endsection