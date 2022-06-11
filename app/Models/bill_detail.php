<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bill_detail extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];
    public function product()
    {
        return $this->belongsTo(product::class,'id_product');
    }
    public function size()
    {
        return $this->belongsTo(size::class,'id_size');
    }
    public function bill()
    {
        return $this->belongsTo(bill::class,'id_bill');
    }
    public function bill_detail_topping()
    {
        return $this->hasMany(bill_detail_topping::class,'id_bill_detail');
    }


}
