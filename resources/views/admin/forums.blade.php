@extends('layouts.smart-hr')
@section('content')
@include('layouts.partials.flash')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="row">
            <div class="col-sm-12">
              <div class="card">
                
               


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
            
 <!--home section ends-->
                <section class="forums" id="forum-section">
                    <h3 class="sub-heading">Forums</h3>
                    <h1 class="heading">Posts available</h1>

                    <div class="flex-container">
                        <div class="row">
                            @foreach ($forums as $forum)
                                <a href="{{ url('view_post',$forum->slug)}}">
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

                <!--footer section ends-->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                @if(session()->has('success'))
                <script>
                    swal("form submitted successfully","Done","success");
                </script>
                @endif

                <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


                <script src="{{asset('js/manyatta.js')}}"></script>
               
                


              </div>
            </div>

        </div>
    </div></div>
    
    
@endsection