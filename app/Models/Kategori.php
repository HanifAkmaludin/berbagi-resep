<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    public $guarded = ['id'];
    protected $table = 'kategori';

    public function resep(){
        return $this->belongsToMany(Resep::class);
    }
}
