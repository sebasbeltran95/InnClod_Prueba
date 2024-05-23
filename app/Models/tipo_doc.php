<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_doc extends Model
{
    use HasFactory;
    protected $table = 'tip_tipo_doc';

    public function getKeyName(){
        return "id";
    }

    public $fillable = [
        'id',
        'tip_nombre',
        'tip_prefijo',
        'created_at',
        'updated_at'
    ];
}
