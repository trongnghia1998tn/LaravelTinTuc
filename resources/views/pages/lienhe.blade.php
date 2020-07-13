@extends('layout.index')
@section('title')
    Thông tin liên hệ | VnExpress
@endsection

@section('content')
<!-- Page Content -->
<div class="container">

    <div class="row main-left" style="font-family: Arial, Helvetica, sans-serif;">
        @include('layout.menu')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color: #f5f5f5;
                border-color: #ddd;">
                    <h2 style="margin-top:0px; margin-bottom:0px;">Liên hệ</h2>
                </div>

                <div class="panel-body">
                    <!-- item -->
                    <h3><span class="glyphicon glyphicon-align-left"></span> Thông tin liên hệ</h3>

                    <div class="break"></div>
                    <h4><span class="glyphicon glyphicon-home "></span> Địa chỉ: </h4>
                    <p>Ngõ 143, Chợ Khâm Thiên, Đống Đa, Hà Nội </p>

                    <h4><span class="glyphicon glyphicon-envelope"></span> Email: </h4>
                    <p>trongnghia1998tn@gmail.com </p>

                    <h4><span class="glyphicon glyphicon-phone-alt"></span> Điện thoại: </h4>
                    <p>0968.193.632 </p>
                    <h3><span class="glyphicon glyphicon-globe"></span> Bản đồ</h3>
                    <div class="break"></div><br>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1862.2423176492211!2d105.8393912!3d21.013286!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab84347b7a6f%3A0xd9e0c5e25ffc3260!2zTmfDtSAxNDMgUGjhu5EgQ2jhu6MgS2jDom0gVGhpw6puLCBUcnVuZyBQaOG7pW5nLCDEkOG7kW5nIMSQYSwgSMOgIE7hu5lp!5e0!3m2!1svi!2s!4v1592685896191!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
@endsection