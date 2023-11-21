<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'roles'; // Agrega esta línea para especificar el nombre correcto de la tabla


    protected $fillable = [
        'name',
        'status'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
