<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Kitaplar;

class UrunlerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //urunler sayfasının ana girişi
        $sql='select k.id,k.adi,k.resim,k.satisFiyati,k.stok,k.durum,c.adi as kategori,t.adi as turu
            from kitaplar k ,kategoriler c,turler t
            where k.kategori_id = c.Id and k.turu_id = t.Id
            ORDER by k.adi';
        $urunler = DB::select($sql);

        return view('admin.urun_listesi',['urunler'=>$urunler]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Ekleme Formu

        $turler = DB::select('SELECT * FROM turler ORDER BY adi');
        $kategoriler = DB::select('SELECT * FROM kategoriler ORDER BY adi');

        return view('admin.urun_ekleme',['turler'=>$turler],['kategoriler'=>$kategoriler]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('resim'))
        {
            $file = $request->file('resim');
            $name = time().$file->getClientOriginalName();
            $file -> move(public_path().'/userfiles/',$name);
        }

        DB::table('kitaplar')->insert([
            [
                'adi'=>$request->get('adi'),
                'keywords' => $request->get('keywords'),
                'description' => $request->description,
                'turu_id'=>$request->turu_id,
                'kategori_id'=>$request->kategori_id,
                'yazar'=>$request->yazar,
                'stok'=>$request->stok,
                'alisFiyati'=>$request->alisFiyati,
                'satisFiyati'=>$request->satisFiyati,
                'aciklama'=>$request->aciklama,
                'durum'=>$request->durum,
                'resim' => $name
            ]
        ]);
        return redirect('admin/urunler')->with('success','Ürünler kaydedildi.');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Tek veri gösterme
        echo "Gösterme".$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Düzenleme formunu gösterir.
        echo "Düzenleme ".$id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Düzenleme formundan gelen verileri günceller.
        echo "Güncelleme".$id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        echo "silme".$id;
    }
}
