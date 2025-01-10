<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <title>Payment</title>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-2 bg-white shadow box-area">
            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background: #013c6c">
                <div class="featured-image mb-4">
                    <h1>PAYMENT</h1>
                </div>
                <small class="text-white text-wrap text-center"
                    style="width: 17rem;font-family: 'Courier New', Courier, monospace;"></small>
            </div>

            <form class="col-md-6 right-box" method="POST" action="{{ route('payment.process') }}">
                @csrf
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <p>Harga pendaftaran: <strong>Rp {{ number_format($price, 0, ',', '.') }}</strong></p>
                    <div class="input-group mb-3">
                        <input type="hidden" name="price" value="{{ $price }}">
                        <div>
                            <label for="amount_paid">Jumlah yang dibayarkan:</label>
                            <input type="number" name="amount_paid" required>
                        </div>
                    </div>
                    @if(session('error'))
                        <div style="color: red;">{{ session('error') }}</div>
                    @endif

                    @if(session('warning'))
                        <div style="color: orange;">{{ session('warning') }}</div>
                    @endif

                    @if(session('success'))
                        <div style="color: green;">{{ session('success') }}</div>
                    @endif

                    <div class="input-group mb-3">
                        <button class="btn btn-lg btn-primary w-100 fs-6" type="submit">Bayar</button>
                    </div>
                </div>
            </form>

            
        </div>
    </div>
</body>

</html>
