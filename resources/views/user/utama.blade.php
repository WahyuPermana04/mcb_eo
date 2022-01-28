@extends('layout.main_user')

@section('content')
<div class="section-admin container-fluid mg-tb-30">
    <div class="row admin text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="admin-content analysis-progrebar-ctn">

        <div class="product-sales-area mg-tb-30">
            <div class="container-fluid">
                <div class="row">
                    <div class="hpanel">
                        <div class="panel-body">
                            <b style="font-size: 20px;font-family: Comic, cursive;">PROFIL MCB EVENT ORGANIZER</b>
                            <div><br></br></div>
                            <p style="font-size: 18px;font-family: Comic, cursive;">MCB Event Organizer merupakan salah satu perusahaan yang bergerak di bidang penyewaan jasa untuk menyelenggarakan suatu acara agar berjalan sesuai yang diinginkan oleh client. MCB melayani customer wilayah Lamongan dan jasa yang ditawarkan berfokus pada dekorasi untuk event, dokumentasi, serta penerbitan video. </p>
                            <b style="font-size: 18px;font-family: Comic, cursive;">Alamat</b>
                            <p style="font-size: 18px;font-family: Comic, cursive;">Kakat Timur SDN, Kakat, Kakatpenjalin, Ngimbang, Kabupaten Lamongan, Jawa Timur 62273, Indonesia</p>
                            <b style="font-size: 18px;font-family: Comic, cursive;">Telepon</b>
                            <p style="font-size: 18px;font-family: Comic, cursive;">0856-0678-3222</p>
                        </div>
                    </div> 
                </div>
            </div>
        </div>

                    </div>

        <div class="product-new-list-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <!-- batas gambar -->
                            <th>
                                <img src="{{asset('item')}}/foto1.jpg" style="width:100%;height:150px">
                            </th>
                            <!-- batas gambar -->
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <!-- batas gambar -->
                            <th>
                                <img src="{{asset('item')}}/foto2.jpg" style="width:100%;height:150px">
                            </th> 
                            <!-- batas gambar -->
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <!-- batas gambar -->
                            <th>
                                <img src="{{asset('item')}}/foto3.jpg" style="width:100%;height:150px">
                            </th>
                            <!-- batas gambar -->
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="single-new-trend mg-t-30">
                            <!-- batas gambar -->
                            <th>
                                <img src="{{asset('item')}}/foto4.jpg" style="width:100%;height:150px">
                            </th>
                            <!-- batas gambar -->
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