<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class bill extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }
    public function address()
    {
        return $this->belongsTo(address::class,'id_address');
    }
    public function bill_detail()
    {
        return $this->hasMany(bill_detail::class,'id_bill');
    }
}
