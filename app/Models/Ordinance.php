<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordinance extends Model
{

    protected $fillable = [
        'number',
        'start_date',
        'end_date',
        'campus',
        'description',
        'visibility',
        'pdf_url',
    ];

    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
