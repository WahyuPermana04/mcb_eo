@extends('layout.main_admin')

@section('content')
<div class="section-admin container-fluid mg-tb-30">
    <div class="row admin text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <div class="product-status-wrap">
                            <h4>History</h4>
                            <!-- <div class="add-product">
                                <a href="product-edit.html">Add Product</a>
                            </div> -->
                            <div class="hpanel">
                            <div class="panel-body">
                            <table id="bootstrap-data-table" class="table-bordered">
                            <form>
                                <thead>
                                {{csrf_field()}}
                                    <tr>
                                        <th>ID Pesanan</th>
                                        <th>Nama</th>
                                        <!-- <th>KETERANGAN</th> -->
                                        <th>ID Bayar</th>
                                        <th>Tanggal Bayar</th>
                                        <th>STATUS</th>
                                        <!-- <th>AKSI</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pembayaran as $p)
                                    <tr>
                                        <th>{{$p->id_pesanan}}</th>
                                        <th>{{$p->pemesanan->User->name}}</th>
                                        <th>{{$p->id_bayar}}</th>
                                        <th>{{$p->tgl_bayar}}</th>
                                        <th>
                                            @if ($p->status == 1)
                                                Lunas
                                            @else
                                            <a style="color:red">Belum Lunas</a>
                                            @endif 
                                        </th>
                                        <th>
                                            @if ($p->status == 1)
                                                <a data-toggle="modal" data-target="#ketModal" id="{{$p->id_pesanan}}|{{$p->id_bayar}}|{{$p->pemesanan->total_harga}}|{{$p->pemesanan->User->name}}|{{$p->status}}|{{$p->tgl_bayar}}|{{$p->pemesanan->User->phone}}|{{$p->bukti_bayar}}" class="btn btn-primary btn-sm btn-detail">Detail</a>
                                            @else
                                                <a data-toggle="modal" data-target="#ketModal" id="{{$p->id_pesanan}}|{{$p->id_bayar}}|{{$p->pemesanan->total_harga}}|{{$p->pemesanan->User->name}}|{{$p->status}}|{{$p->tgl_bayar}}|{{$p->pemesanan->User->phone}}|{{$p->bukti_bayar}}" class="btn btn-primary btn-sm btn-detail">Detail</a>
                                                <a href="/admin/bayar/{{ $p->id_pesanan}}" class="btn btn-primary btn-sm">Bayar</a>
                                            @endif 
                                        </th>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </form>
                            </table>

                            <div class="modal fade" id="ketModal" tabindex="-1" role="dialog" aria-labelledby="ketModal" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ketModal" >Detail</h5>
                                            <div class="modal-body" id="IsiModal">
                                            ...
                                            </div>
                                            <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                                </div>

                            </div></div>
                        </div>
                </div> 
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> -->
<script>
    $(document).ready(function() {
        // even ketika link a href diklik
        $('.btn-detail').on("click", function(){
        // ambil nilai id dari link detail simpan dalam var DataMahasiswa
        var Data= this.id;
        // Pecah DataMahasiswa dengan tanda | sebagai pemisah data hasilnya
        // disimpan dalam array datanya
        var datanya = Data.split("|");
        // bagian ini yang akan ditampilkan pada modal bootstrap
        // pengetikan HTML tidak boleh dienter, karena oleh javascript akan dibaca \r\n sehingga
        // modal bootstrap tidak akan jalan
        $("#IsiModal").html('<table class="table table-striped"><form><tbody><tr><td style="color:black" width="150">ID.Pesanan</td><td style="color:black" width="10">:</td><td style="color:black">'+datanya[0]+'</td></tr><tr><td style="color:black">ID Pembayaran</td><td style="color:black">:</td><td style="color:black">'+datanya[1]+'</td></tr><tr><td style="color:black">Nama Customer</td><td style="color:black">:</td><td style="color:black">'+datanya[3]+'</td></tr><tr><td style="color:black">Telepon Customer</td><td style="color:black">:</td><td style="color:black">'+datanya[6]+'</td></tr><tr><td style="color:black">Tanggal Bayar</td><td style="color:black">:</td><td style="color:black">'+datanya[5]+'</td></tr><tr><td style="color:black">Bukti Bayar</td><td style="color:black">:</td><td style="color:black"><img src="{{asset('bayar')}}/'+datanya[7]+'" style="width:300px"></td></tr></tbody></form></table>');
        });
   
    });
    </script>
@endsection