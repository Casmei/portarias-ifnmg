<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordinance extends Model
{
    use HasFactory;

    public function members_ordinance()
    {
        return $this->belongsTo(MemberOrdianance::class, 'id');
    }

    public function members()
    {
        return $this->hasOne(MemberOrdinance::class, 'position_id');
    }
}
