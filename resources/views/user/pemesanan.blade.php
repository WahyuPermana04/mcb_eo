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
                            <h4>FORM PEMESANAN JASA</h4>
                            <!-- <div class="add-product">
                                <a href="product-edit.html">Add Product</a>
                            </div> -->
                            <div class="hpanel">
                                <div class="panel-body">
                                <form action="/pesan" method="post">
						            {{ csrf_field() }}
						    	    <!-- <input type="hidden" name="id_pesanan"> <br/> -->

                                    <div class="input-group mg-b-pro-edt">
						    	   
                                    <input type="hidden" name="id_pesanan" class="form-control" placeholder=". . ."> </input>
						    	    </div>

                                    <div class="input-group mg-b-pro-edt">
						    	    <label>Keterangan Acara</label>
                                    <textarea type="text" name="ket_pesanan" class="form-control" placeholder="detail acara"> </textarea> *</div>

                                    <div class="input-group mg-b-pro-edt">
						    	    <label>Tgl Mulai</label>
                                    <input type="date" name="tgl_mulai" required="required" class="form-control" placeholder=". . ."> *</input>
						    	    </div>

                                    <div class="input-group mg-b-pro-edt">
						    	    <label>Tgl Selesai</label>
                                    <input type="date" name="tgl_selesai" class="form-control" placeholder=" Bisa dikosongi "></input>
						    	    </div>

                                    <div class="input-group mg-b-pro-edt">
						    	    <label>Lokasi Acara</label>
                                    <textarea type="text" name="lokasi" class="form-control" placeholder="Alamat acara"></textarea> *
						    	    </div>

                                    <div class="input-group mg-b-pro-edt">
							        <label>Paket</label>
                                    <select id="id_paket" name="id_paket" required="required" class="form-control" placeholder=" pilih paket"> 
							        @foreach ($paket as $p)<option value="{{ $p -> id_paket }}">{{$p -> nama_paket}}</option>@endforeach</select> *</br>
							        </div>

                                    <!-- <div class="input-group mg-b-pro-edt">
						    	    <label>Total Harga</label>
                                    <input type="text" name="hargatot" readonly class="form-control" placeholder="0"></input>
						    	    </div> -->
                                    <div class="input-group mg-b-pro-edt">
                                    <th>Tanda * berarti wajib diisi</th>
						    	    </div>
						    	    <div class="input-group mg-b-pro-edt">
                                    <input type="submit" class="btn btn-success" value="Lanjutkan">
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