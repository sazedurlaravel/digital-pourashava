@extends('frontend/layouts/app')

@section("content")
<!--header start section-->
  <div class="main_header">
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-sm-12 col-md-2 mt-2 ">
          <a href="{{route('frontend.home')}}">
            @if(!empty($information->logo))
            <img src="{{ Storage::url($information->logo) }}" class="mr-3"  alt="logo"
                      style="width: 25px;">
            @else
              <img src="{{asset("assets/frontend")}}/images/logo-2.png"  alt="logo">
              @endif
            </a>

            @if(!empty($information->name))
                <a href="{{route('frontend.home')}}">{{$information->name}}</a>
            @else
              Digital Pourashava
            @endif

            <!-- <img src="{{asset('assets/frontend')}}/images/digital.png" alt="logo"></a> -->
        </div>
        <div class="col-lg-3 col-sm-12 col-md-4 offset-lg-3 offset-md-2">
          <div class="row mt-2">
            <div class="col lg-4">
              <a href="#">Home</a>
            </div>
            <div class="col lg-4">
              <a href="#">Contact</a>
            </div>
            <div class="col lg-4">
              <a href="#">Login</a>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-12 col-md-4">
          <div class="row">
            <div class="col-lg-12">
              <i class="fa fa-envelope mr-2"></i>
              @if(!empty($information->service_email))
                    {{$information->service_email}}
              @else
                  admin@gmail.com
              @endif
            </div>
            <div class="col-lg-12">
              <i class="fa fa-phone mr-2"></i>
              @if(!empty($information->service_phone))
                    {{$information->service_phone}}
              @else
                  01701345698
              @endif
            </div>
          </div>
        </div>
    </div>
    </div>
  </div>
  <!--header end section-->

  <!--banner start section-->
  <div class="">
    <!-- <img src="{{asset('assets/frontend')}}/images/upsheba.jpg" alt="banner" class="img-fluid"> -->
    @if(!empty($information->banner))
    <img src="{{ Storage::url($information->banner) }}" class="mg-fluid" alt="banner"
        style="width: 100%;">

    @else
      <img src="{{asset('assets/frontend')}}/images/upsheba.jpg" alt="banner" class="img-fluid">
    @endif

  </div>

<!--banner end section-->

<!--পৌরসভা বাছাই section start-->
<div class="upservice">
    <h1 class="text-center pt-3">আপনার পৌরসভা বাছাই করুন</h1>
  <div class="row container text-center">
    <div class="col-sm-12 mb-3 col-md-6 col-lg-3">
      <div class="input-group">
        <select class="custom-select" id="inputGroupSelect04">
          <option selected>বিভাগ বাছাই করুন</option>
          <option value="1">বরিশাল</option>
          <option value="2">চট্টগ্রাম</option>
          <option value="5">রাজশাহী</option>
        </select>
      </div>
    </div>
    <div class="col-sm-12 mb-3 col-md-6 col-lg-3">
      <select class="custom-select" id="inputGroupSelect04">
        <option value="">জেলা বাছাই করুন</option>
        <option value="6" division-id="1">পিরোজপুর </option>
        <option value="9" division-id="2">চাঁদপুর</option>
        <option value="51" division-id="5">রাজশাহী </option>
      </select>

    </div>
    <div class="col-sm-12 mb-3 col-md-6 col-lg-3">
      <select class="custom-select" id="inputGroupSelect04">

        <option value="">পৌরসভা বাছাই করুন</option>

        <option value="36" district-id="9" office-id="1">চাঁদপুর পৌরসভা</option>
        <option value="249" district-id="6" office-id="3">মঠবাড়ীয়া পৌরসভা</option>
        <option value="253" district-id="51" office-id="2">বাঘা পৌরসভা</option>
      </select>
    </div>
    <div class="col-sm-12 mb-3 col-md-6 col-lg-3">
      <span class="btn btn-primary sub px-5">সাবমিট</span>
    </div>
  </div>
</div>
<!--পৌরসভা বাছাই section end-->

<!--সেবা start section-->
<div class="my-3 bg py-3">
  <div class=" row">
    <div class="col-md-4 col-sm-4 col-lg-4 text-center">
      <a href="" class="badge badge-primary font-weight-normal bn-font p-3">
       <i class="fa fa-certificate text-white"></i>সার্টিফিকেট যাচাই
   </a>

    </div>
    <div class="col-md-4 col-sm-4 col-lg-4 text-center">
      <a href="" class="badge badge-danger font-weight-normal text-white bn-font p-3">
      পৌরসভা ডিজিটাল করুন
  </a>
    </div>
    <div class="col-md-4 col-sm-4 col-lg-4 text-center">
      <a href="" class="badge badge-warning font-weight-normal text-white bn-font p-3">
       ইউনিয়ন ডিজিটাল করুন
     </a>
    </div>
  </div>
</div>
<!--সেবা end section-->

<!--আমাদের সেবাসমূহ start section-->
<div class="seba mt-3">
  <h2 class="text-center">আমাদের সেবাসমূহ</h2>
  <hr>
  <div class="row">
    @foreach($sebas as $seba)
    <div class="col-md-4 col-sm-6 col-lg-3 text-center">
      <div class="service-box">
        <img src="{{ Storage::url($seba->image) }}" class="img img-thumbnail mb-2"
              style="width: 75px;">
        <div class="section-title">{{$seba->title}}
          <hr>
        </div>
      </div>
    </div>
  @endforeach
  </div>
</div>
<!--আমাদের সেবাসমূহ end section-->


<footer class="footer-section">
        <div class="container">
            <div class="footer-cta pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="cta-text">
                                <h4>Find us</h4>
                                <span>1010 Avenue, sw 54321, chandigarh</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-phone"></i>
                            <div class="cta-text">
                                <h4>Call us</h4>
                                <span>9876543210 0</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                      <div class="footer-widget">
                          <div class="footer-widget-heading">
                              <h3>Subscribe</h3>
                          </div>
                          <div class="subscribe-form">
                              <form action="#">
                                  <input type="text" placeholder="Email Address">
                                  <button><i class="fab fa-telegram-plane"></i></button>
                              </form>
                          </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                        <div class="copyright-text">
                            <p>Copyright &copy; 2021, All Right Reserved <a href="">Azad</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
<!--footer End-->

@endsection
