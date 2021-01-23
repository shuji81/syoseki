<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Syoseki extends Model
{
    use HasFactory;

    public function scopeSyosekiNameEqual($query, $str)
    {
        return $query->where('syosekiName',$str);   
    }
}
