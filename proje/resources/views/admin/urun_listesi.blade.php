@extends('layouts.admin.amaster')
@section('title','Ürünler Listesi')
@section('keywords','')

@section('content')
    <section class="content-header">
        <h1>Kitap Listesi</h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li><a href="{{url('/')}}/admin/urunler">Ürünler</a></li>

        </ol>
    </section>
    <div class="box">
        <div class="box-header with-border">
            <a href="{{url('/')}}/admin/urun/ekle" class="btn btn-success btn-flat">Kitap Ekle</a>
        </div>
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{\Session::get('success')}}</p>
            </div>
            </br>
        @endif
        <div class="box-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 10px">Id</th>
                    <th>Adı</th>
                    <th>Türü</th>
                    <th>Kategorisi</th>
                    <th>Satış Fiyatı</th>
                    <th>Stok</th>
                    <th>Durum</th>
                    <th>Resim</th>
                    <th></th>
                </tr>
                @foreach($urunler as $urun)
                    <tr>
                        <td>{{$urun -> Id}}</td>
                        <td>{{$urun -> adi}}</td>
                        <td>{{$urun -> turu}}</td>
                        <td>{{$urun -> kategori}}</td>
                        <td>{{$urun -> satisFiyati}}</td>
                        <td>{{$urun -> stok}}</td>
                        <td>{{$urun -> durum}}</td>
                        <td>
                            <img src=" {{url('/')}}/userfiles/{{$urun->resim}}" width="70px" height="70px" />
                            <a href="{{url('/')}}/admin/urun/galeri/{{$urun->Id}}" onclick="return !window.open(this.href,'','top=100 left=200 width=800,height=600')">Galeri</a>
                        </td>
                        <td>
                            <a href="{{url('/')}}/admin/urun/edit/{{$urun->Id}}" class="btn btn-primary">Düzenle</a>
                            <a href="{{url('/')}}/admin/urun/del/{{$urun->Id}}" onclick="return confirm('{{$urun->adi}} adlı veriyi silmek istediğinizden emin misiniz?')" class="btn btn-danger">Sil</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
            </ul>
        </div>
    </div>
@endsection