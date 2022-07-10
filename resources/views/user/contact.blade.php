<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>BodaBoda Association of Kenya</title>

	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link
     rel="stylesheet"
     href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
    />

    <link   rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" type="text/css" href="{{ asset('css/manyatta.css')}}">
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
        .maps-container{
            display:flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            padding:30px;
        }
        .maps-container .row{
            display:flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            margin: 20px;
        }
         .maps-container .row .header span{
            display:flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            color:darkslategray;
            font-weight: bold;
            padding-right: 30px;
        }
         .maps-container .row .map{
            display:flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            object-fit: contain;
        }
        .error{
            color: red;
            justify-content: center;
            align-items: center;
            margin: 20px;
            font-size:16px;
        }



        @media(max-width:445px){
            .maps-container .row .header span{
                display:flex;
                align-items: center;
                justify-content: center;

            }
             .maps-container .row .map{
                display:flex;
                flex-wrap: wrap;
                align-items: center;
                justify-content: center;
                margin: 20px;
            }

             .maps-container .row .map iframe {
                display:flex;
                flex-wrap: wrap;
                width: 300px;
            }
            .error{
            color: red;
            justify-content: center;
            align-items: center;
            margin: 20px;
        }

        }
    </style>
</head>
<body>

    @include('user.navbar');

    <section style="padding-top: 17rem;" class="order" id="contact_us">
        <h3 class="sub-heading">Contact us</h3>
        <h1 class="heading">Talk to us today</h1>

        <form action="{{ url('contact_form') }}" method="post">
            <span class="error">
                @if ($errors->any())
                <div style="margin-left:50px;"  class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                </div>
                 @endif
               </span>
            @csrf
           <div class="inputBox">
            <div class="input">
                <span>name</span>
                <input type="text" required name="name" placeholder="Enter your name" >
            </div>
            <div class="input">
                <span>phone number</span>
                <input type="number" required name="phone" placeholder="Enter your phone number" >
            </div>
            <div class="input">
                <span>address(location) </span>
                <input type="text"  required name="address" placeholder="Enter your address" >
            </div>
            <div class="input">
                <span>Subject</span>
                <select required  name="subject">
                    <option value="">--select option--</option>
                    <option value="Query">Query</option>
                    <option value="Problem Applying">Problem Applying</option>
                    <option value="other">Other option...</option>
                </select>
            </div>


            <div class="input">
                <span>Message</span>
                <textarea name="message" required placeholder="enter your message" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="input">
                <span>Comments(extra comments)</span>
                <textarea name="comments" required placeholder="enter your comments" id="" cols="30" rows="10"></textarea>
            </div>
          </div>
          <input type="submit" value="Submit" id="contact_submit" onclick=MyFunction()  class="btn">
        </form>
    </section>

    <div class="maps-container">
        <div class="row">
            <div class="header">
                <span>kenyatta avenue<br>Anniversary towers<br>5th Floor room 54</span>
            </div>
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8201541417698!2d36.81419681427458!3d-1.2816562359814632!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f10d253a461ab%3A0xf1a32b0dbcf6c646!2sAnniversary%20Towers!5e0!3m2!1sen!2ske!4v1656964127431!5m2!1sen!2ske" width="450" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    @include('user.footer');

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        @if(session()->has('success'))
        <script>
            swal("form submitted successfully","Form submitted","success");
        </script>
      @endif
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


    <script src="js/manyatta.js"></script>
    <script src="js/swiper.js"></script>

</body>
</html>
