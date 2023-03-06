<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_id', 'description', 'type', 'amount', 'reference_number'
    ];

    public static function createTransaction($data)
    {
        return self::create($data);
    }

    public static function setData($account_id, $desc, $type, $amount, $ref)
    {
        $data = [
            'account_id' => $account_id,
            'description' => $desc,
            'type' => $type,
            'amount' => $amount,
            'reference_number' => $ref
        ];

        return $data;
    }
}
