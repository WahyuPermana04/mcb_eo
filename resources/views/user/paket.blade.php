@extends('layout.main_user')

@section('content')
<div class="section-admin container-fluid mg-tb-30">
    <div class="row admin text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <div class="product-status-wrap">
                            <h4>DAFTAR PAKET</h4>
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
                                        <th width="50px">ID</th>
                                        <th width="200px">NAMA PAKET</th>
                                        <th>DAFTAR LAYANAN</th>
                                        <th>HARGA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($paket as $p)
                                    <tr>
                                        <th>{{$p->id_paket}}</th>
                                        <th>{{$p->nama_paket}}</th>
                                        <th>{{$p->ket_paket}}</th>
                                        <th>{{$p->total_harga}}</th>
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