<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chef;
use App\Models\Users;
use App\Models\Resep;
use App\Models\Simpan_resep;
use Illuminate\Support\Facades\Route;

class ChefController extends Controller
{
    public function register(){
        return view('chef.register');
    }

    public function createChef(Request $request, $id){
        $user = Users::query()->where('id', $id)->first();
        $payloadChef = [
            'no_telepon' => $request->input('no_telepon'),
            'tanggal_lahir' => $request->input('tanggal_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'user_id' => $user->id,
        ];
        $payloadUsers = [
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'roles_id' => 2
        ];

        if(!session()->isStarted()) session()->start();
        session()->put("idUserRole", 2);

        Users::query()->where('id', $id)->update($payloadUsers);
        Chef::query()->create($payloadChef);
        return redirect()->route('resep.list')->with("success", "Selamat Datang Chef");
    }

    public function resepku(){
        $user = session()->get("idUser");
        $resep = Resep::query()->where("chef_id", $user)->get();
        $simpan = Simpan_resep::query()->where('user_id', $user)->get();
        $resep = $resep->map(function($item){
            $chef = Users::query()->where('id', $item->chef_id)->first();
            $item->chef = $chef;
            return $item;
        });

        $simpan_resep = [];
        
        if(count($simpan) != 0){
            foreach($simpan as $val){
                array_push($simpan_resep, $val); 
            };
        }

        // dd($simpan_resep);

        return view('resep.resepku', [
            'resep' => $resep,
            'simpan' => $simpan_resep
        ]);
    }
}
