<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    use HasFactory;

    protected $table = 'locales';

    protected $fillable = [
        'nombre',
        'ubicacion',
        'telefono', 
        'representante_legal_id',
        'categoria_id', 
        'subcategoria_id',
        'encargado_id',
        'estado_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoria_id');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'subcategoria_id');
    }

    public function encargado()
    {
        return $this->belongsTo(User::class, 'encargado_id');
    }
    
    public function representanteLegal()
    {
        return $this->belongsTo(User::class, 'representante_legal_id');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }
    

    
}
