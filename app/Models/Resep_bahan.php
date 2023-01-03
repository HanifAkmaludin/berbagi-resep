<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep_bahan extends Model
{
    use HasFactory;

    public $guarded = ['id'];
    protected $table = 'resep_bahan';

    public function resep(){
        return $this->belongsTo(Resep::class);
    }

    public function bahan_bahan(){
        return $this->hasOne(Bahan_bahan::class);
    }
}
