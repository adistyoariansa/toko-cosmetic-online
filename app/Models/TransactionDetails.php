<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Belongsto;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support;

class TransactionDetails extends Model
{
    use SoftDeletes;

    protected $fillable = [
        
        'price',
        'quantity',
        'cosmetic_id',
        'booking_transaction',      
        
    ];
    public function BookingTransaction():Belosngto
    {
        return $this->belongsTo(BookingTransaction::class, 'booking_transaction_id');
    }

    public function Cosmetic():BelongsTo
    {
        return $this->belongsTo(Cosmetic::class, 'cosmetic_id');
    }
}
