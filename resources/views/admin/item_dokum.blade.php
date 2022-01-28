@extends('layout.main_admin')

@section('content')
<div class="section-admin container-fluid mg-tb-30">
    <div class="row admin text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                <div class="product-status-wrap">
                            <h4>JENIS KAMERA</h4>
                            <div class="add-product">
                                <a data-toggle="modal" data-target="#tambahDokum" class="btn btn-primary btn-sm">Tambah Item</a>
                            </div>
                            <div class="hpanel">
                            <div class="panel-body">
                            <table>
                                <form>
                                <thead>
                                {{csrf_field()}}
                                    <tr>
                                        <th>ID</th>
                                        <th>NAMA KAMERA</th>
                                        <th>HARGA SEWA</th>
                                        <th>TERSEDIA</th>
                                        <th>FOTO</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ddok as $d)
                                    <tr>
                                        <th>{{$d->item_dokum->id_item}}</th>
                                        <th>{{$d->item_dokum->nama_item}}</th>
                                        <th>{{$d->harga}}</th>
                                        <th>{{$d->item_dokum->tersedia}}</th>
                                        <td>
                                            <img src="{{asset('item')}}/{{$d->item_dokum->foto}}" style="width:150px;height:150px">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </form>
                            </table>
                            </div></div>
                        </div>

                        <div class="modal fade" id="tambahDokum" tabindex="-1" role="dialog" aria-labelledby="tambahLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="pdfLabel">Tambah Item</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/admin/tambahDokum" method="post" >
                                        {{csrf_field()}}
                                            <div class="form-group">
                                                <label>ID</label>
                                                <input type="text" class="form-control" id="id_item" placeholder="..." name="id_item" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Item</label>
                                                <input type="text" class="form-control" id="nama_item" placeholder="..." name="nama_item" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Tersedia</label>
                                                <input type="number" class="form-control" id="tersedia" placeholder="..." name="tersedia" required>
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