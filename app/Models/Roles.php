<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    public $guarded = ['id'];
    protected $table = 'roles';

    public function users(){
        return $this->belongsToMany(Users::class);
    }
}
