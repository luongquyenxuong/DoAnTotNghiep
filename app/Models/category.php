<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded=[];
    public function product()
    {
        return $this->hasMany(product::class,'id_category');
    }
}
