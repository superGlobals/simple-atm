@extends('layouts.app')

@section('content')
    <div class="col-md-5 mx-auto mt-5">
        <div class="card shadow rounded border-0">
            <div class="card-header border-0 bg-white">
                <h4 class="text-center text-muted fs-5 mt-3">Withdraw your hard-earned money.</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('withdraw') }}" method="POST">
                    @csrf
                    <div>
                        <label for="">Remaining Balance:</label>
                        @if (empty($balance->total_balance))
                            <h5 class="fw-bold">P0</h5>
                        @else
                            <h5 class="fw-bold">P{{ number_format($balance->total_balance) }}</h5>
                        @endif
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Kindly indicate the exact amount you wish to withdraw.</label>
                      <input type="number" class="form-control" name="withdraw_amount">
                      @error('withdraw_amount')
                          <small class="text-danger">{{ $message }}</small>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Proceed..</button>
                </form>
            </div>
        </div>
    </div>
@endsection