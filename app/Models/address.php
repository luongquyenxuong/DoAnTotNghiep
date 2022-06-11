<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class address extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }
    public function bill()
    {
        return $this->hasMany(bill::class,'id_address');
    }
}
