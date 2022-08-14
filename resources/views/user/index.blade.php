<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Boda Association of Kenya</title>

	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" type="text/css" href="css/manyatta.css">
    <style>
        select{
            background: #eee;
            border-radius: .5rem;
            padding: 1rem;
            font-size: 1.6rem;
            color: var(--black);
            text-transform: none;
            margin-bottom: 1rem;
            width: 100%;
        }
        .inputBox{
            padding-top: 2rem;
        }
        iframe{
           width: 200px;
        }
    </style>
</head>
<body>
 <!--header starts-->

	@include('user.navbar');

 <!--header ends-->

 <<!--home section starts-->
<section style="padding-top:10rem !important; padding-bottom: 70px !important;" class="home" id="home">
	<div class=" swiper mySwipper home-slider ">
		<div class="swiper-wrapper wrapper">
			<div class="swiper-slide slide">
				<div class="content">
					<span>BodaBoda Association of Kenya</span>
					<h3>Kenyan BodaBoda Members</h3>
					<p> Welcome To BAK, Register, apply for a license.  <p>
					<a href="https://wa.me/0712135643" class="btn">Contact Us</a>
				</div>
                <div class="image">
                    <img src="images/bak logo.png" alt="image">
                </div>
				
			</div>
            <div class="swiper-slide slide">
                <div class="content">
                    <span>BodaBoda Association of Kenya</span>
                    <h3>Kenyan BodaBoda Members</h3>
                    <p> Welcome To BAK, Register, apply for a license.  <p>
                    <a href="#" class="btn">Contact Us</a>
                </div>
                <div class="image">
					<img src="images/bodaboda images.jpg" alt="image">
				</div>
            </div>
            <div class="swiper-slide slide">
                <div class="content">
                    <span>BodaBoda Association of Kenya</span>
                    <h3>Kenyan BodaBoda Members</h3>
                    <p> Welcome To BAK, Register, apply for a license.  <p>
                    <a href="#" class="btn">Contact Us</a>
                </div>
                <div class="image">
                    <img src="images/bakkenya.jpg" alt="image">
                </div>
            </div>

		</div>
		   <div class="swiper-pagination"></div>

	</div>

</section>
 <!--home section ends-->
 <section class="forums" id="forum-section">
    <h3 class="sub-heading">Forums</h3>
	<h1 class="heading">Posts available</h1>

    <div class="flex-container">
        <div class="row">
            @foreach ($forums as $forum)
                 <a href="{{ url('post',$forum->slug)}}">
                     <div class="image">
                        <img src="images/forum/{{ $forum->image}}" class="img-responsive" alt="img">
                     <div class="description">
                        <span>
                            <h3 style="font-size:20px !Important">{{$forum->topic}}</h3>
                        </span>

                        <h4 style="font-size:13px !Important">{{$forum->subtopic}}</h4>
                        </div>
                     </div>
                    </a>
            @endforeach
        </div>
    </div>

 </section>



  <!--about section starts-->
<section class="about" id="about">

	<h3 class="sub-heading">about us</h3>
	<h1 class="heading">why choose us</h1>

	<div class="row">

		<div class="image">
			<img style="border-radius: 5px;" src="{{asset('images/bak2.jpg')}}" alt="image">
		</div>

			<div class="content">
				<h3>Come Register as a certified rider</h3>
				<p>Here at we offer valid license and a means of identification for longer terms. Come and register to enjoy being a valued certified rider. Grab your License now and enjoy </p>
				<p>we're so determined with our team to achieve the great from the riders. welcome all </p>

			 <div class="icons-container">
				<a href="{{ url('contact')}}" class="btn">Contact us</a>
			 </div>
		  </div>
	</div>
</section>
 <!--about section ends-->


<!--footer section starts-->
 @include('user.footer');

<!--footer section ends-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if(session()->has('success'))
<script>
    swal("form submitted successfully","Done","success");
</script>
@endif

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


<script src="{{asset('js/manyatta.js')}}"></script>
</body>
</html>
