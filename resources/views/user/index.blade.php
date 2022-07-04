<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Manyatta Films And Modelling Agency</title>

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
                    <img src="images/bakkenya.jpg" alt="image">
                </div>
            </div>

		</div>
		   <div class="swiper-pagination"></div>

	</div>

</section>
 <!--home section ends-->

 <!--dishes section begins-->
   <!-- <section class="dishes" id="models">

	<h3 class="sub-heading">our models</h3>
	<h1 class="heading">popular models</h1>

    <div  class="flex-container">
        <div class="row">
            <div class="image">
                <img src="images/model2.jpg" class="img-responsive" alt="img">
               <div class="description">
                  <span>
                     <h3 style="font-size:20px !Important">Aleisha Amanda</h3>
                  </span>

                   <h4 style="font-size:13px !Important">Commercial Model</h4>
                </div>
            </div>
            <div class="image">
                <img src="images/chefs-02.jpg" class="img-responsive" alt="img">
               <div class="description">
                  <span>
                     <h3 style="font-size:20px !Important">Aleisha Amanda</h3>
                  </span>

                   <h4 style="font-size:13px !Important">Commercial Model</h4>
                </div>
            </div>
            <div class="image">
                <img src="images/model2.jpg" class="img-responsive" alt="img">
               <div class="description">
                  <span>
                     <h3 style="font-size:20px !Important">Aleisha Amanda</h3>
                  </span>

                   <h4 style="font-size:13px !Important">Commercial Model</h4>
                </div>
            </div>
            <div class="image">
                <img src="images/chefs-01.jpg" class="img-responsive" alt="img">
               <div class="description">
                  <span>
                     <h3 style="font-size:20px !Important">Aleisha Amanda</h3>
                  </span>

                   <h4 style="font-size:13px !Important">Commercial Model</h4>
                </div>
            </div>
            <div class="image">
                <img src="images/model2.jpg" class="img-responsive" alt="img">
               <div class="description">
                  <span>
                     <h3 style="font-size:20px !Important">Aleisha Amanda</h3>
                  </span>

                   <h4 style="font-size:13px !Important">Commercial Model</h4>
                </div>
            </div>
            <div class="image">
                <img src="images/chefs-03.jpg" class="img-responsive" alt="img">
               <div class="description">
                  <span>
                     <h3 style="font-size:20px !Important">Aleisha Amanda</h3>
                  </span>

                   <h4 style="font-size:13px !Important">Commercial Model</h4>
                </div>
            </div>


        </div>
    </div>



    </section> -->

 <!--dishes section ends-->

  <!--about section starts-->
<section class="about" id="about">

	<h3 class="sub-heading">about us</h3>
	<h1 class="heading">why choose us</h1>

	<div class="row">

		<div class="image">
			<img style="border-radius: 5px;" src="{{asset('images/bak logo.png')}}" alt="image">
		</div>

			<div class="content">
				<h3>Best Modelling agency in the city</h3>
				<p>Here at Manyatta we identify talents, nurture them with the best skills interms of fashion, modelling and life skills in general. we work and develop our models from scratch to sky </p>
				<p>we're so determined with our team to achieve the great from this fiels. welcome all </p>

			 <div class="icons-container">
				<a href="{{ url('contact')}}" class="btn">Contact us</a>
			 </div>
		  </div>
	</div>
</section>
 <!--about section ends-->

 <!--menu section starts-->

<!--review section ends-->


<!--order section starts-->
<section  class="order" id="contact_us">
    <h3 class="sub-heading">Contact us</h3>
    <h1 class="heading">Contact our helpdesk today</h1>

    <form action="{{url('contact_form')}}" method="post">
        @csrf
       <div class="inputBox">
        <div class="input">
            <span>name</span>
            <input type="text" name="name" required placeholder="Enter your name" >
        </div>
        <div class="input">
            <span>phone number</span>
            <input type="number" name="phone" required placeholder="Enter your phone number" >
        </div>
        <div class="input">
            <span>address(location) </span>
            <input type="text"name="address" required placeholder="Enter your address" >
        </div>
        <div class="input">
            <span>subject</span>
            <select  name="subject">
                <option value="">--select option--</option>
                <option value="Query">Query</option>
                <option value="Problem Applying">Problem Applying</option>
                <option value="other">Other option...</option>
            </select>
        </div>


        <div class="input">
            <span>your message</span>
            <textarea name="message" required placeholder="enter your message" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="input">
            <span>Comments(Extra comments)</span>
            <textarea name="comments" required placeholder="enter your comments" id="" cols="30" rows="10"></textarea>
        </div>
      </div>
      <input type="submit" value="submit"  name="contact-submit" class="btn">

    </form>
</section>
<!--order section ends-->

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
