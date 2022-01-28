@extends('layout.main_admin')

@section('content')
<div class="section-admin container-fluid mg-tb-30">
    <div class="row admin text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <div class="product-status-wrap">
                            <h4>FORM KONFIRMASI PEMBAYARAN</h4>
                            <!-- <div class="add-product">
                                <a href="product-edit.html">Add Product</a>
                            </div> -->
                            <div class="hpanel">
                                <div class="panel-body">
                                @foreach($pesanan as $p)
                                <form action="/admin/lunas" method="post" enctype="multipart/form-data">
						            {{ csrf_field() }}
						    	    <!-- <input type="hidden" name="id_pesanan"> <br/> -->

                                    <div class="input-group mg-b-pro-edt">
                                    <label>ID Pesanan</label>
                                    <input type="text" name="id_pesanan" class="form-control" readonly value="{{ $p->id_pesanan }}" placeholder=". . ."></input>
						    	    </div>

                                    <div class="input-group mg-b-pro-edt">
						    	    <label>Total yg harus dibayar</label>
                                    <input type="text" name="total_harga" class="form-control" readonly value="{{ $p->total_harga }}"></input>
						    	    </div>

                                    <div class="input-group mg-b-pro-edt">
						    	    <label>Tgl Bayar</label>
                                    <input type="date" name="tgl_bayar" required="required" class="form-control" placeholder=". . ."> *</input>
						    	    </div>

                                    <div class="input-group mg-b-pro-edt">
						    	    <label>Bukti Bayar</label>
                                    <input type="file" required="required" class="form-control" id="bukti_bayar" name="bukti_bayar">
						    	    </div>

                                    <div class="input-group mg-b-pro-edt">
                                    <th>Tanda * berarti wajib diisi</th>
						    	    </div>
						    	    <div class="input-group mg-b-pro-edt">
                                    <input type="submit" class="btn btn-success" value="Lanjutkan">
						    	    </div>
    
						        </form>
                                @endforeach
                            </div>
                            </div>
                        </div>
                </div> 
            </div>
        </div>
    </div>
</div>

@endsection