<?php
/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page.
 */

get_header(); ?>


<!-- 	<div id="page-content">  -->
		<?php // the_content(); endwhile; ?> 
<!-- 	</div>  -->


<div class="carousel slide carousel-montere carousel-overlay" id="carousel"> <!-- class="toflip"  data-ride="carousel" -->
	<!-- Carousel Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#carousel" data-slide-to="0" class="active"></li>
		<li data-target="#carousel" data-slide-to="1"></li>
		<li data-target="#carousel" data-slide-to="2"></li>
		<li data-target="#carousel" data-slide-to="3"></li>
	</ol>	<!-- END Carousel Indicators -->
	<!-- Carousel Items -->
	<div class="carousel-inner">
		<div class="item active item-1">
			<div class="carousel-caption">
				<h2>THE PERFECT LIMO FOR A NIGHT ON THE TOWN</h2>
				<p>Providing Excellence In Service Since 2013</p>
				<br/>
				<div class="row">
				<div class="btn-vert-block col-sm-6">
					<a class="left-slider-button" href="http://thinkinglimo.com/contact-limo-service/">GET A QUOTE</a> 
				</div>
				<div class="btn-vert-block col-sm-6">
					<a href="http://thinkinglimo.com/limo-service-reservation/">Book limo now</a>
				</div>
				</div>
			</div>
		</div>

		<div class="item item-2">
			<div class="carousel-caption">
				<h2>YOU'RE GOING PLACES.  WE'LL TAKE YOU THERE.</h2>
				<p>Providing Excellence In Service Since 2013</p>
				<br/>
				<div class="row">
				<div class="btn-vert-block col-sm-6">
					<a class="left-slider-button" href="http://thinkinglimo.com/contact-limo-service/">GET A QUOTE</a> 
				</div>
				<div class="btn-vert-block col-sm-6">
					<a href="http://thinkinglimo.com/limo-service-reservation/">Book limo now</a>
				</div>
				</div>
			</div>
		</div>

		<div class="item item-3">
			<div class="carousel-caption">
				<h2>GET THE PERFECT LIMO FOR YOUR WEDDING</h2>
				<p>Providing Excellence In Service Since 2013</p>
				<br/>
				<div class="row">
				<div class="btn-vert-block col-sm-6">
					<a class="left-slider-button" href="http://thinkinglimo.com/contact-limo-service/">GET A QUOTE</a> 
				</div>
				<div class="btn-vert-block col-sm-6">
					<a href="http://thinkinglimo.com/limo-service-reservation/">Book limo now</a>
				</div>
				</div>
			</div>
		</div>

		<div class="item item-4">
			<div class="carousel-caption">
				<h2>SERVICING ALL CORPORATE AND VIP EVENTS</h2>
				<p>Providing Excellence In Service Since 2013</p>
				<br/>
				<div class="row">
				<div class="btn-vert-block col-sm-6">
					<a class="left-slider-button" href="http://thinkinglimo.com/contact-limo-service/">GET A QUOTE</a> 
				</div>
				<div class="btn-vert-block col-sm-6">
					<a href="http://thinkinglimo.com/limo-service-reservation/">Book limo now</a>
				</div>
				</div>
			</div>
		</div>
	</div>	<!-- END Carousel Items -->
	<!-- Carousel Controls -->
	<a class="left carousel-control" href="#carousel" data-slide="prev">
    	<span class="icon-prev"></span>
	</a>
	<a class="right carousel-control" href="#carousel" data-slide="next">
		<span class="icon-next"></span>
    </a> <!-- END Carousel Controls --> 
</div>

<section class="row-1 fluid-container">
  <div class="row">
	<div class="col-sm-6">
	  <div id="qualitycycle-wrapper" class="half-block"> <!-- class="toflip" for fadein -->
		<div class="inner pad90">
			<img src="wp-content/themes/LimoStrap/assets/img/ico-airport.png" alt="Airport Limo Services">
			<h4>AIRPORT<small>SERVICES</small></h4>
			<p><a href="http://thinkinglimo.com/limo-service-reservation/" class="btn btn-light">BOOK LIMO NOW</a></p>
		</div>
	  </div>        </div>
	<div class="col-sm-6">
	  <div id="qualitymap-wrapper" class="half-block"> <!-- class="toflip" for fadein -->
		<div class="inner pad90">
			<img src="wp-content/themes/LimoStrap/assets/img/ico-corporate.png" alt="Corporate Limo Services">
			<h4>CORPORATE<small>SERVICES </small></h4>
			<p><a href="http://thinkinglimo.com/limo-service-reservation/" class="btn btn-light">BOOK LIMO NOW</a></p>
		</div>
	  </div>  <!-- / #qualitycycle-wrapper -->   
	</div>  <!-- / .col-sm-6 -->
  </div> <!-- / .row --> 
</section> <!-- / .row-1 -->

<section class="row-2 fluid-container">
  <div class="row">
	<div class="col-sm-6">
	  <div id="recipes-wrapper" class="half-block"> <!-- class="toflip" for fadein -->
		<div class="inner pad90">
			<img src="wp-content/themes/LimoStrap/assets/img/ico-weddings.png" alt="Wedding Limo Services">
			<h4>WEDDINGS<small>SERVICES</small></h4>
			<p><a href="http://thinkinglimo.com/limo-service-reservation/" class="btn btn-light">BOOK LIMO NOW</a></p>
		</div> <!-- / .inner --> 
	  </div> <!-- / #recipies-wrapper -->  
	</div>  <!-- / .col-sm-6 -->
	<div class="col-sm-6">
	  <div id="journal-wrapper" class="half-block"> <!-- class="toflip" for fadein -->
		<div class="inner pad90">
			<img src="wp-content/themes/LimoStrap/assets/img/ico-personal.png" alt="Personal Limo Services">
			<h4>PERSONAL<small>SERVICES</small></h4>
			<p><a href="http://thinkinglimo.com/limo-service-reservation/" class="btn btn-light">BOOK LIMO NOW</a></p>
		</div> <!-- / .inner --> 
	  </div> <!-- / #journal-wrapper --> 
	</div> <!-- / .col-sm-6 --> 
  </div> <!-- / .row --> 
</section> <!-- /.row-2 -->

<section id="main-text" class="tofade">
	<div class="inner pad70 front-page-text">
		<h4>You're going places. We'll take you here.</h4>
		<p>
			Since we first opened our doors in 2013, we have been providing transportation services
			for clients with a wide range of needs.
			We are locally based, and our vast affiliate network gives us global reach.
			Wherever you want to go, and whatever your transportation needs may be, 
			we are the company that will get you there.
		</p>
		<p>
			Our fleet of modern vehicles ranges from Lincoln Towncar sedans to large state-of-the-art luxury
			coach buses, and everything in between. Whether you're celebrating a wedding, shuttling attendees
			to a corporate function, wining and dining your clients, going to a concert or a sporting event,
			or just need a ride to the airport, we have the perfect vehicle to suit your needs.
		</p>
		<p>
			Professional service is more than something nice that we like to do.
			It's our commitment to our clients. Our reservation offices are open 24 hours a day,
			and our chauffeurs are well-trained to take you wherever you need to go safely and comfortably.
			So sit back, relax, and enjoy your ride.	
		</p>	
		<br/><br/>
		<a href="http://thinkinglimo.com/limo-service-reservation/">
			<img class="coupon-img" src="wp-content/themes/LimoStrap/assets/img/coupon.jpg" alt="Limo Service Discount" />
		</a>
		<br/><br/>
	</div>
</section> <!-- /#tracking-wrapper -->


<?php get_footer(); ?>