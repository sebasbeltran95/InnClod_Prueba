<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rol extends Model
{
    use HasFactory;
    protected $table = 'roles';

    public function getKeyName(){
        return "id";
    }

    public $fillable = [
        'id',
        'rol',
        'created_at',
        'updated_at'
    ];
}
