<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookingTransaction extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'booking_trx_id',
        'name',
        'phone',
        'email',
        'quantity',
        'proof',
        'post_code',
        'city',
        'address',
        'sub_total_amount',
        'total_amount',
        'total_tax_amount',
        'is_paid',
    ];

    public static function generateUniqueTrxId()
    {
        $prefix = 'DESUS';
        do{
            $randomString = $prefix . mt_rand(1000, 9999);
        }while(self::where('booking_trx_id', $randomString)->exists());

        return $randomString;
    }

    public function transactionDetails():HasMany
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
