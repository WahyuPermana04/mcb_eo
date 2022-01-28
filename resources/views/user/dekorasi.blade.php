@extends('layout.main_user')

@section('content')
<div class="section-admin container-fluid mg-tb-30">
    <div class="row admin text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <div class="product-status-wrap">
                            <h4>JENIS DEKORASI</h4>
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
                                        <th>DEKORASI</th>
                                        <th>KETERANGAN</th>
                                        <th>HARGA SEWA</th>
                                        <th>FOTO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ddek as $de)
                                    <tr>
                                        <th>{{$de->dekor->id_dekor}}</th>
                                        <th>{{$de->dekor->nama_dekor}}</th>
                                        <th>{{$de->dekor->ket_dekor}}</th>
                                        <th>{{$de->harga}}</th>
                                        <td>
                                            <img src="{{asset('item')}}/{{ $de->dekor->foto }}" style="width:150px;height:150px">
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