@extends('layout.mainLayout')

@section('title', 'Hubungi Kami')

@section('content')
<div class="container py-5">
    <div class="row text-center mb-5">
        <div class="col-lg-8 mx-auto">
            <h1 class="display-4">Hubungi Kami</h1>
            <p class="lead mb-0">Punya pertanyaan, kritik, atau saran? Kami senang mendengarnya dari Anda!</p>
        </div>
    </div>
    

    <div class="row">
        <div class="col-lg-5 mb-4">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <h4 class="mb-4">Toko Kami</h4>
                    <p>
                        <strong>🏢 Alamat:</strong><br>
                        Jl. Jendral Sudirman no. 45, Kudus<br>
                        Jawa Tengah, Indonesia 59312
                    </p>
                    <p>
                        <strong>🕒 Jam Operasional:</strong><br>
                        Senin - Jumat: 09:00 - 17:00 WIB
                    </p>
                </div>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h4 class="mb-4">Social Media</h4>
                        <p>
                        <strong>Instagram :</strong>
                        <br>@owence</br>
                    </p>
                    <p>
                        <strong>Tiktok :</strong>
                        <br>@owence.tiktok</br>
                    </p>
                    <p>
                        <strong>📞 Telepon / WhatsApp:</strong><br>
                        <a href="tel:+6281234567890" class="text-dark">+62 812-3456-7890</a>
                    </p>
                    <p>
                        <strong>✉️ Email:</strong><br>
                        <a href="mailto:info@owence.com" class="text-dark">info@owence.com</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection