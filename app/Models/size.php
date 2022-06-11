<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class size extends Model
{
    use HasFactory;
    protected $guarded = [];
    use SoftDeletes;
    public function bill_detail()
    {
        return $this->hasMany(bill_detail::class,'id_size');
    }
}
