@extends('layout.main_user')

@section('content')

<head>
  <!-- <title>Bootstrap Jquery Add More Field Example</title> -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
</head>

<div class="section-admin container-fluid mg-tb-30">
    <div class="row admin text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <div class="product-status-wrap">

                    <div class="panel-body">
                            <!-- <form> -->
                            <h3>Pemesanan Jasa</h3><br>
                                <thead>
                                {{csrf_field()}}
                                    <tr>
                                        <th>Keterangan Acara: </th>
                                        <th>{{ $pesan->ket_pesanan }}</th>
                                    </tr><br/>
                                    <tr>
                                        <th>Tanggal: </th>
                                        <th>{{ $pesan->tgl_mulai }}</th>
                                        <th> - </th>
                                        <th>{{ $pesan->tgl_selesai }}</th>
                                    </tr><br/>
                                    <tr>
                                        <th>Lokasi: </th>
                                        <th>{{ $pesan->lokasi }}</th>
                                    </tr><br/>
                                </thead>
                            <!-- </form> -->
                            <br>

                     

                        <form action="/pesancs" method="POST">
                        {{ csrf_field() }}
                        <div class="input-group control-group after-add-more">
                        <input type="hidden" name="id_pesan" hidden value="{{ $pesan->id_pesanan }}" class="form-control" placeholder=". . .">

                        <!-- <label>Item</label>
                        <select name="dokum[]" class="form-control" placeholder=". . ."> 
							@foreach ($dokum as $do)<option value="{{ $do -> id_item }}">{{ $do->nama_item }}</option>@endforeach</select></br> -->

                        <!-- <input type="text" name="jumlah[]" class="form-control" placeholder="jumlah"> -->

						<label>Pilih Layanan</label>

                        <div class="input-group mg-b-pro-edt"> 
                            <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add Dokumentasi</button>
                        
                            <button class="btn btn-success add-moree" type="button"><i class="glyphicon glyphicon-plus"></i> Add Dekorasi</button>
                        </div>
                        </div>
                        <div class="input-group mg-b-pro-edt">
                            <br>
                            <input type="submit" class="btn btn-success" value="Pesan">
						</div>
                        </form>

                        <!-- Copy Fields -->
                        <div class="copy hide">
                            <div class="control-group input-group" style="margin-top:10px">
                                <label>Dokumentasi</label>
                                <select name="dokum[]" class="form-control" placeholder=". . ."> 
                                @foreach ($dokum as $do)<option value="{{ $do -> id_item }}">{{ $do->nama_item }}</option>@endforeach</select></br>
                                <!-- <input type="text" name="jumlah[]" class="form-control" placeholder="jumlah"> -->
                                <div class="input-group-btn"> 
                                <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                </div>
                            </div>
                        </div>

                        <!-- Copy Fields -->
                        <div class="copyy hide">
                            <div class="control-group input-group" style="margin-top:10px">
                                <label>Dekorasi</label>
                                <select name="dekor[]" class="form-control" placeholder=". . ."> 
                                @foreach ($dekor as $de)<option value="{{ $de -> id_dekor }}">{{ $de->nama_dekor }}</option>@endforeach</select></br>
                                <!-- <input type="text" name="jumlah[]" class="form-control" placeholder="jumlah"> -->
                                <div class="input-group-btn"> 
                                <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div> 
            </div>
        </div>
    </div>
</div>

<!-- <body>
<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">FORM PEMESANAN CUSTOM</div>
    
  </div>
</div> -->

<script type="text/javascript">
    $(document).ready(function() {
      $(".add-more").click(function(){ 
          var html = $(".copy").html();
          $(".after-add-more").after(html);
      });
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });

    $(document).ready(function() {
      $(".add-moree").click(function(){ 
          var html = $(".copyy").html();
          $(".after-add-more").after(html);
      });
      $("body").on("click",".remove",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
</script>
<!-- </body> -->
@endsection