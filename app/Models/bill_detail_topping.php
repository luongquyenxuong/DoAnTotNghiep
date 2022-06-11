<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bill_detail_topping extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];
    public function topping()
    {
        return $this->belongsTo(topping::class,'id_topping');
    }
    public function bill_detail()
    {
        return $this->belongsTo(bill_detail::class,'id_bill_detail');
    }
}
