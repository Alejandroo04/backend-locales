<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;

    protected $table = 'locales';

    protected $fillable = [
        'nombre_de_negocio',
        'ubicacion',
        'telefono', 
        'representante_legal',
        'category_id', 
        'subcategory_id',
        'encargado_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function encargado()
    {
        return $this->belongsTo(User::class, 'encargado_id');
    }
    
    public function representanteLegal()
    {
        return $this->belongsTo(User::class, 'representante_legal_id');
    }

    
}
