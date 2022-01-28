@extends('layout.main_user')

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
                                        <th>ID</th>
                                        <th>TANGGAL ACARA</th>
                                        <!-- <th>KETERANGAN</th> -->
                                        <!-- <th>LOKASI</th> -->
                                        <!-- <th>PAKET</th> -->
                                        <th>HARGA</th>
                                        <th>STATUS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pemesanan as $p)
                                    <tr>
                                        <th>{{$p->id_pesanan}}</th>
                                        <th>{{$p->tgl_mulai}} - {{$p->tgl_selesai}}</th>
                                        <!-- <th>{{$p->ket_pesanan}}</th> -->
                                        <!-- <th>{{$p->lokasi}}</th> -->
                                        <!-- <th>{{$p->id_paket}}</th> -->
                                        <th>{{$p->total_harga}}</th>
                                        <th>
                                            @if ($p->status == 3)
                                            Belum Dikonfirmasi
                                            @elseif ($p->status == 2)
                                            Disetujui | 
                                            <a href="/bayar/{{ $p->id_pesanan}}" style="color:red">Belum Dibayar</a>
                                            @elseif ($p->status == 1)
                                            Telah Dilunasi
                                            @elseif ($p->status == 6)
                                            Ditolak
                                            @endif
                                        </th>
                                        <th>
                                            <a data-toggle="modal" data-target="#ketModal1" id="{{$p->id_pesanan}}|{{$p->User->name}}|{{$p->tgl_mulai}}|{{$p->tgl_selesai}}|{{$p->ket_pesanan}}|{{$p->lokasi}}|{{$p->paket->nama_paket}}|{{$p->status}}|{{$p->User->phone}}|{{$p->total_harga}}" class="btn btn-primary btn-sm btn-detail1">Detail</a>
                                        </th>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </form>
                            </table>

                            <div class="modal fade" id="ketModal1" tabindex="-1" role="dialog" aria-labelledby="ketModal1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="ketModal1" >Detail</h5>
                                            <div class="modal-body" id="IsiModal1">
                                            ...
                                            </div>
                                            <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
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
        $('.btn-detail1').on("click", function(){
        // ambil nilai id dari link detail simpan dalam var DataMahasiswa
        var Data= this.id;
        // Pecah DataMahasiswa dengan tanda | sebagai pemisah data hasilnya
        // disimpan dalam array datanya
        var datanya = Data.split("|");
        // bagian ini yang akan ditampilkan pada modal bootstrap
        // pengetikan HTML tidak boleh dienter, karena oleh javascript akan dibaca \r\n sehingga
        // modal bootstrap tidak akan jalan
        $("#IsiModal1").html('<table class="table table-striped"><form><tbody><tr><td style="color:black" width="150">ID.Pesanan</td><td style="color:black" width="10">:</td><td style="color:black">'+datanya[0]+'</td></tr><tr><td style="color:black">Nama Customer</td><td style="color:black">:</td><td style="color:black">'+datanya[1]+'</td></tr><tr><td style="color:black">No Telepon</td><td style="color:black">:</td><td style="color:black">'+datanya[8]+'</td></tr><tr><td style="color:black">Tanggal acara</td><td style="color:black">:</td><td style="color:black">'+datanya[2]+' - '+datanya[3]+'</td></tr><tr><td style="color:black">Lokasi acara</td><td style="color:black">:</td><td style="color:black">'+datanya[5]+'</td></tr><tr><td style="color:black">Keterangan</td><td style="color:black">:</td><td style="color:black">'+datanya[6]+' - '+datanya[4]+'</td><tr><td style="color:black">Total Bayar</td><td style="color:black">:</td><td style="color:black">'+datanya[9]+'</td></tr></tbody></form></table>');
        });
   
    });
    </script>
@endsection