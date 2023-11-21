<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nombre'
    ];

    public function locales()
    {
        return $this->hasMany(Local::class);
    }
}
