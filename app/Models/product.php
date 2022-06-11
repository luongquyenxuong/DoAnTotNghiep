<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $guarded=[];

    public function category()
    {
        return $this->belongsTo(category::class,'id_category');
    }
    public function bill_detail()
    {
        return $this->hasMany(bill_detail::class,'id_product');
    }
}
