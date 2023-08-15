<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelGuru extends Model
{
    use HasFactory;
    protected $table = 'guru';
    protected $fillable = [
        'nip', 
        'nama_guru', 
        'jenis_kelamin', 
        'no_telp', 
        'foto'
    ];
}
