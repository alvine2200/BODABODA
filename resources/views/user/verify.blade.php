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
        :root {
        --primary-color: #00bcd4;
        --accent-color: #f50057;

        --text-color: #263238;
        --body-color: #80deea;
        --main-font: 'roboto';
        --font-bold: 700;
        --font-regular: 400;
    }
    * { box-sizing: border-box }

    body {
        color: var(--text-color);
        /* background-color: var(--body-color); */
        font-family: var(--main-font), Arial;
        font-weight: var(--font-regular);
        
    }
    main{ 
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 80vw;
        height: 60vh;
        border-radius:10px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    }
    h1 { font-weight: var(--font-bold) }
    input, 
    button {
        border: none;
        background: none;
        outline: 0;
    }
    button {cursor: pointer}
    .SearchBox-input::placeholder {/* No es un seudoelemento estandar */
    color:white;
        opacity: .6;
    }
    /* Chrome, Opera ySafari */
    .SearchBox-input::-webkit-input-placeholder {
    color: white;
    }
    /* Firefox 19+ */
    .SearchBox-input::-moz-placeholder {
    color: white;
    }
    /* IE 10+ y Edge */
    .SearchBox-input:-ms-input-placeholder {
    color: white;
    }
    /* Firefox 18- */
    #formGroupExampleInput:-moz-placeholder {
    color: white;
    }

  .SearchBox {
	--height: 4em;
	display: flex;	
	border-radius: var(--height);
	 background-color: var(--primary-color); */
	height: var(--height);
  }
	.SearchBox:hover .SearchBox-input {
		padding-left: 2em;
		padding-right: 1em;
		 width: 240px;
	}
	.SearchBox-input {
		width: 0;
		font-size: 1.2em;
		color: #fff;
		transition: .45s;  
	}
	.SearchBox-button {
		display: flex;
		border-radius: 50%;
		width: var(--height);
		height: var(--height);
		background-color: var(--accent-color);
		transition: .3s;
	}
	.SearchBox-button:active  {
		transform: scale(.85);
	}
	.SearchBox-icon {
		margin: auto;
		color: #fff;
	}


  @media screen and (min-width: 450px){
	.SearchBox:hover .SearchBox-input {
		width: 500px;
        font-size:16px;
        font-weight:bold;
	}
}
    </style>
</head>
<body>
 <!--header starts-->

	@include('user.navbar');

 <!--header ends-->


 <section style="padding-top:17rem; padding-bottom:4rem;" class="forums" id="forum-section">
    <h3 class="sub-heading">Verify Rider</h3>
	<h1 class="heading">Check if Rider Exists</h1>

    <div class="flex-container">
        <div class="row">           
            <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

            <main>
                <form action="{{url('search')}}" method="post">
                    @csrf
                    <h1>Verify Your Riders, Be safe</h1>            
                    <div class="SearchBox">
                        <input type="text" name="field" class="SearchBox-input" placeholder="Enter the license number Here ...">                    
                        <button class="SearchBox-button">
                            <em class="SearchBox-icon  material-icons">search</em>
                        </button>                                          
                    </div>
                 </form>             
            </main>
        </div>
    </div>

 </section>

<!--footer section starts-->
 @include('user.footer');

<!--footer section ends-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if(session()->has('fail'))
<script>
    swal("Rider Not Found","fail","error");
</script>
@endif
@if(session()->has('success'))
<script>
    swal("Rider Found","Enjoy your ride","success");
</script>
@endif
@if(session()->has('deactivated'))
<script>
    swal("Rider is banned until further notice","Do not board","error");
</script>
@endif

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script src="{{asset('js/manyatta.js')}}"></script>
</body>
</html>
