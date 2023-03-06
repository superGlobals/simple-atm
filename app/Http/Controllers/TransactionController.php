<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\AccountBalance;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\DepositValidationRequest;
use App\Http\Requests\TransferValidationRequest;
use App\Http\Requests\WithdrawValidationRequest;

class TransactionController extends Controller
{

    public function index()
    {
        $account_id = Auth::guard('customer')->user()->account_id;
        $transactions = Transaction::where('account_id', $account_id)->orderBy('created_at', 'DESC')->paginate(7);

        return view('customer.transaction.index', compact('transactions'));
    }

    public function showDeposit()
    {
        return view('customer.deposit.index');
    }

    public function deposit(DepositValidationRequest $request)
    {
        $account_id = Auth::guard('customer')->user()->account_id;

        $balance = AccountBalance::where('account_id', $account_id)->first();

        empty($balance) ? $total_balance = 0 : $total_balance = $balance->total_balance;

        // create deposit transaction
        $data = Transaction::setData($account_id, 'Thank you for your deposit! Your funds have been successfully credited to your account.', 'deposit', $request->deposit_amount, random_int(100000000, 999999999));

        Transaction::createTransaction($data);

        // update the customer account balance
        $total_balance += $request->deposit_amount;
        $data2 = AccountBalance::setData($account_id, $total_balance);

        AccountBalance::updatebalance($data2);

        return redirect()->route('dashboard')->with('message', 'Balance updated successfully');
    }

    public function showWithdraw()
    {
        $account_id = Auth::guard('customer')->user()->account_id;
        $balance = AccountBalance::remainingBalance($account_id);
        return view('customer.withdraw.index', compact('balance'));
    }

    public function withdraw(WithdrawValidationRequest $request)
    {
        $account_id = Auth::guard('customer')->user()->account_id;
        $balance = AccountBalance::where('account_id', $account_id)->first();

        empty($balance) ? $total_balance = 0 : $total_balance = $balance->total_balance;

        $data = Transaction::setData($account_id, 'Withdrawal successful! You have successfully withdrawn the requested amount from your account.', 'withdraw', $request->withdraw_amount, random_int(100000000, 999999999));
        
        Transaction::createTransaction($data);

         // update the customer account balance
         $total_balance -= $request->withdraw_amount;
         $data2 = AccountBalance::setData($account_id, $total_balance);
 
         AccountBalance::updatebalance($data2);

        return redirect()->route('dashboard')->with('message', 'Balance updated successfully');
    }

    public function showTransfer()
    {
        $account_id = Auth::guard('customer')->user()->account_id;
        $balance = AccountBalance::remainingBalance($account_id);
        return view('customer.transfer.index', compact('balance'));
    }

    public function transfer(TransferValidationRequest $request)
    {
        $account_id = Auth::guard('customer')->user()->account_id;
        $info = Customer::where('account_id', $account_id)->first();
        $balance = AccountBalance::where('account_id', $account_id)->first();

        empty($balance) ? $total_balance = 0 : $total_balance = $balance->total_balance;

        $data = Transaction::setData($account_id, 'Your funds have been successfully transferred. Thank you for trusting us with your money.', 'transfer', $request->transfer_amount, random_int(100000000, 999999999));

        $dataNotif = Transaction::setData($request->transfer_to, "{$info->name} has transferred some money to your account.", 'receive', $request->transfer_amount, random_int(100000000, 999999999));
        
        Transaction::createTransaction($data);
        Transaction::createTransaction($dataNotif);

         // update the customer account balance
         $total_balance -= $request->transfer_amount;
         $data2 = AccountBalance::setData($account_id, $total_balance);
 
         AccountBalance::updatebalance($data2);

         // update the recepient account balance
         $balance = AccountBalance::where('account_id', $request->transfer_to)->first();

        empty($balance) ? $total_balance = 0 : $total_balance = $balance->total_balance;
         $total_balance += $request->transfer_amount;
         $data3 = AccountBalance::setData($request->transfer_to, $total_balance);
 
         AccountBalance::updatebalance($data3);

        return redirect()->route('dashboard')->with('message', 'Balance updated successfully');
    }

}
