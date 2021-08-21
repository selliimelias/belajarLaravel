@extends('templateFrontEnd.master')
@section('tittle', 'Pembayaran Sukses')

@section('content')
<body>
    <section id="success">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12 mt-5">
                    <img src="{{ asset('assets/success.png') }}" height="150px" weight="Auto">
                    <h1 style="font-size: 30px;text-align: center;">Yay ! Pesanan Berhasil</h1>
                    <h5>INV-PK-563E74645376</h5>
                    <div style="color: #F79E22;font-size: 20px;text-align: center;">Silahkan tunggu update terbaru
                        dari
                        kami via
                        email yang</div>
                    <div style="color: #F79E22;font-size: 20px;text-align: center;">sudah kamu daftarkan sebelumnya
                    </div>
                    <hr style="width: 530px;">
                    <button type="button" class="btn btn-warning">Back to Home</button>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection