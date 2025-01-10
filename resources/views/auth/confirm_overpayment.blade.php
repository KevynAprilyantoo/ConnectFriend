<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Overpaid</title>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-2 bg-white shadow box-area">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: #013c6c">
                <div class="featured-image mb-4">
                    <h1>OVERPAID PAYMENT</h1>
                </div>
                <small class="text-white text-wrap text-center"
                    style="width: 17rem;font-family: 'Courier New', Courier, monospace;"></small>
            </div>

            <form class="col-md-6 right-box" method="POST" action="{{ route('add_balance') }}">
                @csrf
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <p>Maaf, Anda membayar lebih: Rp {{ number_format((float)$overpaid, 0, ',', '.') }}.</p>
                        <p>Apakah Anda ingin memasukkan saldo ini ke dompet Anda?</p>
                        <div class="input-group mb-3">
                            @csrf
                            <input type="hidden" name="amount" value="{{ $overpaid }}">
                            <button type="submit" class="btn btn-success">Ya</button>
                        </div>
                </div>
            </form>
            <form action="{{ route('payment.retry') }}" method="GET">
                <div class="input-group mb-3">
                    <button type="submit" class="btn btn-danger">Tidak</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
