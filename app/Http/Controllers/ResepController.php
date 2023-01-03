<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cara_pembuatan;
use App\Models\Users;
use App\Models\Resep;
use App\Models\Bahan_bahan;
use App\Models\Resep_bahan;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\Simpan_resep;
use Illuminate\Support\Facades\Route;

class ResepController extends Controller
{
    public function index(){
        $idUser = session()->get('idUser');
        $user = Users::query()->where('id', $idUser)->first();
        $resep = Resep::query()->get();
        $simpan = Simpan_resep::query()->where('user_id', $idUser)->get();
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

        return view('resep.list', [
            'resep' => $resep,
            'user' => $user,
            'simpan' => $simpan_resep
        ]);
    }

    public function detail($id){
        $resep = Resep::query()->where('id', $id)->first();
        // dd($resep);
        $chef = Users::query()->where('id', $resep->chef_id)->first();
        $kategori = Kategori::query()->where('id', $resep->kategori_id)->first();
        $cara_pembuatan = Cara_pembuatan::query()->where('resep_id', $resep->id)->get();
        $resep_bahan = Resep_bahan::query()->where('resep_id', $resep->id)->get();
        $resep_bahan = $resep_bahan->map(function($value){
            $bahan = Bahan_bahan::query()->where('id', $value->bahan_bahan_id)->get();
            $value->bahan_bahan = $bahan;
            return $value;
        });
        $resep->chef = $chef;
        $resep->cara_pembuatan = $cara_pembuatan;
        $resep->kategori = $kategori;
        $resep->resep_bahan = $resep_bahan;

        // dd($resep);
        return view('resep.detail', [
            'resep' => $resep
        ]);
    }

    public function store(){
        return view('resep.store');
    }

    public function create(Request $request){
        $id_chef = session()->get('idUser');


        // INSERT KATEGORI
        $payloadKategori = [
            'nama_kategori' => strtolower($request->input('nama_kategori'))
        ];

        $kategori = Kategori::query()->where('nama_kategori', strtolower($payloadKategori["nama_kategori"]))->first();

        if($kategori == null || strtolower($kategori->nama_kategori) != strtolower($payloadKategori["nama_kategori"])){
            $kategori = Kategori::query()->create($payloadKategori);
        }


        // INSERT RESEP
        $payloadResep = [
            'chef_id' => $id_chef,
            'kategori_id' => $kategori->id,
            'nama_resep' => $request->input('nama_resep'),
            'deskripsi' => $request->input('deskripsi'),
            'foto_resep' => $request->file('foto_resep')->store('img', 'public'),
            'pengeluaran_masak' => $request->input('pengeluaran_masak'),
        ];

        $resep = Resep::query()->create($payloadResep);


        // INSERT CARA PEMBUATAN
        $caraPembuatan = $request->input('langkah_langkah');
        $foto_cara_pembuatan = $request->file('foto_cara_pembuatan');

        // dd(array_key_exists(2, $foto_cara_pembuatan), $caraPembuatan);

        for($i = 0; $i < count($caraPembuatan); $i++){
            if($caraPembuatan[$i] != null){
                if($foto_cara_pembuatan != null){
                    if(array_key_exists($i, $foto_cara_pembuatan)){
                        $payloadCaraPembuatan = [
                            'foto_cara_pembuatan' => $foto_cara_pembuatan[$i]->store('img', 'public'),
                            'langkah_langkah' => $caraPembuatan[$i],
                            'resep_id' => $resep->id
                        ];
                        Cara_pembuatan::query()->create($payloadCaraPembuatan);
                    }else{
                        $payloadCaraPembuatan = [
                            'langkah_langkah' => $caraPembuatan[$i],
                            'resep_id' => $resep->id
                        ];
                        Cara_pembuatan::query()->create($payloadCaraPembuatan);
                    }
                }else{
                    $payloadCaraPembuatan = [
                        'langkah_langkah' => $caraPembuatan[$i],
                        'resep_id' => $resep->id
                    ];
                    Cara_pembuatan::query()->create($payloadCaraPembuatan);
                }
            }
        }


        // INSERT BAHAN BAHAN
        $nama_bahan = $request->input('nama_bahan');
        $idBahan_bahan = [];

        // dd($bahan_bahan);
        if($nama_bahan != null){
            for($i = 0; $i < count($nama_bahan); $i++){
                $payloadBahanBahan = [
                    'nama_bahan' => strtolower($nama_bahan[$i])
                ];
                $dbBahan_bahan = Bahan_bahan::query()->where('nama_bahan', $payloadBahanBahan["nama_bahan"])->first();
                if($dbBahan_bahan == null || strtolower($dbBahan_bahan->nama_bahan) != strtolower($payloadBahanBahan["nama_bahan"])){
                    $dbBahan_bahan = Bahan_bahan::query()->create($payloadBahanBahan);
                }
                array_push($idBahan_bahan, $dbBahan_bahan->id);
            }
        }

        // INSERT TAKARAN
        $takaran = $request->input('takaran');

        for($i = 0; $i < count($takaran); $i++){
            if($takaran[$i] != null){
                $payloadResepBahan = [
                    'resep_id' => $resep->id,
                    'bahan_bahan_id' => $idBahan_bahan[$i],
                    'takaran' => $takaran[$i]
                ];
                Resep_bahan::query()->create($payloadResepBahan);
            }
        }

        return redirect()->back()->with("success", "Yesss !!! Ada Resep baru");
    }


    public function update($id){
        $resep = Resep::query()->where('id', $id)->first();
        $kategori = Kategori::query()->where('id', $resep->kategori_id)->first();
        $cara_pembuatan = Cara_pembuatan::query()->where('resep_id', $resep->id)->get();
        $resep_bahan = Resep_bahan::query()->where('resep_id', $resep->id)->get();
        $resep_bahan = $resep_bahan->map(function($value){
            $bahan = Bahan_bahan::query()->where('id', $value->bahan_bahan_id)->get();
            $value->bahan_bahan = $bahan;
            return $value;
        });
        $resep->cara_pembuatan = $cara_pembuatan;
        $resep->kategori = $kategori;
        $resep->resep_bahan = $resep_bahan;

        return view('resep.update', [
            'resep' => $resep
        ]);
    }

    public function edit(Request $request, $id){
        $id_chef = session()->get('idUser');


        // INSERT KE TABLE KATEGORI
        $payloadKategori = [
            'nama_kategori' => strtolower($request->input('nama_kategori'))
        ];

        $kategori = Kategori::query()->where('nama_kategori', strtolower($payloadKategori["nama_kategori"]))->first();

        if($kategori == null || strtolower($kategori->nama_kategori) != strtolower($payloadKategori["nama_kategori"])){
            $kategori = Kategori::query()->create($payloadKategori);
        }


        // INSERT KE TABLE RESEP
        $resep = Resep::query()->where('id', $id)->first();

        $payloadResep = [
            'chef_id' => $id_chef,
            'kategori_id' => $kategori->id,
            'nama_resep' => $request->input('nama_resep'),
            'deskripsi' => $request->input('deskripsi'),
            'pengeluaran_masak' => $request->input('pengeluaran_masak'),
        ];

        if($request->hasFile("foto_resep")){
            Storage::disk('public')->delete($resep->foto_resep);
            $payloadResep["foto_resep"] = $request->file('foto_resep')->store('img', 'public');
        }

        Resep::query()->where('id', $id)->update($payloadResep);


        // INSERT KE TABLE CARA_PEMBUATAN
        $caraPembuatan = $request->input('langkah_langkah');
        $foto_cara_pembuatan = $request->file('foto_cara_pembuatan');

        $cara_pembuatan = Cara_pembuatan::query()->orderBy('id', 'asc')->where('resep_id', $resep->id)->get();
        $id_collection_cara_pembuatan = $cara_pembuatan->map(function($item){
            return $item->id;
        });

        $id_cara_pembuatan = [];
        foreach($id_collection_cara_pembuatan as $icp){
            array_push($id_cara_pembuatan, $icp);
        };

        for($i = 0; $i < count($caraPembuatan); $i++){
            $payloadCaraPembuatan = [
                'langkah_langkah' => $caraPembuatan[$i],
                'resep_id' => $resep->id
            ];

            if($caraPembuatan[$i] == null){
                if(array_key_exists($i, $id_cara_pembuatan)){
                    Cara_pembuatan::query()->where('id', $id_cara_pembuatan[$i])->first()->delete();
                    continue;
                }else{
                    continue;
                }
            }


            if($foto_cara_pembuatan != null){
                if(array_key_exists($i, $foto_cara_pembuatan)){
                    if(array_key_exists($i, $id_cara_pembuatan)){
                        $payloadCaraPembuatan['foto_cara_pembuatan'] = $foto_cara_pembuatan[$i]->store('img', 'public');
                    }else{
                        $detail_cara_pembuatan = Cara_pembuatan::query()->where('id', $id_cara_pembuatan[$i])->first();
                        Storage::disk('public')->delete($detail_cara_pembuatan->foto_cara_pembuatan);
                        $payloadCaraPembuatan['foto_cara_pembuatan'] = $foto_cara_pembuatan[$i]->store('img', 'public');
                    }
                }
            }

            if($caraPembuatan[$i] != null){
                if(!array_key_exists($i, $id_cara_pembuatan)){
                    Cara_pembuatan::query()->create($payloadCaraPembuatan);
                }else{
                    Cara_pembuatan::query()->where('id', $id_cara_pembuatan[$i])->update($payloadCaraPembuatan);
                }
            }
        }


        // INSERT KE TABLE BAHAN_BAHAN
        $nama_bahan = $request->input('nama_bahan');
        $idBahan_bahan = [];

        $takaran = $request->input('takaran');
        $resep_bahan = Resep_bahan::query()->orderBy('id', 'asc')->where('resep_id', $resep->id)->get();

        $id_collection_resep_bahan = $resep_bahan->map(function($item){
            return $item->id;
        });

        $id_resep_bahan = [];
        foreach($id_collection_resep_bahan as $irb){
            array_push($id_resep_bahan, $irb);
        };

        for($i = 0; $i < count($nama_bahan); $i++){
            if($nama_bahan[$i] == null){
                if(array_key_exists($i, $id_resep_bahan)){
                    Resep_bahan::query()->where('id', $id_resep_bahan[$i])->first()->delete();
                    continue;
                }else{
                    continue;
                }
            }
        }

        if($nama_bahan != null){
            for($i = 0; $i < count($nama_bahan); $i++){
                $payloadBahanBahan = [
                    'nama_bahan' => strtolower($nama_bahan[$i])
                ];
                $dbBahan_bahan = Bahan_bahan::query()->where('nama_bahan', $payloadBahanBahan["nama_bahan"])->first();
                if($dbBahan_bahan == null || strtolower($dbBahan_bahan->nama_bahan) != strtolower($payloadBahanBahan["nama_bahan"])){
                    $dbBahan_bahan = Bahan_bahan::query()->create($payloadBahanBahan);
                }
                array_push($idBahan_bahan, $dbBahan_bahan->id);
            }
        }


        // INSERT KE TABEL RESEP_BAHAN

        for($i = 0; $i < count($takaran); $i++){
            $payloadResepBahan = [
                'resep_id' => $resep->id,
                'bahan_bahan_id' => $idBahan_bahan[$i],
                'takaran' => $takaran[$i]
            ];

            if($takaran[$i] != null){
                if(array_key_exists($i, $id_resep_bahan)){
                    Resep_bahan::query()->where('id', $id_resep_bahan[$i])->update($payloadResepBahan);
                }else{
                    Resep_bahan::query()->create($payloadResepBahan);
                }
            }
        }

        return redirect()->back()->with("success", "Horeee !!! Resepmu sudah di update");
    }

    public function destroy($id){
        $resep = Resep::query()->where('id', $id)->first();
        $cara_pembuatan = Cara_pembuatan::query()->where('resep_id', $id)->get();
        $resep_bahan = Resep_bahan::query()->where('resep_id', $id)->get();
        $simpan_resep = Simpan_resep::query()->where('resep_id', $id)->get();

        foreach($simpan_resep as $sr){
            $sr->delete();
        }

        foreach($cara_pembuatan as $cp){
            if($cp->foto_cara_pembuatan != null) {
                Storage::disk('public')->delete($cp->foto_cara_pembuatan);
            }
            $cp->delete();
        }

        foreach($resep_bahan as $rb){
            $rb->delete();
        }
        Storage::disk('public')->delete($resep->foto_resep);
        $resep->delete();
        
        return redirect()->back()->with("success", "Yahhh !!! Resepmu kenapa dihapus ?");
    }

    public function simpan($id){
        $user = session()->get("idUser");
        $payloadSimpanResep = [
            'user_id' => $user,
            'resep_id' => $id,
        ];
        
        $simpan = Simpan_resep::query()->where('user_id', $user)->where('resep_id', $id)->first();
        
        if($simpan == null){
            Simpan_resep::query()->create($payloadSimpanResep);
        }else{
            Simpan_resep::query()->where('id', $simpan->id)->delete();
        } 

        return redirect()->back();
    }

    public function simpan_resep(){
        $user = session()->get('idUser');
        $simpan = Simpan_resep::query()->where('user_id', $user)->get();
        $resep_id_simpan_resep = [];
        foreach($simpan as $s){
            array_push($resep_id_simpan_resep, $s->resep_id);
        }

        $simpan_resep_array = [];
        foreach($simpan as $val){
            array_push($simpan_resep_array, $val); 
        };

        $resep = Resep::query()->whereIn('id', $resep_id_simpan_resep)->get();
        $resep = $resep->map(function($item){
            $chef = Users::query()->where('id', $item->chef_id)->first();
            $item->chef = $chef;
            return $item;
        });
        
        return view('resep.simpan_resep', [
            'resep' => $resep,
            'simpan' => $simpan_resep_array
        ]);
    }
}


