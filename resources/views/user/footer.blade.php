
 <!--footer starts-->

 <section style="background-color:rgb(227, 223, 223)" class="footer" id="footer">
	<div class="box-container">
		<div class="box">
			<h3>locations</h3>
			<a href="#">nairobi<br>
                Kenyatta Avenue <br>
                Anniversary Towers<br>
                5th floor room 54<br>
            </a>

		</div>
		<div class="box">
			<h3>quick links</h3>
			<a class="active" href="{{ url('/')}}">home</a>
            <a href="{{url('about')}}">About Us</a>
			<a href="{{url('contact')}}">Contact Us</a>
			<a href="{{url('login')}}">Login</a>
			<a href="{{url('register')}}">Register</a>
		</div>
		<div class="box">
			<h3>contact info</h3>
			<a href="#"><i class="fab fa-whatsapp fa-lg"></i>
                 <i class="fas fa-phone-square-alt fa-lg"></i>
                 <i class="fas fa-sms fa-lg"></i>
                 +2547 121 356 43
            </a>

			<a href="#">BodaBoda@gmail.com</a>

		</div>

		<div class="box">
			<h3>follow us</h3>
			<a href="#"><i class="fab fa-facebook fa-lg"></i></a>
			<a href="#"><i class="fab fa-instagram-square fa-lg"></i></a>
			<a href="#"><i class="fab fa-youtube fa-lg"></i></a>

		</div>


	</div>
	<div class="credit">copyright @ {{now()->format('Y')}}</div> by <span>Alvine Llavu</span></div>
</section>


<!--footer section ends-->

