@extends('layout.main_user')

@section('css')
<!-- Customer-Capture -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
<style type="text/css">
    #results { padding: 10px; border:1px solid; background:#ccc; }
</style>
@endsection

@section('content')
<div class="section-admin container-fluid mg-tb-30">
    <div class="row admin text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <div class="product-status-wrap">
                            <h4>Konfirmasi Pemesanan</h4>
                            <!-- <div class="add-product">
                                <a href="product-edit.html">Add Product</a>
                            </div> -->
                            <div class="hpanel">
                                <div class="panel-body">
                                <th>Harap Periksa Kembali Pesanan Anda, Ketika Telah yakin Tekan Tombol Selesaikan untuk Menyelesaikan Pemesanan Jasa.</th>
                                <form action="/pesanfix" method="post">
						            {{ csrf_field() }}
						    	    <!-- <input type="hidden" name="id_pesanan"> <br/> -->

                                    <div class="input-group mg-b-pro-edt">
                                    <input type="hidden" name="id_pesanan" hidden value="{{ $rekap->id_pesanan }}" class="form-control" placeholder=""> </input>
						    	    </div>

                                    <div class="input-group mg-b-pro-edt">
						    	    <label>Keterangan Acara</label>
                                    <input type="text" name="ket_pesanan" disabled value="{{ $rekap->ket_pesanan }}" class="form-control" placeholder="">
                                    </input></div>

                                    <div class="input-group mg-b-pro-edt">
						    	    <label>Tgl Acara</label>
                                    <input type="text" name="tgl" disabled value="{{$rekap -> tgl_mulai}} - {{$rekap -> tgl_selesai}}" class="form-control" placeholder=""></input>
						    	    </div>

                                    <div class="input-group mg-b-pro-edt">
						    	    <label>Alamat Acara</label>
                                    <input type="text" name="lokasi" readonly value="{{ $rekap->lokasi }}" class="form-control" placeholder="">
                                    </input>
						    	    </div>

                                    <div class="input-group mg-b-pro-edt">
							        <label>Paket</label>
                                    <input id="id_paket" name="id_paket" disabled value="{{ $rekap->paket->nama_paket }}" class="form-control" placeholder=""> 
							        </input></br>
							        </div>

                                    <div class="input-group mg-b-pro-edt">
						    	    <label>Total Harga</label>
                                    <input type="text" name="hargatot" disabled value="{{ $rekap->total_harga }}" class="form-control" placeholder="">
                                    </input>
						    	    </div>

						    	    <div class="input-group mg-b-pro-edt">
                                    <input type="submit" class="btn btn-success" value="Selesaikan">
						    	    </div>
    
						        </form>
                            </div>
                            </div>
                        </div>
                </div> 
            </div>
        </div>
    </div>
</div>

@endsection