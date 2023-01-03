<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Chef extends Model
{
    use HasFactory;

    public $guarded = ['id'];
    protected $table = 'chef';

    public function users(){
        return $this->belongsTo(Users::class);
    }

}
