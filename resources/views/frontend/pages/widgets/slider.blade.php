   <div class="slideshow-section position-relative">
       <div class="slideshow-active activate-slider"
           data-slick='{
                    "slidesToShow": 1,
                    "slidesToScroll": 1,
                    "dots": true,
                    "arrows": true,
                    "responsive": [
                        {
                        "breakpoint": 768,
                        "settings": {
                            "arrows": false
                        }
                        }
                    ]
                }'>
           @foreach ($banners as $banner)
               <div class="slide-item slide-item-bag position-relative">
                   <img class="slide-img d-none d-md-block"
                       src="{{ asset('storage/uploads/banner') }}/{{ $banner->image }}" alt="{{ $banner->banner_name }}">
                   <img class="slide-img d-md-none" src="{{ asset('storage/uploads/banner') }}/{{ $banner->image }}"
                       alt="slide-1">
                   <div class="content-absolute content-slide">
                       <div class="container height-inherit d-flex align-items-center justify-content-end">
                           <div class="content-box slide-content slide-content-1 py-4">
                               <h2 class="slide-heading heading_72 animate__animated animate__fadeInUp"
                                   data-animation="animate__animated animate__fadeInUp">
                                   {{ $banner->banner_name }}
                               </h2>
                               <p class="slide-subheading heading_24 animate__animated animate__fadeInUp"
                                   data-animation="animate__animated animate__fadeInUp">
                                   Look for your inspiration here
                               </p>
                               <a class="btn-primary slide-btn animate__animated animate__fadeInUp"
                                   href="{{ route('shop') }}" data-animation="animate__animated animate__fadeInUp">SHOP
                                   NOW</a>
                           </div>
                       </div>
                   </div>
               </div>
           @endforeach

       </div>
       <div class="activate-arrows"></div>
       <div class="activate-dots dot-tools"></div>
   </div>
