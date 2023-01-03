<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Simpan_resep extends Model
{
    use HasFactory;

    public $guarded = ['id'];
    protected $table = 'simpan_resep';

    public function users(){
        return $this->belongsTo(Users::class);
    }

    public function resep(){
        return $this->belongsToMany(Resep::class);
    }
}
