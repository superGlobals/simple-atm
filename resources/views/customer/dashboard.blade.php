@extends('layouts.app')

@section('content')

    <div class="col-md-10 mx-auto mt-5">
        <x-message/>
        <div class="card shadow bg-white rounded border-0">
            <div class="card-header bg-white border-0">
                <h4 class="text-muted p-3">Please select the action you want to perform.</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                      <div class="card bg-light border-0 mb-3">
                        <div class="card-body text-center">
                          <h5 class="card-title text-muted">Display Balance</h5>
                          <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#balanceModal">View Balance</button>
                        </div>
                        @include('customer.modals.balance')
                      </div>
                    </div>
                    
                    <div class="col-md-3">
                      <div class="card bg-light border-0 mb-3">
                        <div class="card-body text-center">
                          <h5 class="card-title text-muted">Withdraw Money</h5>
                          <a href="{{ route('showWithdraw') }}" class="btn btn-outline-success">Withdraw</a>
                        </div>
                        @include('customer.modals.withdraw')
                      </div>
                    </div>
                    
                    <div class="col-md-3">
                      <div class="card bg-light border-0 mb-3">
                        <div class="card-body text-center">
                          <h5 class="card-title text-muted">Deposit Money</h5>
                          <a href="{{ route('showDeposit') }}" class="btn btn-outline-warning">Deposit</a>
                        </div>
                        @include('customer.modals.deposit')
                      </div>
                    </div>
                    
                    <div class="col-md-3">
                      <div class="card bg-light border-0 mb-3">
                        <div class="card-body text-center">
                          <h5 class="card-title text-muted">Transfer Money</h5>
                          <a href="{{ route('showTransfer') }}" class="btn btn-outline-danger">Transfer</a>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection