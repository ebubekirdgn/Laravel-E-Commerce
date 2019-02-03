@extends('layouts.admin.amaster')
@section('title','Ürün Ekleme Formu')
@section('keywords','')
@section('content')
<section class="content-header">
    <h1>Ürün Düzenleme Formu</h1>
    <ol class="breadcrumb">
        <li><a href="{{url('/')}}/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
        <li><a href="{{url('/')}}/admin/urunler">Ürünler</a></li>
        <li><a href="{{url('/')}}/admin/urun/ekle">Ürün Ekle</a></li>
    </ol>
</section>
<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Ürün Düzenleme Formu</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form class="form-horizontal" action="{{url('/')}}/admin/urun/save" method="post" enctype="multipart/form-data">
        @csrf
        <div class="box-body">
            <div class="form-group">
                <label   class="col-sm-2 control-label">Ürün Adı</label>
                <div class="col-sm-10">
                    <input type="text" name="adi" class="form-control"  placeholder="Ürün Adı">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Anahtar Kelimeler</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="keywords" placeholder="Keywords">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="description" placeholder="Description">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Ürün Türü </label>
                <div class="col-sm-10">
                    <select class="form-control" name="turu_id">
                        @foreach($turler as $tur)
                            <option value="{{$tur->Id}}">{{$tur->adi}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Kategori Türü </label>
                <div class="col-sm-10">
                    <select class="form-control" name="kategori_id">
                        @foreach($kategoriler as $kategori)
                            <option value="{{$kategori->Id}}">{{$kategori->adi}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Yazar</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="yazar" placeholder="Yazar">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Stok Miktarı</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="0" name="stok" placeholder="Stok">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Alış Fiyatı</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="0" name="alisFiyati" placeholder="Alış Fiyatı">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Satış Fiyatı</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="0" name="satisFiyati" placeholder="Satış Fiyatı">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Açıklama</label>
                <div class="col-sm-10">
                    <textarea name="aciklama" id="aciklama" class="form-control" rows="10" cols="80"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Aktif Durumu</label>
                <div class="col-sm-10">
                    <select class="form-control" name="durum">
                        <option>Evet</option>
                        <option>Hayır</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">Resim</label>
                <div class="col-sm-10">
                    <input type="file" name="resim">
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <button type="submit" class="btn btn-success pull-right">Kaydet</button>
        </div>
        <!-- /.box-footer -->
    </form>
</div>
@endsection

@section("java")
    <script src="{{url('/')}}/assets/admin/bower_components/ckeditor/ckeditor.js"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('aciklama')
        })
     </script>
@endsection