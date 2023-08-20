<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberOrdinance extends Model
{
    use HasFactory;

    protected $table = 'ordinance_user';

    protected $fillable = [
        'user_id',
        'ordinance_id'
    ];

    public function user()
    {
        return $this->hasMany(User::class, 'user_id');
    }

    public function ordinance()
    {
        return $this->hasMany(Ordinance::class, 'ordinance_id');
    }
}
