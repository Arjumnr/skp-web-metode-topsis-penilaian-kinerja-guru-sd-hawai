<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelResponden extends Model
{
    use HasFactory;
    protected $table = 'responden';
    protected $fillable = [
        'kriteria_id', 
        'bobot'
    ];

    public function getGuru(){
        return $this->belongsTo(ModelGuru::class, 'guru_id', 'id');
    }

    public function getKriteria(){
        return $this->belongsTo(ModelKriteria::class, 'kriteria_id', 'id');
    }
}
