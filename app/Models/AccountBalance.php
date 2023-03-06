<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountBalance extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id', 'total_balance'
    ];

    public static function updatebalance($data)
    {
        AccountBalance::updateOrInsert(['account_id' => $data['account_id']],
        ['total_balance' => $data['total_balance'], 'updated_at' => now()]);
    }

    public static function remainingBalance($account_id)
    {
        return AccountBalance::where('account_id', $account_id)->first();
    }

    public static function setData($account_id, $total_balance)
    {
        $data = [
            'account_id' => $account_id,
            'total_balance' => $total_balance
        ];

        return $data;
    }
}
