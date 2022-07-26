<!DOCTYPE html>
<html lang="en">
<head>

    <base href="/public">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Boda Association of Kenya</title>

	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" type="text/css" href="css/manyatta.css">
    <style>
        * {
        box-sizing: border-box;
        }

        .column {
        float: left;
        width: 50%;
        padding: 20px;
        height: auto;

        }

        .row:after {
        content: "";
        display: table;
        clear: both;
        }
        .row{
            display:flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
       .image img{
            margin:15px;
            width:500px;
            height:450px;
            border-radius: 10px !important;
        }
        .post-heading{
            font-size:40px;
            font-weight:bold;
            margin:20px;
        }
        .post-subtopic{
            font-size:24px;
            font-weight:bold;
            margin:20px;
        }
        .body{
            padding-top:100px;
            font-size:16px;
            font-weight:bold;
            margin:20px;
        }
        .person{
            font-size:16px;
            font-weight:bold;
            color:blue;
            margin:20px;
        }
        .time{
            font-size:16px;
            font-weight:bold;
            color:blue;
            margin:20px;

        }
        .row .comments{
            padding-top: 30px;
            margin:25px;
            font-size: 16px;
            font-weight:bold;
        }
        .separator{
            padding-top:20px;
            font-size:24px;
            font-weight:bold;
        }

        @media(max-width:445px)
        {

            .column {
                margin:20px;
                width: 100%;
                padding: 20px;
                height: auto;
            }
            .row{
                width: 100%;
                display:flex;
                flex-wrap: wrap;
                justify-content: center;
                align-items: center;
                box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            }
            .image img{
                width: 100%;
                object-fit: contain;
                width: 250px;
                height: 500px;
            }

        }


    </style>

</head>
<body>
    @include('user.navbar')


    <section style="padding-top: 18rem; padding-bottom:4rem;">
        <div class="container">
            <div class="row">
                    <div class="column image">
                      <h2 class="post-heading">{{$post->topic}}</h2>
                      <span class="post-subtopic">{{$post->subtopic}}</span>
                      <img src="/images/forum/{{$post->image}}" alt="post image" class="img-responsive">

                    </div>
                    <div class="column info">
                      <p class="body">{{$post->body}}</p>
                      <span class="person">Posted by: {{$post->users->fullname}}</span>
                       <span class="time">Time: {{$post->time}}</span>

                    </div>

                    <div class="separator">
                        <span class="text">Reply section, Use good language, be sentimental</span>
                    </div>

                    <div class="comments">
                        <form action="" method="post">                          
                            
                            <textarea id="comments" name="comments" rows="7" cols="150" placeholder="Comment here ..."></textarea>

                            <button type="submit" name="submit-comment" class="btn">Add Comment</button>
                        </form>
                        

                    </div>

            </div>
        </div>

    </section>


    @include('user.footer')

    <script src="js/app.js"></script>
    <script src="js/manyatta.js"></script>
</body>
</html>
