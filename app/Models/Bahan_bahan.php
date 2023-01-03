<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahan_bahan extends Model
{
    use HasFactory;

    public $guarded = ['id'];
    protected $table = 'bahan_bahan';

    public function resep_bahan(){
        return $this->belongsToMany(Resep_bahan::class);
    }
}
