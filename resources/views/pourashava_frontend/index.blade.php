@extends('pourashava_frontend.layouts.app')

@section("content")

	<main>
		<div class="container">

			<div class="UScroll">
				<div class="row UMargin0">
					<div class="col-sm-1">স্বাগতম</div>
					<div class="col-sm-11">
						<marquee scrollamount="4" style="padding:2px;">
							<i class="fa fa-play" aria-hidden="true"></i> &nbsp; আপনার পৌর কর নিয়মিত পরিশোধ করুন
							<i class="fa fa-play" aria-hidden="true"></i> &nbsp; মাদক মুক্ত সমাজ গঠন করুন
							<i class="fa fa-play" aria-hidden="true"></i> &nbsp; যে কোন স্থাপনা নির্মাণের জন্য পৌরসভার
							অনুমোদন গ্রহন করুন এবং পরিকল্পিত নগরায়ণে সহায়তা করুন
							<i class="fa fa-play" aria-hidden="true"></i> &nbsp; আবর্জনা সঠিক স্থানে ফেলুন
							<i class="fa fa-play" aria-hidden="true"></i> &nbsp; আপনার সন্তানের জন্ম নিবন্ধন সম্পন্ন
							করুন
							<i class="fa fa-play" aria-hidden="true"></i> &nbsp; সময়মতো পানির বিল পরিশোধ করুন
							<i class="fa fa-play" aria-hidden="true"></i> &nbsp; আপনার পৌরসভাকে পরিচ্ছন্ন রাখুন
						</marquee>
					</div>
				</div>
			</div>

			<div class="row UMainContain">
				<div class="col-sm-6 col-lg-push-3">
					<div class="row UMainSlider">
						<div class="col-sm-12 UPadding0">
							<div id="jssor_1"
								style="position:relative;margin:0 auto;top:0;left:0;width:480px;height:300px;overflow:hidden;visibility:hidden;">
								<div data-u="loading"
									style="position:absolute;top:0;left:0;background:url('{{asset('assets/paurashava_frontend/slider/img/loading.gif')}}') no-repeat 50% 50%;background-color:rgba(0, 0, 0, 0.7);">
								</div>
								<div data-u="slides"
									style="cursor:default;position:relative;top:0;left:0;width:480px;height:300px;overflow:hidden;">
									@foreach($sliders as $slider )
										<div><img data-u="image" src="{{ Storage::url($slider->image) }}"></div>
									@endforeach
								</div>
								<!-- Bullet Navigator -->
								<div data-u="navigator" class="jssorb01" style="bottom:16px;right:16px;">
									<div data-u="prototype" style="width:12px;height:12px;"></div>
								</div>
								<!-- Arrow Navigator -->
								<span data-u="arrowleft" class="jssora05l"
									style="top:0;left:8px;width:40px;height:40px;" data-autocenter="2"></span>
								<span data-u="arrowright" class="jssora05r"
									style="top:0;right:8px;width:40px;height:40px;" data-autocenter="2"></span>
							</div>
							<script type="text/javascript">jssor_1_slider_init();</script>
						</div>
					</div>

					<!-- <div class="row UAboutTarabo">
	<div class="col-sm-12">
        <span class="UTitle UMarginTop20"><center><a href="http://digitalpaurashava.gov.bd">তারাব পৌরসভার সকল সেবা এখন অনলাইনে। নিবন্ধন করুন DigitalPaurashava.gov.bd তে। </a></center></span>
	</div>
</div> -->

					<div class="row UAboutTarabo">
						<div class="col-sm-12">
							<div class="border_bottom">
								<span class="UTitle UMarginTop20"><a href="#">স্বাগতম</a></span>
							</div>
							<h4 style="color:ffffff">{{(!empty($mainmayor->paurashava_name))?$mainmayor->paurashava_name:'azad'}}</h4>
							<p>{{(!empty($mainmayor->welcome_message))?$mainmayor->welcome_message:'azad'}}</p>
						</div>
					</div>

					<div class="row UService UMarginTop20">
						<div class="col-sm-12">
							<div class="border_bottom">
								<span class="UTitle"><a href="#">সেবাসমূহ</a></span>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<div class="UServiceList">
										<a href="#">
											<h5>Development</h5>
											<img src="{{asset('assets/paurashava_frontend/images/imgAll/S-Development.jpg')}}" alt="Development"
												title="Development" class="img-responsive img100">
										</a>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="UServiceList">
										<a href="#">
											<h5>Holding Tax</h5>
											<img src="{{asset('assets/paurashava_frontend/images/imgAll/S-Holding-Tax.jpg')}}" alt="Holding Tax"
												title="Holding Tax" class="img-responsive img100">
										</a>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="UServiceList">
										<a href="#">
											<h5>Trade License</h5>
											<img src="{{asset('assets/paurashava_frontend/images/imgAll/S-Trade-License.jpg')}}" alt="Trade License"
												title="Trade License" class="img-responsive img100">
										</a>
									</div>
								</div>
							</div>
							<div class="row UMarginTop20">
								<div class="col-sm-4">
									<div class="UServiceList">
										<a href="#">
											<h5>Budget</h5>
											<img src="{{asset('assets/paurashava_frontend/images/imgAll/S-Budget.jpg')}}" alt="Budget" title="Budget"
												class="img-responsive img100">
										</a>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="UServiceList">
										<a href="#">
											<h5>Health</h5>
											<img src="{{asset('assets/paurashava_frontend/images/imgAll/S-Health.jpg')}}" alt="Health" title="Health"
												class="img-responsive img100">
										</a>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="UServiceList">
										<a href="#">
											<h5>Town Planning</h5>
											<img src="{{asset('assets/paurashava_frontend/images/imgAll/S-Town-Planning.jpg')}}" alt="Town Planning"
												title="Town Planning" class="img-responsive img100">
										</a>
									</div>
								</div>
							</div>
							<div class="row UMarginTop20">
								<div class="col-sm-4">
									<div class="UServiceList">
										<a href="#">
											<h5>Electrical</h5>
											<img src="{{asset('assets/paurashava_frontend/images/imgAll/S-mechanical_electrical.jpg')}}"
												alt="Electrical & Mechanical" title="Electrical & Mechanical"
												class="img-responsive img100">
										</a>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="UServiceList">
										<a href="#">
											<h5>Conservancy</h5>
											<img src="{{asset('assets/paurashava_frontend/images/imgAll/S-Conservancy.jpg')}}" alt="Conservancy"
												title="Conservancy" class="img-responsive img100">
										</a>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="UServiceList">
										<a href="#">
											<h5>Water Supply</h5>
											<img src="{{asset('assets/paurashava_frontend/images/imgAll/S-Water-Supply.jpg')}}" alt="Water Supply"
												title="Water Supply" class="img-responsive img100">
										</a>
									</div>
								</div>
							</div>
							<div class="row UMarginTop20">
								<div class="col-sm-4">
									<div class="UServiceList">
										<a href="#">
											<h5>Mechanical</h5>
											<img src="{{asset('assets/paurashava_frontend/images/imgAll/S-Mechanical.jpg')}}" alt="Mechanical"
												title="Mechanical" class="img-responsive img100">
										</a>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="UServiceList">
										<a href="#">
											<h5>E-GP</h5>
											<img src="{{asset('assets/paurashava_frontend/images/imgAll/S-EGP.jpg')}}" alt="EGP" title="EGP"
												class="img-responsive img100">
										</a>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="UServiceList">
										<a href="#">
											<h5>APP</h5>
											<img src="{{asset('assets/paurashava_frontend/images/imgAll/S-APP.jpg')}}" alt="APP" title="APP"
												class="img-responsive img100">
										</a>
									</div>
								</div>
							</div>
							<div class="row UMarginTop20">
								<div class="col-sm-4">
									<div class="UServiceList">
										<a href="http://103.48.16.169/pub/?pg=verify_br">
											<h5>Birth verify</h5>
											<img src="{{asset('assets/paurashava_frontend/images/imgAll/S-bris.jpg')}}" alt="Bris" title="Bris"
												class="img-responsive img100">
										</a>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="UServiceList">
										<a href="https://surokkha.gov.bd/">
											<h5>COV-19 Vaccine</h5>
											<img src="{{asset('assets/paurashava_frontend/images/imgAll/S-Vaccine.jpg')}}" alt="Vaccine Registration"
												title="Vaccine Registration" class="img-responsive img100">
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row UMarginTop15">
						<div class="col-sm-12">
							<h4 class="UTitle2">সচেতনতা</h4>
							<div class="UCategoryList">
								<img src="{{asset('assets/paurashava_frontend/images/imgAll/Awareness.jpg')}}" alt="Awareness" title="Awareness"
									class="img-responsive">
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-lg-pull-6 ULeftContain">
					<div class="row">
						<div class="col-sm-12">
							<a href="mayor-speech.php">
								<h4 class="UTitle2">সম্মানিত মেয়র</h4>
								<div class="UImageList">
									<img src="{{(!empty($mainmayor->image))?Storage::url($mainmayor->image):''}}" alt="{{(!empty($mainmayor->name))?$mainmayor->name:'azad'}}"
										title="{{(!empty($mainmayor->name))?$mainmayor->name:'azad'}}" class="img-responsive img100">
									<h4 align="center">{{(!empty($mainmayor->name))?$mainmayor->name:'azad'}}</h4>
									<p>
										<center>{{(!empty($mainmayor->title))?$mainmayor->title:'Mayor'}}
											<br>{{(!empty($mainmayor->paurashava_name))?$mainmayor->paurashava_name:'Dhaka'}}
											<br>{{(!empty($mainmayor->address))?$mainmayor->address:'Saver'}}</center>
									</p>
								</div>
							</a>
						</div>
					</div>

					<a href="javascript:void(0)">
						<div class="row UMarginTop15">
							<div class="col-sm-12">

								<h4 class="UTitle2">কাউন্সিলরবৃন্দ</h4>
								<div class="UImageList">
									<div class="row UCounselor">
										@foreach($counselorlists as $counselorlist)
										<div class="col-xs-4">
											<img src="{{ Storage::url($counselorlist->image) }}" class="img-responsive img100" 	alt="{{$counselorlist->name}}" title="{{$counselorlist->name}}">
											<p>{{$counselorlist->name}}</p>
										</div>
										@endforeach
									</div>

								</div>
							</div>
						</div>
						<div class="row UMarginTop15">
							<div class="col-sm-12">
								<h5 class="UTitle2">মেয়রবৃন্দ</h5>
								<div class="UImageList">
									<div class="row UReserveCounselor">
										<div class="col-xs-4">
											<img src="{{asset('assets/paurashava_frontend/images/imgAll/Counselor/R1-Laila-Pervin-sm.jpg')}}"
												alt="Laila Pervin" title="Laila Pervin" class="img-responsive img100">
											<p>মিসেস লায়লা পারভিন</p>
										</div>
										<div class="col-xs-4">
											<img src="{{asset('assets/paurashava_frontend/images/imgAll/Counselor/R2-Mahfuja-sm.jpg')}}"
												alt="Mst. Mahfuja Begum" title="Mst. Mahfuja Begum"
												class="img-responsive img100">
											<p>মোসাঃ মাহফুজা বেগম</p>
										</div>
										<div class="col-xs-4">
											<img src="{{asset('assets/paurashava_frontend/images/imgAll/Counselor/R3-Jusna-Begum-sm.jpg')}}"
												alt="Jusna Begum" title="Jusna Begum" class="img-responsive img100">
											<p>মিসেস জোসনা বেগম</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</a>
					<div class="row UMarginTop15">
						<div class="col-sm-12">
							<h4 class="UTitle2">গুরুত্বপূর্ণ আবেদনপত্র</h4>
							<div class="UCategoryList">
								<div class="list-group UFont9">
									@foreach($importantapplications as $importantapplication)
									<a href="{{ Storage::url($importantapplication->file) }}" target="_blank"
										class="list-group-item">{{$importantapplication->name}}</a>
									@endforeach
								</div>
							</div>
						</div>
					</div>

					<div>
						<h4 class="UTitle2">জরুরি হটলাইন<h4>
								<img alt="
  জরুরি হটলাইন
  " src="{{asset('assets/paurashava_frontend/images/index_right/Hotline.jpg')}}" style="width:100%;">
					</div>
				</div>
				<div class="col-sm-3 DRightContain">
					<div class="row UMarginTop15">
						<div class="col-sm-12">
							<img src="{{asset('assets/paurashava_frontend/images/imgAll/Mujib_sotoborso.jpg')}}" alt="Awareness" title="Awareness"
								class="img-responsive">
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<h4 class="UTitle2">আপডেট নোটিশ</h4>
							<div class="UCategoryList">
								<marquee direction="down" height="250" scrollamount="4" onMouseOver="this.stop()"
									onMouseOut="this.start()">

									<div class="news-item">
										<a href="javascript:void(0)" target="_blank">
											<p>পৌরসভার সকল নাগরিক সুবিধার খরচাদি</p>
											<h5>২৭-১১-২০১৯</h5>
										</a>
									</div>
									<div class="news-item">
										<a href="{{asset('assets/paurashava_frontend/images/Doc/notice2811.jpg')}}" target="_blank">
											<p>তারাব পৌরসভায় স্মার্ট জাতীয় পরিচয়পত্র বিতরন সময়সূচীসূচী</p>
											<h5>২৭-১১-২০১৯</h5>
										</a>
									</div>
									<div class="news-item">
										<a href="http://digitalpaurashava.gov.bd" target="_blank">
											<p>পৌরসভার সকল নাগরিক সুবিধা অনলাইনে পেতে Digital Paurashava.gov.bd তে
												নিবন্ধন করুন.</p>
											<h5>০৬-১২-২০১৯</h5>
										</a>
									</div>
									<div class="news-item">
										<a href="{{asset('assets/paurashava_frontend/images/Doc/sanitation_notice.pdf')}}" target="_blank">
											<p>তারাব পৌরসভার স্যানিটেশন সংক্রান্ত নোটিশ</p>
											<h5>২৩-১২-২০১৯</h5>
										</a>
									</div>
									<div class="news-item">
										<a href="{{asset('assets/paurashava_frontend/images/Doc/noc/NOC_of_Nazrul_Islam.pdf')}}" target="_blank">
											<p>জনাব মোঃ নজরুল ইসলাম এর আন্তর্জাতিক পাসপোর্ট নবায়ন এর অনাপত্তি পত্র</p>
											<h5>১৬-০২-২০২০</h5>
										</a>
									</div>
									<div class="news-item">
										<a href="{{asset('assets/paurashava_frontend/images/Doc/Job_circular_1.pdf')}}">
											<p>তারাব পৌরসভার নিয়োগ বিজ্ঞপ্তি</p>
											<h5>০২-০৭-২০২০</h5>
										</a>
									</div>
									<div class="news-item">
										<a href="{{asset('assets/paurashava_frontend/images/Doc/jobcircular2.pdf')}}">
											<p>তারাব পৌরসভার পুনঃ নিয়োগ বিজ্ঞপ্তি</p>
											<h5>২৭-০৮-২০২০</h5>
										</a>
									</div>
									<div class="news-item">
										<a href="{{asset('assets/paurashava_frontend/images/Doc/forms/ApplicationForm.pdf')}}">
											<p>তারাব পৌরসভার চাকুরী আবেদন ফরম</p>
											<h5>০২-০৭-২০২০</h5>
										</a>
									</div>
									<div class="news-item">
										<a href="{{asset('assets/paurashava_frontend/images/Doc/noc/Noc-Nazmul-Islam.pdf')}}" target="_blank">
											<p>জনাব মোঃ নাজমুল ইসলাম এর আন্তর্জাতিক পাসপোর্ট নবায়ন এর NOC-02</p>
											<h5>২৯-০১-২০২১</h5>
										</a>
									</div>
									<div class="news-item">
										<a href="{{asset('assets/paurashava_frontend/images/Doc/noc/Noc-Nazmul-Islam-2.pdf')}}" target="_blank">
											<p>জনাব মোঃ নাজমুল ইসলাম এর আন্তর্জাতিক পাসপোর্ট নবায়ন এর NOC-01</p>
											<h5>২৯-০১-২০২১</h5>
										</a>
									</div>
								</marquee>
							</div>
						</div>
					</div>
					<div class="row UMarginTop15">
						<div class="col-sm-12">
							<h4 class="UTitle2">গুরুত্বপূর্ণ লিঙ্ক</h4>
							<div class="UCategoryList">
								<div class="list-group">
									@foreach($importantlinks as $importantlink)
									<a href="{{$importantlink->url}}" target="_blank"
										class="list-group-item">{{$importantlink->name}}</a>
									@endforeach
								</div>
							</div>
						</div>
					</div>
					<div class="row UMarginTop15">
						<div class="col-sm-12">
							<h4 class="UTitle2">কেন্দ্রীয় ই-সেবা</h4>
							<div class="UCategoryList">
								<div class="list-group">
									<a href="http://bris.lgd.gov.bd/pub/?pg=application_form"
										title="Birth and Death Registration" target="_blank"
										class="list-group-item">Birth and Death Registration</a>
									<a href="http://www.cga.gov.bd/index.php?option=com_wrapper"
										title="Online Invoice Verification" target="_blank"
										class="list-group-item">Online Invoice Verification</a>
									<a href="http://www.bmet.gov.bd/BMET/onlinaVisaCheckAction" title="Verify Visa"
										target="_blank" class="list-group-item">Verify Visa</a>
									<a href="http://www.nbrepayment.gov.bd/" title="e-Tax Payment" target="_blank"
										class="list-group-item">e-Tax Payment</a>
									<a href="https://services.nidw.gov.bd/"
										title="Updating national identity card information" target="_blank"
										class="list-group-item">Updating national identity card information</a>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12 UMarginTop15">
							<div class="fb-page" data-href="https://www.facebook.com/" data-small-header="false"
								data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
								<blockquote cite="https://www.facebook.com/" class="fb-xfbml-parse-ignore"><a
										href="https://www.facebook.com/">Tarabo Paurashava</a></blockquote>
							</div>
						</div>
					</div>

					<div class="row UMarginTop15">
						<div class="col-sm-12">
							<h5 class="UTitle2"> ডিজিটাল বাংলাদেশ দিবস ২০১৯ </h5>
							<a href="https://www.youtube.com/watch?v=tgCZJZhFHjw" target="_blank" title=""><img
									alt="ডিজিটাল বাংলাদেশ দিবস ২০১৯  	"
									src="{{asset('assets/paurashava_frontend/images/index_right/Digital_bangladesh_2019.jpg')}}" style="width:100%"></a>
						</div>
					</div>
					<div class="row UMarginTop15">
						<div class="col-sm-12">
							<h4 class="UTitle2">ডেঙ্গু প্রতিরোধে করণীয় </h4>
							<a href="https://bangladesh.gov.bd/site/page/91530698-c795-4542-88f2-5da1870bd50c"
								target="_blank" title=""><img alt="
  ডেঙ্গু প্রতিরোধে করণীয় " src="{{asset('assets/paurashava_frontend/images/index_right/dengue.jpg')}}" style="width:100%"></a>
						</div>
					</div>
				</div>
			</div>

		</div>
	</main>

@endsection
