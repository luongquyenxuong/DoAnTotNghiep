<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class topping extends Model
{
    use HasFactory;use SoftDeletes;
    protected $guarded=[];
    public function bill_detail_topping()
    {
        return $this->hasMany(bill_detail_topping::class,'id_topping');
    }
}
