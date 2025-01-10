@extends('layout.home')

@section('content')
    <!-- Header End -->
    <div class="hero-section d-flex align-items-center justify-content-center text-center m-0 p-0 position-relative" style="height: 80vh; background: url('{{ asset('img/1.webp') }}') no-repeat center center; background-size: cover;">
        <div class="container my-5 pt-5 pb-4" style="background-color: rgba(0, 0, 0, 0.7); border-radius: 10px;">
            <h1 class="display-3 text-white mb-3 animated slideInDown">
                Expand Your Circle with Professionals Like You
            </h1>
            <p class="fs-5 fw-medium text-white mb-4 pb-2">
                Discover a community of individuals who share your career journey. Collaborate, share ideas, and grow together with people who truly understand your work and aspirations.
            </p>
            <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Start Searching A Friend</a>
        </div>
    </div>
    
    <!-- Header End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="row g-0 about-bg rounded overflow-hidden">
                        <div class="col-12 text-start">
                            <img class="img-fluid w-100" src="{{ asset('img/fitur1.jpg') }}">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">We Help You Find the Perfect Work Buddy</h1>
                    <p class="mb-4">Temukan teman kerja online yang memiliki profesi atau hobi yang sama dengan Anda. Kami membantu Anda membangun jaringan profesional secara efektif dan mudah. Cari teman kerja yang dapat mendukung karier Anda dan saling berbagi pengetahuan.</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Temukan teman kerja dengan keahlian yang sesuai</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Bangun jaringan profesional dengan cara yang mudah</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Dapatkan dukungan untuk pengembangan karier Anda</p>
                    <a class="btn btn-primary py-3 px-5 mt-3" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Friends Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Friend Suggestion</h1>
            @foreach ($friendSuggestions as $friend)
                <div class="job-item p-2 mb-2">
                    <div class="row g-4">
                        <!-- Bagian Kiri (Gambar dan Nama Pekerjaan) -->
                        <div class="col d-flex align-items-center">
                            <img class="flex-shrink-0 img-fluid border rounded"
                                src="{{ asset('fitur1.jpg') }}" alt=""
                                style="width: 30px; height: 30px;">
                            <div class="text-start ps-4">
                                <div>{{ $friend->name }}</div>
                            </div>
                        </div>

                        <!-- Bagian Tengah (Hobi) -->
                        <div class="col d-flex align-items-center justify-content-center">
                            <div class="hobby-list text-center text-light">
                                @foreach ($friend->fields->take(3) as $field)
                                    <a href="#" class="badge bg-primary me-1">{{ $field->name }}</a>
                                @endforeach
                                @if ($friend->fields->count() > 3)
                                    <span class="badge bg-primary me-1" style="cursor: pointer">+{{ $friend->fields->count() - 3 }} More</span>
                                @endif
                            </div>
                        </div>

                        <!-- Bagian Kanan (Tombol Detail dan Heart) -->
                        <div class="col d-flex flex-column align-items-end justify-content-center">
                            <div class="d-flex">
                                <button class="btn btn-light btn-square me-3" onclick="sendRequest({{ $friend->id }}, {{ Auth::user()->id }})">
                                    <div class="spinner-border spinner-border-sm text-primary" role="status"
                                        id="spinner-{{ $friend->id }}" style="display: none">
                                    </div>
                                    <i class="fa-regular fa-heart text-primary" id="like-{{ $friend->id }}"></i>
                                </button>
                                <a class="btn btn-primary" href="{{ route('home.detail', $friend->id) }}">Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="d-flex justify-content-center mt-4">
                <a class="btn btn-primary py-3 px-5" href="">Browse More Friends</a>
            </div>
        </div>
    </div>
    <!-- Friends End -->
@endsection

@push('scripts')
    <script>
        const baseUrl = `{{ route('friend.sendRequest', ['friend' => ':friendId', 'user' => ':userId']) }}`;

        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });

        async function sendRequest(friendId, userId) {
            try {
                // Tampilkan spinner loading
                $('#like-' + friendId).hide();
                $('#spinner-' + friendId).show();

                const url = baseUrl.replace(':friendId', friendId).replace(':userId', userId);
                // Kirim permintaan ke backend menggunakan Fetch API
                const response = await fetch(url);
                const data = await response.json(); // Parsing response JSON

                // Tampilkan pesan dari backend menggunakan SweetAlert2 Toast
                if (response.ok) {
                    Toast.fire({
                        icon: "success",
                        title: data.message
                    });
                } else {
                    Toast.fire({
                        icon: "error",
                        title: data.message
                    });
                }
                $('#like-' + friendId).show();
                $('#spinner-' + friendId).hide();
            } catch (error) {
                console.log(error);
                
                Toast.fire({
                    icon: "error",
                    title: 'An error occurred. Please try again later.'
                });
                $('#like-' + friendId).show();
                $('#spinner-' + friendId).hide();
            }
        }
    </script>
@endpush
