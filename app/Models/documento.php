<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class documento extends Model
{
    use HasFactory;
    protected $table = 'doc_documento';

    public function getKeyName(){
        return "id";
    }

    public $fillable = [
        'id',
        'doc_nombre',
        'doc_codigo',
        'doc_contenido',
        'doc_id_tipo',
        'doc_id_proceso',
        'created_at',
        'updated_at'
    ];
}
