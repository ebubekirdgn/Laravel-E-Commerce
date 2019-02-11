
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Ürün Galeri Formu</h3>
        </div>
        <form class="form-horizontal" action="{{url('/')}}/admin/urun/galeri/{{$veri[0]->Id}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                   Ürün Adı: <label   class="col-sm-2 control-label">{{$veri[0]->adi}}</label>
                </div>
                <br>
                <hr>
                Ürün Galeri Resmi : <input type="file" name="resim" onchange="javascript:this.form.submit();">
                <input type="hidden" name="id" value="{{$veri[0]->Id}}" >
                <button type="submit" class="btn btn-success pull-right">Ekle</button>

                @if (\Session::has('success'))
                    <div class="alert alert-success">
                        <p>{{\Session::get('success')}}</p>
                    </div>
                    </br>
                @endif
                <hr>
                <img src="{{url('/')}}/userfiles/{{$veri[0]->resim}}" width="150" height="150">
                @foreach($resimler as $rs)
                    <img src="{{url('/')}}/userfiles/{{$rs->resim}}" width="150" height="150">
                    <a href="{{url('/')}}/admin/urun/galerisil/{{$rs->Id}}" onclick="return confirm('silmek istediğinizden emin misiniz?')" class="btn btn-danger">Sil</a>

                @endforeach
            </div>
         </form>
    </div>


