@extends('layouts.admin.amaster')
@section('title','Ürün Ekleme Formu')
@section('keywords','')
@section('content')
    <section class="content-header">
        <h1>Ürün Düzenleme Formu</h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li><a href="{{url('/')}}/admin/kategoriler">Kategoriler</a></li>
            <li><a href="{{url('/')}}/admin/kategori/ekle">Kategori Ekle</a></li>
        </ol>
    </section>
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Kategori Düzenleme Formu</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form class="form-horizontal" action="{{url('/')}}/admin/kategori/save" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label   class="col-sm-2 control-label">Kategori Adı</label>
                    <div class="col-sm-10">
                        <input type="text" required name="adi" class="form-control"  placeholder="Kategori Adı">
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
                    <label  class="col-sm-2 control-label">Kategorisi</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="ust_id">
                            <option value="0">Kategori Yok</option>
                            @foreach($kategoriler as $rs)
                                <option value="{{$rs->Id}}">{{$rs->adi}}</option>
                            @endforeach
                        </select>
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
                    <label  class="col-sm-2 control-label">Kategori Resim</label>
                    <div class="col-sm-10">
                        <input type="file" required name="resim">
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