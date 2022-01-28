@extends('layout.main_user')

@section('content')
<div class="section-admin container-fluid mg-tb-30">
    <div class="row admin text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <div class="product-status-wrap">
                            <h4>JENIS KAMERA</h4>
                            <!-- <div class="add-product">
                                <a href="product-edit.html">Add Product</a>
                            </div> -->
                            <div class="hpanel">
                            <div class="panel-body">
                            <table>
                                <form>
                                <thead>
                                {{csrf_field()}}
                                    <tr>
                                        <th>ID</th>
                                        <th>NAMA KAMERA</th>
                                        <th>HARGA SEWA</th>
                                        <th>TERSEDIA</th>
                                        <th>FOTO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ddok as $d)
                                    <tr>
                                        <th>{{$d->item_dokum->id_item}}</th>
                                        <th>{{$d->item_dokum->nama_item}}</th>
                                        <th>{{$d->harga}}</th>
                                        <th>{{$d->item_dokum->tersedia}}</th>
                                        <td>
                                            <img src="{{asset('item')}}/{{$d->item_dokum->foto}}" style="width:150px;height:150px">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </form>
                            </table>
                            </div></div>
                        </div>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection