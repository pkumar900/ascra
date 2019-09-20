<?php
   $page='contact';require_once('inc/top.php');
?>
<!-- //header -->

<!-- banner -->
<div class="inner-banner" id="home">
	<div class="inner-banner-overlay">
		<div class="container">
			
		</div>
	</div>
</div>
<!-- //banner -->

<!-- page details -->
<div class="breadcrumb-agile">
	<div class="container">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.html">Home</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Contat Us</li>
		</ol>
	</div>
</div>
<!-- //page details -->

<!-- contact -->
<section class="contact py-sm-5 py-4">
	<div class="container py-md-3">
		<h2 class="heading text-capitalize text-center mb-lg-5 mb-sm-4 mb-3"> Contact Us</h2>
		<div class="contact-form">
			<form action="#" method="post">
				<div class="row main-w3layouts-sectns">
					<div class="col-lg-3 col-md-6 w3-btm-spc form-text1">
						<label><span class="fa fa-user"></span> Your Name:</label>
						<input type="text" name="Name" placeholder="John Watson" required="">
					</div>
					<div class="col-lg-3 col-md-6 w3-btm-spc form-text2">
						<label><span class="fa fa-phone"></span> Phone Number:</label>
						<input type="text" name="Phone no" placeholder="xxxxxxxxxx" required="">
					</div>
					<div class="col-lg-3 col-md-6 w3-btm-spc form-text1">
						<label><span class="fa fa-envelope-open"></span> Email Address:</label>
						<input type="email" name="email" placeholder="example@mail.com" required="">
					</div>
					<div class="col-lg-3 col-md-6 w3-btm-spc form-text2">
						<label><span class="fa fa-pencil"></span> Subject:</label>
						<input type="text" name="subject" placeholder="Hair Style" required="">
					</div>
				</div>
				<div class="main-w3layouts-sectns ">
					<div class="w3-btm-spc form-text2 p-0">
						<textarea placeholder="Enter Your Message Here"></textarea>
					</div>
				</div>
				<button class="btn"> Submit</button>
			</form>
		</div>
	</div>
</section>
<!-- //contact -->

<!-- map -->
<div class="map p-2">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158857.728106568!2d-0.24168153701090248!3d51.52877184090542!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon%2C+UK!5e0!3m2!1sen!2sin!4v1544074523717"></iframe>
</div>
<!-- map -->

<!-- footer top-->
<?php
   $page='contact';require_once('inc/footer.php');
?>
	
</body>
</html>