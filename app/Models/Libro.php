<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;
    protected $table = 'libros';

    protected $fillable = [
        'fecha', 'titulo','pdf','autor','categoria_id'
    ];

    public function categoria() {
        return $this->belongsTo(Categoria::class,'categoria_id','id');
    }
}
