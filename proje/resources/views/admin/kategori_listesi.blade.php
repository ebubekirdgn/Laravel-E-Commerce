@extends('layouts.admin.amaster')
@section('title','Kategoriler')
@section('keywords','')

@section('content')
    <section class="content-header">
        <h1>Kategori Listesi</h1>
        <ol class="breadcrumb">
            <li><a href="{{url('/')}}/admin"><i class="fa fa-dashboard"></i> Anasayfa</a></li>
            <li><a href="{{url('/')}}/admin/kategoriler">Kategoriler</a></li>

        </ol>
    </section>
    <div class="box">
        <div class="box-header with-border">
            <a href="{{url('/')}}/admin/kategori/ekle" class="btn btn-success btn-flat">Kategori Ekle</a>
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
                    <th>Üst Kategorisi</th>
                    <th>Durum</th>
                    <th>Resim</th>
                    <th></th>
                </tr>
                @foreach($datas as $rs)
                    <tr>
                        <td>{{$rs -> Id}}</td>
                        <td>{{$rs -> adi}}</td>
                        <td>{{$rs -> ust_id}}</td>
                        <td>{{$rs -> durum}}</td>
                        <td><img src=" {{url('/')}}/userfiles/{{$rs->resim}}" width="70px" height="70px" /></td>
                        <td>
                            <a href="{{url('/')}}/admin/kategori/edit/{{$rs->Id}}" class="btn btn-primary">Düzenle</a>
                            <a href="{{url('/')}}/admin/kategori/del/{{$rs->Id}}" onclick="return confirm('{{$rs->adi}} adlı veriyi silmek istediğinizden emin misiniz?')" class="btn btn-danger">Sil</a>
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