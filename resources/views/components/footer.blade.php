 <!-- Footer Start -->
 <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
     <div class="container py-5">
         <div class="row g-5 mb-5 align-items-center">
             <div class="col-lg-7">
                 <div class="position-relative mx-auto">
                     {{-- <input class="form-control rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Email address to Subscribe">
                    <button type="button" class="btn btn-secondary rounded-pill position-absolute top-0 end-0 py-2 px-4 mt-2 me-2">Subscribe</button> --}}
                 </div>
             </div>
             <div class="col-lg-5">
                 <div class="d-flex align-items-center justify-content-center justify-content-lg-end">
                     <a class="btn btn-secondary btn-md-square rounded-circle me-3" target="_blank" href="https://www.facebook.com/share/1FikhCj4jT/?mibextid=wwXIfr"><i
                             class="fab fa-facebook-f"></i></a>
                     <a class="btn btn-secondary btn-md-square rounded-circle me-3" target="_blank" href="https://x.com/upasthitif?s=11"><i
                             class="fab fa-twitter"></i></a>
                     <a class="btn btn-secondary btn-md-square rounded-circle me-3" target="_blank" href="https://www.instagram.com/company-name?igsh=MW9ybzF6dzA5NHQxaA=="><i
                             class="fab fa-instagram"></i></a>
                     <a class="btn btn-secondary btn-md-square rounded-circle me-0" target="_blank" href="https://www.linkedin.com/in/upasthiti--397349306?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app"><i
                             class="fab fa-linkedin-in"></i></a>
                 </div>
             </div>
         </div>
         <div class="row g-5">
             <div class="col-md-6 col-lg-6 col-xl-3">
                 <div class="footer-item d-flex flex-column">
                     <div class="footer-item">
                         {{-- <h3 class="text-white mb-4"><i class="fas fa-hand-holding-water text-primary me-3"></i>Acuas</h3> --}}
                         <img src="{{ asset('assets/frontend/img/logo/logo-bg.png') }}" alt="Logo"
                             height="70" width="auto">
                         <p class="mb-3">The upasthiti  Foundation is based on the belief of Seva Paramo Dharmah
                             - <srong>To serve is the highest form of duty</srong>
                         </p>
                     </div>
                     {{-- <div class="position-relative">
                        <input class="form-control rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Enter your email">
                        <button type="button" class="btn btn-secondary rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">SignUp</button>
                    </div> --}}
                 </div>
             </div>
             <div class="col-md-6 col-lg-6 col-xl-3">
                 <div class="footer-item d-flex flex-column">
                     <h4 class="text-white mb-4">About Us</h4>
                     <a href="{{route('about-us.founders-message')}}"><i class="fas fa-angle-right me-2"></i> Founders Message</a>
                     <a href="{{route('about-us.journey-of-upasthiti')}}"><i class="fas fa-angle-right me-2"></i> Journey of upasthiti </a>
                     <a href="{{route('about-us.mission-vision')}}"><i class="fas fa-angle-right me-2"></i> Mission & Vision</a>
                     <a href="{{route('about-us.media-reports')}}"><i class="fas fa-angle-right me-2"></i> Media Reports</a>
                     <a href="{{route('about-us.chapters')}}"><i class="fas fa-angle-right me-2"></i> Chapters</a>
                     {{-- <a href="#"><i class="fas fa-angle-right me-2"></i> Contact us</a> --}}
                 </div>
             </div>

             <div class="col-md-6 col-lg-6 col-xl-3">
                 <div class="footer-item d-flex flex-column">
                     <h4 class="text-white mb-4">Other Links</h4>
                     <a href="{{route('get-involved.volunteer')}}"><i class="fas fa-angle-right me-2"></i> Volunteer</a>
                     <a href="{{route('get-involved.donation')}}"><i class="fas fa-angle-right me-2"></i> Donate</a>
                     <a href="{{route('policies.terms-and-conditions')}}"><i class="fas fa-angle-right me-2"></i> Terms & Conditions</a>
                     <a href="{{route('policies.privacy-policy')}}"><i class="fas fa-angle-right me-2"></i> Privacy Policy</a>
                     <a href="{{route('policies.refund-cancellation-policy')}}"><i class="fas fa-angle-right me-2"></i> Refund & Cancellation</a>
                     <a href="{{route('get-involved.contact-us')}}"><i class="fas fa-angle-right me-2"></i> Contact us</a>
                 </div>
             </div>
             <div class="col-md-6 col-lg-6 col-xl-3">
                 <div class="footer-item d-flex flex-column">
                     <h4 class="text-white mb-4">Contact Info</h4>
                     <div class="mb-3">
                         <h6 class="text-muted mb-0">Head Office</h6>
                         <p class="text-white mb-0">Pune, Maharashtra</p>
                         <p class="text-white mb-0"><a href="mailto:info@example.com"><i class="fas fa-envelope me-2"></i> info@upasthiti.org</a></p>
                         <p class="text-white mb-0"><a href="tel:+917385454487"><i class="fas fa-phone me-2"></i> +91-7385454487</a></p>
                     </div>
                     <div class="mb-3">
                         <h6 class="text-muted mb-0">North East Branch:</h6>
                         <p class="text-white mb-0">Club Rd, Jorhat, Assam 785112</p>
                         <p class="text-white mb-0"><a href="mailto:info@example.com"><i class="fas fa-envelope me-2"></i> ne@upasthiti.org</a></p>
                         <p class="text-white mb-0"><a href="tel:+916001326177"><i class="fas fa-phone me-2"></i> +91-6001326177</a></p>
                     </div>
                     {{-- <div class="mb-3">
                         <h6 class="text-muted mb-0">Vacation:</h6>
                         <p class="text-white mb-0">All Sunday is our vacation</p>
                     </div> --}}
                 </div>
             </div>
             {{-- <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="text-white mb-4">Contact Info</h4>
                    <a href="#"><i class="fa fa-map-marker-alt me-2"></i> Lakhi Nath Dutta Path, Club Rd, Jorhat, Assam 785112</a>
                    <a href="mailto:info@example.com"><i class="fas fa-envelope me-2"></i> info@example.com</a>
                    <a href="mailto:info@example.com"><i class="fas fa-envelope me-2"></i> info@example.com</a>
                    <a href="tel:+012 345 67890"><i class="fas fa-phone me-2"></i> +012 345 67890</a>
                    <a href="tel:+012 345 67890" class="mb-3"><i class="fas fa-print me-2"></i> +012 345 67890</a>
                </div>
            </div> --}}
         </div>
     </div>
 </div>
 <!-- Footer End -->

 <!-- Copyright Start -->
 <div class="container-fluid copyright py-4">
     <div class="container">
         <div class="row g-4 align-items-center">
             <div class="col-md-6 text-center text-md-start mb-md-0">
                <i
                class="fas fa-copyright text-light me-2"></i><span class="text-body"><a href="https://upasthiti.org" class="border-bottom text-white">upasthiti.org</a>, All right reserved.</span>
             </div>
             <div class="col-md-6 text-center text-md-end text-body">
                 <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                 <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                 <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                 {{-- Visitor Count <i class="fa fa-eye"></i>
                 <strong class="text-white">{{ number_format($visitorCount) }}</strong> --}}
             </div>
         </div>
     </div>
 </div>
 <!-- Copyright End -->


 <!-- Back to Top -->
 <a href="#" class="btn btn-secondary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

 <!-- JavaScript Libraries -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
 <script src="{{ asset('assets/frontend/lib/wow/wow.min.js') }}"></script>
 <script src="{{ asset('assets/frontend/lib/easing/easing.min.js') }}"></script>
 <script src="{{ asset('assets/frontend/lib/waypoints/waypoints.min.js') }}"></script>
 <script src="{{ asset('assets/frontend/lib/counterup/counterup.min.js') }}"></script>
 <script src="{{ asset('assets/frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>


 <!-- Template Javascript -->
 <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
 </body>

 </html>
