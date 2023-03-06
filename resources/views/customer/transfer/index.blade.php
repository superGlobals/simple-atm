@extends('layouts.app')

@section('content')
    <div class="col-md-5 mx-auto mt-5">
        <div class="card shadow rounded border-0">
            <div class="card-header border-0 bg-white">
                <h4 class="text-center text-muted fs-5 mt-3">Securely transfer money</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('transfer') }}" method="POST">
                    @csrf
                    <div>
                        <label for="">Remaining Balance:</label>
                        <h5 class="fw-bold">P{{ number_format($balance->total_balance) }}</h5>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Kindly indicate the exact amount you wish to transfer.</label>
                        <input type="number" class="form-control" name="transfer_amount" value="{{ old('transfer_amount') }}">
                        @error('transfer_amount')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Please enter the account number you wish to transfer funds to.</label>
                        <input type="number" class="form-control" name="transfer_to" value="{{ old('transfer_to') }}">
                        @error('transfer_to')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                      </div>
                    <button type="submit" class="btn btn-primary w-100">Proceed..</button>
                </form>
            </div>
        </div>
    </div>
@endsection