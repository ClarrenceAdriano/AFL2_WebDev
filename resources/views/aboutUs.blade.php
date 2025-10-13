@extends('layout.mainLayout')

@section('title', 'Tentang Kami')

@section('content')
    <div class="container py-5">
        <div class="row text-center mb-5">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-4">Selebihnya Mengenai Owence's</h1>
                <p class="lead mb-0">Selamat datang di Owence! Kami percaya bahwa pakaian bukan hanya sekadar kain, tetapi
                    sebuah cara untuk menceritakan siapa diri Anda tanpa harus berkata-kata.
                    Mulai dari kenyamanan streetwear untuk keseharian, keanggunan formal wear untuk acara spesial, hingga
                    ketangguhan outer wear untuk petualangan Anda, setiap produk kami dibuat dengan material pilihan dan
                    perhatian penuh pada detail.
                    Temukan gaya unik Anda bersama kami dan jadilah bagian dari cerita Owence</p>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h3 class="card-title">Visi Kami</h3>
                        <p class="card-text">Menjadi kanvas bagi setiap individu untuk mengekspresikan identitas unik mereka
                            melalui fashion.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-4">
                        <h3 class="card-title">Misi Kami</h3>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Menyediakan koleksi pakaian yang serbaguna untuk setiap momen dalam
                                hidup Anda.</li>
                            <li class="list-group-item">Menciptakan koleksi yang menginspirasi ekspresi diri dan membangun
                                komunitas kreatif yang positif.</li>
                            <li class="list-group-item">Menghadirkan pakaian berkualitas dengan desain terkini melalui
                                pengalaman belanja yang mudah dan memuaskan.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="row text-center">
            <div class="col-12">
                <h2 class="mb-5">Tim Kreatif Kami</h2>
            </div>

            <div class="col-xl-4 col-sm-6 mb-5">
                <div class="bg-white rounded shadow-sm py-5 px-4">
                    <img src="https://i.pinimg.com/1200x/e6/92/15/e692151bfc86c7d523697aa0dbd1a5d0.jpg" alt="Founder"
                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm object-fit-cover"
                        style="width: 200px; height: 200px;" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-0">Andi Pratama</h5>
                    <span class="small text-uppercase text-muted">Founder & CEO</span>
                </div>
            </div>

            <div class="col-xl-4 col-sm-6 mb-5">
                <div class="bg-white rounded shadow-sm py-5 px-4">
                    <img src="https://i.pinimg.com/736x/9a/a0/bc/9aa0bc99645d66f1949ddefa3f700d0f.jpg"
                        alt="Designer"class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm object-fit-cover"
                        style="width: 200px; height: 200px;" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-0">Citra Lestari</h5>
                    <span class="small text-uppercase text-muted">Creative Director</span>
                </div>
            </div>

            <div class="col-xl-4 col-sm-6 mb-5">
                <div class="bg-white rounded shadow-sm py-5 px-4">
                    <img src="https://i.pinimg.com/736x/20/d8/01/20d801707372462a7058a2efaad5fab1.jpg" alt="Marketing"
                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm object-fit-cover"
                        style="width: 200px; height: 200px;" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-0">Budi Santoso</h5>
                    <span class="small text-uppercase text-muted">Marketing Head</span>
                </div>
            </div>
        </div>
    </div>
@endsection
