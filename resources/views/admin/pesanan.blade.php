@extends('layout.main_admin')

@section('content')
<!-- Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>

<div class="section-admin container-fluid mg-tb-30">
    <div class="row admin text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <div class="product-status-wrap">
                            <h4>Pesanan Diterima</h4>
                            <div class="add-product">
                            <a href="/formPesan2" class="btn btn-primary btn-sm">Tambah Pesanan</a>
                            </div>
                            <div class="hpanel">
                            <div class="panel-body">
                            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                <form>
                                <thead>
                                {{csrf_field()}}
                                    <tr>
                                        <th>ID</th>
                                        <th>NAMA CUST</th>
                                        <th>KETERANGAN</th>
                                        <!-- <th>LOKASI</th> -->
                                        <th>TANGGAL ACARA</th>
                                        <!-- <th>PAKET</th> -->
                                        <!-- <th>HARGA</th> -->
                                        <th>STATUS</th>
                                        <!-- <th>AKSI</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pesanan as $p)
                                    <tr>
                                        <th>{{$p->id_pesanan}}</th>
                                        <th>{{$p->User->name}}</th>
                                        <th>
                                            <a data-toggle="modal" data-target="#ketModal" id="{{$p->id_pesanan}}|{{$p->User->name}}|{{$p->tgl_mulai}}|{{$p->tgl_selesai}}|{{$p->ket_pesanan}}|{{$p->lokasi}}|{{$p->paket->nama_paket}}|{{$p->status}}|{{$p->User->phone}}" class="btn btn-primary btn-sm btn-detail">Detail</a>
                                        </th>
                                        <!-- <th>{{$p->lokasi}}</th> -->
                                        <th>{{$p->tgl_mulai}} - {{$p->tgl_selesai}}</th>
                                        <th>
                                            @if ($p->status == 3)
                                                <a href="/admin/setuju/{{ $p->id_pesanan}}" class="btn btn-primary btn-sm">Setuju</a>
                                                <a href="/admin/tolak/{{ $p->id_pesanan}}" class="btn btn-primary btn-sm">Tolak</a>
                                            @elseif ($p->status == 2)
                                                Terkonfirmasi
                                            @elseif ($p->status == 1)
                                                Telah Dilunasi
                                            @elseif ($p->status == 6)
                                                Ditolak
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

                            </div>
                        </div>
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
        $("#IsiModal").html('<table class="table table-striped"><form><tbody><tr><td style="color:black" width="150">ID.Pesanan</td><td style="color:black" width="10">:</td><td style="color:black">'+datanya[0]+'</td></tr><tr><td style="color:black">Nama Customer</td><td style="color:black">:</td><td style="color:black">'+datanya[1]+'</td></tr><tr><td style="color:black">No Telepon</td><td style="color:black">:</td><td style="color:black">'+datanya[8]+'</td></tr><tr><td style="color:black">Tanggal acara</td><td style="color:black">:</td><td style="color:black">'+datanya[2]+' - '+datanya[3]+'</td></tr><tr><td style="color:black">Lokasi acara</td><td style="color:black">:</td><td style="color:black">'+datanya[5]+'</td></tr><tr><td style="color:black">Keterangan</td><td style="color:black">:</td><td style="color:black">'+datanya[6]+' - '+datanya[4]+'</td></tr></tbody></form></table>');
        });
   
    });
    </script>
@endsection
