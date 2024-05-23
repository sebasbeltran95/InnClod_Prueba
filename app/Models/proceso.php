<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proceso extends Model
{
    use HasFactory;
    protected $table = 'pro_proceso';

    public function getKeyName(){
        return "id";
    }

    public $fillable = [
        'id',
        'pro_prefijo',
        'pro_nombre',
        'created_at',
        'updated_at'
    ];
}
