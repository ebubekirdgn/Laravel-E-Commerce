<?php

namespace App\Http\Controllers\Admin;

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
        if($request->hasFile('resim'))
        {
            $file = $request->file('resim');
            $name = time().$file->getClientOriginalName();
            $file -> move(public_path().'/userfiles/',$name);
        }
        else
            $name = $request->resim2;

        DB::table('kitaplars')
            ->where('Id',$id)
            ->update([
                'adi'=>$request->adi,
                    'keywords' => $request->keywords,
                    'description' => $request->description,
                    'turu_id'=>$request->turu_id,
                    'kategori_id'=>$request->kategori_id,
                    'yazar'=>$request->yazar,
                    'stok'=>$request->stok,
                    'alisFiyati'=>$request->alisFiyati,
                    'satisFiyati'=>$request->satisFiyati,
                    'aciklama'=>$request->aciklama,
                    'resim' => $name,
                    'durum'=>$request->durum,
            ]);
        return redirect('admin/urunler')->with('success',$request->adi.' Güncelleme Başarılı.');
    }

    public function destroy($id)
    {
        DB::delete('delete from kitaplars where id = ?',[$id]);
        return redirect('admin/urunler')->with('success','Silme Başarılı.');
    }
    public function galeri_formu($id)
    {
        $resimler = DB::select('SELECT * FROM images where urun_id = ?',[$id]);

        $veri = DB::select('SELECT * FROM kitaplars where id = ?',[$id]);

        return view('admin.urun_galeri_ekleme',compact('veri','resimler'));
        //rs = record set
    }
    public function galeri_ekle($id,Request $request)
    {
        if($request->hasFile('resim'))
        {
            $file = $request->file('resim');
            $name = time().$file->getClientOriginalName();
            $file -> move(public_path().'/userfiles/',$name);
        }

        DB::table('images')->insert([
            'urun_id'=>$request->id,
            'resim' => $name
        ]);
        return redirect('admin/urun/galeri/'.$request->id)->with('success','Ürünler kaydedildi.');
    }

    public function galeri_sil($id)
    {
        DB::delete('delete from images where Id = ?',[$id]);
        return redirect('admin/urun/galeri/'.$id)->with('success',' Galeriden resim silindi.');
    }
}
