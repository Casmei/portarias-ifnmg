<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberOrdinance extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }

    public function ordinance()
    {
        return $this->hasOne(Ordinance::class, 'ordinance_id');
    }

    public function members_ordinance()
    {
        return $this->belongsTo(Ordinance::class, 'id');
    }
}
