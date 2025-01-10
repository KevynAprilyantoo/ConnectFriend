@extends('layout.landingpage')

@section('content')
<div class="hero-section d-flex align-items-center justify-content-center text-center m-0 p-0 position-relative" 
     style="height: 80vh; background: url('{{ asset('img/1.webp') }}') no-repeat center center; background-size: cover;">

    <!-- Overlay -->
    <div style="background-color: rgba(0, 0, 0, 0.6); z-index: 1;" class="position-absolute top-0 left-0 w-100 h-100"></div>
    
    <!-- Content -->
    <div class="container position-relative" style="z-index: 2; color: #fff;">
        <h1 class="fw-bold mb-3 display-4 m-0">Find Your Professional Connections</h1>
        
        <!-- Features Section -->
        {{-- <div class="features-section d-flex justify-content-center mt-4 text-white">
            <div class="feature-item text-center mx-3">
                <div class="icon" style="font-size: 2.5rem; color: #17a2b8;">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <h5 class="mt-2" style="font-size: 1.1rem; font-weight: bold;">ye sir</h5>
            </div>
            <div class="feature-item text-center mx-3">
                <div class="icon" style="font-size: 2.5rem; color: #28a745;">
                    <i class="fas fa-user-md"></i>
                </div>
                <h5 class="mt-2" style="font-size: 1.1rem; font-weight: bold;">mang ea</h5>
            </div>
            <div class="feature-item text-center mx-3">
                <div class="icon" style="font-size: 2.5rem; color: #ffc107;">
                    <i class="fas fa-heartbeat"></i>
                </div>
                <h5 class="mt-2" style="font-size: 1.1rem; font-weight: bold;">ammksmdkm</h5>
            </div>
        </div> --}}

        <!-- Learn More Button -->
        <a href="{{ route('login') }}" class="btn btn-outline-light px-4 py-2 mt-4 text-decoration-none" 
           style="font-size: 1rem; border: 2px solid #fff; border-radius: 25px; transition: all 0.3s ease-in-out;">
           CREATE ACCOUNT
        </a>
    </div>
</div>

<div class="container my-5" id="about-us">

    <!-- Our Mission and Story -->
    <div class="row mb-3 align-items-center" style="background-color: # f5f5f5; padding: 2rem;">
        <div class="col-md-6">
          <img src="{{ asset('/img/ABOUT.png') }}" alt="Our Mission" class="img-fluid rounded w-100 h-auto object-fit-cover">
        </div>
        <div class="col-md-6">
          <h2 class="fw-bold">Friends for Every Chapter. Even Your Professional Ones.</h2>
          <p class="lead" style="margin-right: 1rem; text-align: justify;">
            CONNECTFRIEND is all about connections. Whether you’ve started a new job, discovered a shared passion, or just need someone who gets your work—CONNECTFRIEND helps you find your kind of people in the professional world.
          </p>
        </div>
    </div>

      
      <div class="row mb-4 align-items-center" style="background-color: #f5f5f5; padding: 2rem;">
        <div class="col-md-6">
            <h2 class="fw-bold" style="text-align: center;">Our Vision</h2>
            <p class="lead" style="margin-right: 1rem; text-align: center;">
                "To become the leading platform for building professional networks based on shared interests and occupations worldwide."
            </p>
          </div>

        <div class="col-md-6">
          <h2 class="fw-bold" style="text-align: center;">Our Mission</h2>
          <p class="lead" style="margin-right: 1rem; text-align: center;">
            "Our mission is to help professionals find relevant work buddies who can support and collaborate on their career journeys. We aim to provide an interactive platform where individuals can share valuable insights and experiences, fostering a community of knowledge exchange. Through this platform, we seek to encourage collaboration among individuals who share common career goals, creating an environment where growth and success are achieved together."
          </p>
        </div>
        
</div>
      

    <!-- Frequently Asked Questions -->
    <div class="text-center mb-5" >
        <h2 class="fw-bold">User Testimonials</h2>
        <div class="accordion mt-4" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="faq1">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                        John Smith
                    </button>
                </h2>
                <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="faq1" data-bs-parent="#faqAccordion">
                    <div class="accordion-body no-padding">
                        "CONNECTFRIEND has been a game-changer for me. I was able to find like-minded professionals in my field and collaborate on exciting projects. The platform makes networking easy and meaningful, and I’ve connected with people who truly understand my interests and career goals."
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="faq2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                        Emily Johnson
                    </button>
                </h2>
                <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#faqAccordion">
                    <div class="accordion-body no-padding">
                        "I’ve been looking for a community of professionals who share the same passions, and CONNECTFRIEND delivered just that. The platform helped me connect with people who are as enthusiastic about data science as I am, and now we work together on innovative ideas that push us forward."
                    </div>
                </div>
            </div>

            <div class="accordion-item">
                <h2 class="accordion-header" id="faq3">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                        David Brown
                    </button>
                </h2>
                <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="faq3" data-bs-parent="#faqAccordion">
                    <div class="accordion-body no-padding">
                        "As a freelancer, it’s often difficult to find people who are on the same wavelength. Thanks to CONNECTFRIEND, I found a group of professionals who share my interests in digital marketing. It’s been a rewarding experience working with people who are aligned with my professional values and vision."
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection