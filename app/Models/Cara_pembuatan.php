<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cara_pembuatan extends Model
{
    use HasFactory;

    public $guarded = ['id'];
    protected $table = 'cara_pembuatan';

    public function resep(){
        return $this->belongsTo(Resep::class);
    }
}
