<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    public $guarded = ['id'];
    protected $table = 'resep';

    public function users(){
        return $this->belongsTo(Users::class);
    }

    public function cara_pembuatan(){
        return $this->hasMany(Cara_pembuatan::class);
    }

    public function kategori(){
        return $this->hasOne(Kategori::class);
    }

    public function Resep_bahan(){
        return $this->hasMany(Resep_bahan::class);
    }

    public function simpan_resep(){
        return $this->hasOne(Simpan_resep::class);
    }
}
