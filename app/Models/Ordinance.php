<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordinance extends Model
{

    protected $fillable = [
        'ordinance_number',
        'start_date',
        'end_date',
        'members_ordinances_id',
        'campus',
        'description',
        'visibility'
    ];

    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
