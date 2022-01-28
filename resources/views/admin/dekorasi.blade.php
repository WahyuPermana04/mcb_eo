@extends('layout.main_admin')

@section('content')
<div class="section-admin container-fluid mg-tb-30">
    <div class="row admin text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <div class="product-status-wrap">
                            <h4>JENIS DEKORASI</h4>
                            <div class="add-product">
                            <a data-toggle="modal" data-target="#tambahDekor" class="btn btn-primary btn-sm">Tambah Dekorasi</a>
                            </div>
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

                        <div class="modal fade" id="tambahDekor" tabindex="-1" role="dialog" aria-labelledby="tambahLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="pdfLabel">Tambah  Dekorasi</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin/tambahDekor" method="post" >
                                        {{csrf_field()}}
                                            <div class="form-group">
                                                <label>ID</label>
                                                <input type="text" class="form-control" id="id_dekor" placeholder="..." name="id_dekor" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Dekorasi</label>
                                                <input type="text" class="form-control" id="nama_dekor" placeholder="..." name="nama_dekor" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Keterangan</label>
                                                <input type="text" class="form-control" id="ket_dekor" placeholder="..." name="ket_dekor" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Harga</label>
                                                <input type="text" class="form-control" id="harga" placeholder="..." name="harga" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary" id="generate">Simpan</button>
                                        </form>
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
@endsection