<?php

namespace App\Http\Controllers\Admin;

use App\Kategoriler;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoriler = DB::select('SELECT * FROM kategoriler ORDER BY adi');

        return view('admin.kategori_listesi',['datas'=>$kategoriler]);

    }

    function create()
    {
       $kategoriler = DB::select('SELECT * FROM kategoriler ORDER BY adi');
       return view('admin.kategori_ekleme',['kategoriler'=>$kategoriler]);
    }

    public function store(Request $request)
    {
        if($request->hasFile('resim'))
        {
            $file = $request->file('resim');
            $name = time().$file->getClientOriginalName();
            $file -> move(public_path().'/userfiles/',$name);
        }

        DB::table('kategoriler')->insert([
            'adi'=>$request->adi,
                'keywords' => $request->keywords,
                'description' => $request->description,
                'ust_id'=>$request->ust_id,
                'durum'=>$request->durum,
                'resim' => $name
        ]);
        return redirect('admin/kategoriler')->with('success','Ürünler kaydedildi.');
    }

    public function show($id)
    {
        //Tek veri gösterme
        echo "Gösterme".$id;
    }

    public function edit($id)
    {
        $kategori = DB::select('SELECT * FROM kategoriler WHERE ust_id=0 ORDER BY adi');
        $x = Kategoriler::findOrFail($id);
        $veri = DB::select('SELECT a.*,b.adi as kategori
                FROM kategoriler a LEFT  JOIN kategoriler b
                ON a.ust_id = b.Id
                WHERE a.Id =?',[$id]);

        return view("admin.kategori_duzenleme",compact('veri','kategori'));
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

        DB::table('kategoriler')
            ->where('Id',$id)
            ->update([
                    'adi'=>$request->adi,
                    'keywords' => $request->keywords,
                    'description' => $request->description,
                    'ust_id'=>$request->ust_id,
                    'durum'=>$request->durum,
                    'resim' => $name
            ]);
        return redirect('admin/kategoriler')->with('success',$request->adi.' Kategorisi Güncelleme Başarılı.');
    }
    public function destroy($id)
    {
        DB::delete('delete from kategoriler where id = ?',[$id]);
        return redirect('admin/kategoriler')->with('success','Silme Başarılı.');
    }
}
