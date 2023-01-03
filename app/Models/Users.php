<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Users extends Model
{
    use HasFactory;

    public $guarded = ['id'];
    protected $table = 'users';

    protected static function boot(){
        parent::boot();
        static::creating(function(Users $users){
            $users->password = Hash::make($users->password);
        });

        static::updating(function(Users $users){
            if($users->isDirty(["users"])){
                $users->password = Hash::make($users->password);
            }
        });
    }

    public function chef(){
        return $this->hasOne(Chef::class);
    }

    public function roles(){
        return $this->hasOne(Roles::class);
    }

    public function resep(){
        return $this->hasMany(Resep::class);
    }

    public function simpan_resep(){
        return $this->hasMany(Simpan_resep::class);
    }
}
