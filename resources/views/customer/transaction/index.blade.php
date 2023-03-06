@extends('layouts.app')

@section('content')
    <div class="col-md-12 mx-auto mt-5">
        <div class="card shadow rounded border-0">
            <div class="card-header border-0 bg-white">
                <h4 class="text-center text-muted fs-5 mt-3">Transaction History.</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Reference #</th>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                                <tr>
                                    <td>{{ $transaction->reference_number }}</td>

                                    <td>{{ $transaction->description }}</td>
                                    <td>
                                        @if ($transaction->type == 'withdraw')
                                            <span class="text-danger">-{{ number_format($transaction->amount) }}</span> 
                                        @elseif($transaction->type == 'transfer')
                                            -{{ number_format($transaction->amount) }}
                                        @elseif($transaction->type == 'receive')
                                            +{{ number_format($transaction->amount) }}
                                        @elseif($transaction->type == 'deposit')
                                           <span class="text-success"> +{{ number_format($transaction->amount) }}</span>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($transaction->created_at)->format('F d, Y h:i A') }}</td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{ $transactions->links(); }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection