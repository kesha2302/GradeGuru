<!-- Footer Start -->
<div class="container-fluid bg-secondary text-white mt-5 pt-5 px-sm-3 px-md-5">
    <div class="row">
        <!-- Brand & Quote -->
        <div class="col-lg-3 col-md-6 mb-4">
            <img src="{{ asset('ClientView/img/guru4.png') }}" alt="GradeGuru Logo" height="80" width="80">
            <p class="mt-3 small">"It’s not about how bad you want it. It’s about how hard you’re willing to work for
                it."</p>
            <div class="d-flex mt-3">
            </div>
        </div>

        <!-- Contact Info -->
        <div class="col-lg-3 col-md-6 mb-4">
            <h5 class="text-white mb-3">Get in Touch</h5>
            <p class="mb-2"><i class="fa fa-map-marker-alt mr-2 text-info"></i>Anand, Gujarat, India</p>
            <p class="mb-2"><i class="fa fa-envelope mr-2 text-info"></i>support@gradeguru.com</p>
            <p class="mb-0"><i class="fa fa-phone-alt mr-2 text-info"></i>+91 1234512345</p>
        </div>

        <!-- Quick Links -->
        <div class="col-lg-3 col-md-6 mb-4">
            <h5 class="text-white mb-3">Quick Links</h5>
            <ul class="list-unstyled">
                <li><a class="text-white-50" href="{{ route('home') }}"><i class="fa fa-angle-right mr-2"></i>Home</a>
                </li>
                <li><a class="text-white-50" href="{{ route('about') }}"><i class="fa fa-angle-right mr-2"></i>About
                        Us</a></li>
                <li><a class="text-white-50" href="{{ route('contact') }}"><i class="fa fa-angle-right mr-2"></i>Contact
                        Us</a></li>
            </ul>
        </div>

        <!-- Class Links -->
        <div class="col-lg-3 col-md-6 mb-4">
            @php $className = \App\Models\ClassName::all(); @endphp
            <h5 class="text-white mb-3">Classes</h5>
            <ul class="list-unstyled">
                @foreach ($className as $cn)
                    <li>
                        <a class="text-white-50" href="{{ route('classprice.show', $cn->class_id) }}">
                            <i class="fa fa-angle-right mr-2"></i>{{ $cn->standard }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="text-center border-top border-info pt-3 mt-3">
        <p class="m-0 text-white-50 small">
            &copy; {{ date('Y') }} <a class="text-info" href="{{ route('home') }}">GradeGuru</a>. All Rights
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
