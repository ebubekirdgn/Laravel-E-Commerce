<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Kitaplar;

class UrunlerController extends Controller
{
    public function index()
    {
        //urunler sayfasının ana girişi

        $sql='select k.Id ,k.adi,k.resim,k.satisFiyati,k.stok,k.durum,c.adi as kategori,t.adi as turu
            from kitaplars k ,kategoriler c,turler t
            where k.kategori_id = c.Id and k.turu_id = t.Id
            ORDER by k.adi';
        $urunler = DB::select($sql);

        return view('admin.urun_listesi',['urunler'=>$urunler]);

    }

    function create()
    {
        //Ekleme Formu

        $turler = DB::select('SELECT * FROM turler ORDER BY adi');
        $kategoriler = DB::select('SELECT * FROM kategoriler ORDER BY adi');

        return view('admin.urun_ekleme',['turler'=>$turler],['kategoriler'=>$kategoriler]);
    }

    public function store(Request $request)
    {
        if($request->hasFile('resim'))
        {
            $file = $request->file('resim');
            $name = time().$file->getClientOriginalName();
            $file -> move(public_path().'/userfiles/',$name);
        }

        DB::table('kitaplars')->insert([
            ['adi'=>$request->get('adi'),
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
                'resim' => $name]
        ]);
        return redirect('admin/urunler')->with('success','Ürünler kaydedildi.');
    }

    public function show($id)
    {
        //Tek veri gösterme
        echo "Gösterme".$id;
    }

    public function edit($id)
    {

        $turler = DB::select('SELECT * FROM turler ORDER BY adi');
        $kategoriler = DB::select('SELECT * FROM kategoriler ORDER BY adi');


        //$veri = Kitaplar::findOrFail($id);
        $veri = DB::select('select k.*,c.adi as kategori,t.adi as turu
            from kitaplars k ,kategoriler c,turler t
            where k.kategori_id = c.Id and k.turu_id = t.Id and k.Id = ?',[$id]);

        return view("admin.urun_duzenleme",compact('veri','turler','kategoriler'));
        //rs = record set
    }

    public function update(Request $request, $id)
    {
        //Düzenleme formundan gelen verileri günceller.
        //echo "Güncelleme".$id;

        if($request->hasFile('resim'))
        {
            $file = $request->file('resim');
            $name = time().$file->getClientOriginalName();
            $file -> move(public_path().'/userfiles/',$name);
        }

        DB::table('kitaplars')
            ->where('Id',$id)
            ->update([
                ['adi'=>$request->get('adi'),
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
                    'resim' => $name]
            ]);
    }

    public function destroy($id)
    {
        //
        echo "silme".$id;
    }
}
