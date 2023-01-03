<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Resep;
use App\Models\Simpan_resep;

class HomeController extends Controller
{
    public function index(){
        $user = Users::query()->where('id', session()->get('idUser'))->first();
        $resep = Resep::query()->limit(4)->get();
        $resep = $resep->map(function($item){
            $chef = Users::query()->where('id', $item->chef_id)->first();
            $item->chef = $chef;
            return $item;
        });

        if(session()->has('logged')){
            return redirect()->route('resep.list');
        }

        return view('home', [
            'resep' => $resep,
            'user' => $user,
            'simpan' => []
        ]);
    }
}
