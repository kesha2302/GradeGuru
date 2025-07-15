<!-- Footer Start -->
<div class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
    <div class="row pt-5">
        <!-- Brand & Description -->
        <div class="col-lg-3 col-md-6 mb-5">
            <a href="{{ route('home') }}" class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0"
                style="font-size: 40px; line-height: 40px;">
                <img src="{{ asset('ClientView/img/guru4.png') }}" alt="GradeGuru Logo" height="160" width="180">
            </a>
            <p>Empowering learners with resources, mentorship, and tools to thrive academically and beyond.</p>
            <!-- Social Media Links -->
            <div class="d-flex justify-content-start mt-4">
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                    style="width: 38px; height: 38px" href="https://twitter.com/gradeguru" target="_blank">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                    style="width: 38px; height: 38px" href="https://facebook.com/gradeguru" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                    style="width: 38px; height: 38px" href="https://linkedin.com/company/gradeguru" target="_blank">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a class="btn btn-outline-primary rounded-circle text-center mr-2 px-0"
                    style="width: 38px; height: 38px" href="https://instagram.com/gradeguru" target="_blank">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="col-lg-3 col-md-6 mb-5">
            <h3 class="text-primary mb-4">Get in Touch</h3>
            <div class="d-flex mb-3">
                <h4 class="fa fa-map-marker-alt text-primary"></h4>
                <div class="pl-3">
                    <h5 class="text-white">Address</h5>
                    <p>Ahmedabad, Gujarat, India</p>
                </div>
            </div>
            <div class="d-flex mb-3">
                <h4 class="fa fa-envelope text-primary"></h4>
                <div class="pl-3">
                    <h5 class="text-white">Email</h5>
                    <p>support@gradeguru.com</p>
                </div>
            </div>
            <div class="d-flex">
                <h4 class="fa fa-phone-alt text-primary"></h4>
                <div class="pl-3">
                    <h5 class="text-white">Phone</h5>
                    <p>+91 98765 43210</p>
                </div>
            </div>
        </div>

        <!-- Quick Links -->
        <div class="col-lg-3 col-md-6 mb-5">
            <h3 class="text-primary mb-4">Quick Links</h3>
            <div class="d-flex flex-column justify-content-start">
                <a class="text-white mb-2" href="{{ route('home') }}"><i class="fa fa-angle-right mr-2"></i>Home</a>
                <a class="text-white mb-2" href="{{ route('about') }}"><i class="fa fa-angle-right mr-2"></i>About Us</a>
                <a class="text-white mb-2" href="{{ route('contact') }}"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
            </div>
        </div>

        <!-- Newsletter -->
        <div class="col-lg-3 col-md-6 mb-5">
            @php
                $className = \App\Models\ClassName::all();
            @endphp
            <h3 class="text-primary mb-4">Class</h3>

            <ul class="list-unstyled">
                @foreach ($className as $cn)
                    <li>
                        <a class="text-white mb-2 d-block" href="{{ route('classprice.show', $cn->class_id) }}">
                            <i class="fa fa-angle-right mr-2"></i>{{ $cn->standard }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>


    </div>

    <!-- Bottom Footer Bar -->
    <div class="container-fluid pt-5" style="border-top: 1px solid rgba(23, 162, 184, 0.2);">
        <p class="m-0 text-center text-white">
            &copy; <a class="text-primary font-weight-bold" href="{{ route('home') }}">GradeGuru</a>. All Rights
            Reserved.

        </p>
    </div>
</div>
<!-- Footer End -->

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>



<!-- Contact Javascript File -->
<script src="{{ asset('mail/jqBootstrapValidation.min.js') }}"></script>
<script src="{{ asset('mail/contact.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('js/main.js') }}"></script>
