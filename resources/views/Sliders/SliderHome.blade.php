<!-- start banner Area -->
<section class="banner-area h-auto" style="margin-top: 125px">
    <div class="container">

           <div class="row ">
            <div class="col-lg-3 col-md-3 m-0 p-0">
              @foreach ($bannerleft as $showleft)
              <a  href=""> <img  style="width: 100%; height: auto; padding: 5px" src="{{asset('assets/Clients/Image/banner/'.$showleft->image_banner)}}" alt=""></a>
              @endforeach
               </div>
               <div class="col-lg-6  col-md-6">
                {{-- <img class="w-100" src="{{asset('assets/Clients/Image/banner/slide2.jpg')}}" alt=""> --}}
               {{-- carousel --}}
               <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  @foreach ($slide as $showslide)
                  <div class="carousel-item active">
                    <a href=""> <img src="{{asset('assets/Clients/Image/banner/'.$showslide->image_banner)}}" class="d-block w-100" style="max-height: 446px"  alt="..."></a>
                   </div>
                  @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
               {{-- end carousel --}}
               </div>
               <div class="col-lg-3 col-md-3 p-0 ">
             @foreach ($bannerright as $showright)
              <a href=""> <img class="w-100" style="padding: 5px" src="{{asset('assets/Clients/Image/banner/'.$showright->image_banner)}}" alt=""></a>
             @endforeach
               </div>
           </div>
            <div class="row">
              @foreach ($bannerbottom as $showbottom)
              <div class="col-lg-3 col-md-3 p-0">
                <a href=""> <img style="padding-right: 4px" class="w-100 mt-2 " src="{{asset('assets/Clients/Image/banner/'.$showbottom->image_banner)}}" alt=""></a>
                  </div>
              @endforeach
            </div>
        </div>
</section>
<!-- End banner Area -->
