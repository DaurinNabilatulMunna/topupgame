<?php
	require_once('../Client_detail.php');
	$object_number_one = $api_detail->tampil_semua_detailgame()[0];
?>

<!DOCTYPE html>
<html lang="zxx">
<head>
	<title>Cinashop</title>
	<meta charset="UTF-8">
	<meta name="description" content="Game Warrior Template">
	<meta name="keywords" content="warrior, game, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,400i,500,500i,700,700i" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/animate.css"/>


	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
		<div class="container">
			<!-- logo -->
			<a class="site-logo" href="index.html">
				<img src="img/logo.png" alt="">
			</a>
			<div class="user-panel">
				<a href="#">CinaShop || Top Up Games</a>
			</div>
			<!-- responsive -->
			<div class="nav-switch">
				<i class="fa fa-bars"></i>
			</div>
		</div>
	</header>
	<!-- Header section end -->


	<!-- Hero section -->
	<section class="hero-section">
		<div class="hero-slider owl-carousel">
			<div class="hs-item set-bg" data-setbg="img/slider-1.jpg">
				<div class="hs-text">
					<div class="container">
						<h2>Top Up Game <span>Termurah</span> Ada Disini</h2>
						<p>Cinashop adalah destinasi terkemuka untuk para gamer yang 
						<br>mencari layanan top up game yang handal dan berkualitas tinggi. 
						<br>Dengan komitmen untuk menyediakan pengalaman yang memuaskan bagi
						<br>para pelanggan, Cinashop menawarkan beragam layanan yang mencakup 
						<br>top up untuk berbagai permainan populer di berbagai platform.</p>
						<a href="#" class="site-btn">Read More</a>
					</div>
				</div>
			</div>
			<div class="hs-item set-bg" data-setbg="img/slider-2.jpg">
				<div class="hs-text">
					<div class="container">
					<h2>Top Up Game <span>Termurah</span> Ada Disini</h2>
						<p>Cinashop adalah destinasi terkemuka untuk para gamer yang 
						<br>mencari layanan top up game yang handal dan berkualitas tinggi. 
						<br>Dengan komitmen untuk menyediakan pengalaman yang memuaskan bagi
						<br>para pelanggan, Cinashop menawarkan beragam layanan yang mencakup 
						<br>top up untuk berbagai permainan populer di berbagai platform.</p>
						<a href="#" class="site-btn">Read More</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero section end -->


	<!-- Latest news section -->
	<div class="latest-news-section">
		<div class="ln-title">Latest News</div>
		<div class="news-ticker">
			<div class="news-ticker-contant">
				<div class="nt-item"><span class="new">new</span><?= $api_detail->tampil_semua_detailgame()[0]->nama_game; ?></div>
				<div class="nt-item"><span class="strategy">strategy</span><?= $api_detail->tampil_semua_detailgame()[1]->nama_game; ?></div>
				<div class="nt-item"><span class="racing">racing</span><?= $api_detail->tampil_semua_detailgame()[2]->nama_game; ?></div>
			</div>
		</div>
	</div>
	<!-- Latest news section end -->


	<!-- Feature section -->
	<section class="feature-section spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 p-0">
					<div class="feature-item set-bg" data-setbg="img/features/1.jpg">
						<span class="cata new">new</span>
						<div class="fi-content text-white">
							<h5><a href="#"><?= $api_detail->tampil_semua_detailgame()[0]->nama_game; ?></a></h5>
							<p><?= $api_detail->tampil_semua_detailgame()[0]->kategori_game; ?></p>
							<a href="#" class="fi-comment"><?= $api_detail->tampil_semua_detailgame()[0]->rating; ?> Rating</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 p-0">
					<div class="feature-item set-bg" data-setbg="img/features/2.jpg">
						<span class="cata strategy">strategy</span>
						<div class="fi-content text-white">
							<h5><a href="#"><?= $api_detail->tampil_semua_detailgame()[1]->nama_game; ?></a></h5>
							<p><?= $api_detail->tampil_semua_detailgame()[1]->kategori_game; ?></p>
							<a href="#" class="fi-comment"><?= $api_detail->tampil_semua_detailgame()[1]->rating; ?> Rating</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 p-0">
					<div class="feature-item set-bg" data-setbg="img/features/3.jpg">
						<span class="cata new">new</span>
						<div class="fi-content text-white">
						<h5><a href="#"><?= $api_detail->tampil_semua_detailgame()[2]->nama_game; ?></a></h5>
							<p><?= $api_detail->tampil_semua_detailgame()[2]->kategori_game; ?></p>
							<a href="#" class="fi-comment"><?= $api_detail->tampil_semua_detailgame()[2]->rating; ?> Rating</a>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 p-0">
					<div class="feature-item set-bg" data-setbg="img/features/4.jpg">
						<span class="cata racing">racing</span>
						<div class="fi-content text-white">
						<h5><a href="#"><?= $api_detail->tampil_semua_detailgame()[0]->nama_game; ?></a></h5>
							<p><?= $api_detail->tampil_semua_detailgame()[0]->kategori_game; ?></p>
							<a href="#" class="fi-comment"><?= $api_detail->tampil_semua_detailgame()[0]->rating; ?> Rating</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Feature section end -->


	<!-- Recent game section  -->
	<section class="recent-game-section spad set-bg" data-setbg="img/recent-game-bg.png">
		<div class="container">
			<div class="section-title">
				<div class="cata new">new</div>
				<h2>Recent Games</h2>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="recent-game-item">
						<div class="rgi-thumb set-bg" data-setbg="img/recent-game/1.jpg">
							<div class="cata new">new</div>
						</div>
						<div class="rgi-content">
							<h5><?= $api_detail->tampil_semua_detailgame()[0]->nama_game; ?></h5>
							<p><?= $api_detail->tampil_semua_detailgame()[0]->kategori_game; ?></p>
							<a href="#" class="comment"><?= $api_detail->tampil_semua_detailgame()[0]->rating; ?> Rating</a>
							<div class="rgi-extra">
								<div class="rgi-star"><img src="img/icons/star.png" alt=""></div>
								<div class="rgi-heart"><img src="img/icons/heart.png" alt=""></div>
							</div>
						</div>
					</div>	
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="recent-game-item">
						<div class="rgi-thumb set-bg" data-setbg="img/recent-game/2.jpg">
							<div class="cata racing">racing</div>
						</div>
						<div class="rgi-content">
							<h5><?= $api_detail->tampil_semua_detailgame()[1]->nama_game; ?></h5>
							<p><?= $api_detail->tampil_semua_detailgame()[1]->kategori_game; ?></p>
							<a href="#" class="comment"><?= $api_detail->tampil_semua_detailgame()[1]->rating; ?> Rating</a>
							<div class="rgi-extra">
								<div class="rgi-star"><img src="img/icons/star.png" alt=""></div>
								<div class="rgi-heart"><img src="img/icons/heart.png" alt=""></div>
							</div>
						</div>
					</div>	
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="recent-game-item">
						<div class="rgi-thumb set-bg" data-setbg="img/recent-game/3.jpg">
							<div class="cata adventure">Adventure</div>
						</div>
						<div class="rgi-content">
							<h5><?= $api_detail->tampil_semua_detailgame()[2]->nama_game; ?></h5>
							<p><?= $api_detail->tampil_semua_detailgame()[2]->kategori_game; ?></p>
							<a href="#" class="comment"><?= $api_detail->tampil_semua_detailgame()[2]->rating; ?> Rating</a>
							<div class="rgi-extra">
								<div class="rgi-star"><img src="img/icons/star.png" alt=""></div>
								<div class="rgi-heart"><img src="img/icons/heart.png" alt=""></div>
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</section>
	<!-- Recent game section end -->


	<!-- Tournaments section -->
	<section class="tournaments-section spad">
		<div class="container">
			<div class="tournament-title">Tournaments</div>
			<div class="row">
				<div class="col-md-6">
					<div class="tournament-item mb-4 mb-lg-0">
						<div class="ti-notic">Premium Tournament</div>
						<div class="ti-content">
							<div class="ti-thumb set-bg" data-setbg="img/tournament/1.jpg"></div>
							<div class="ti-text">
								<h4>World Of WarCraft</h4>
								<ul>
									<li><span>Tournament Beggins:</span> June 20, 2018</li>
									<li><span>Tounament Ends:</span> July 01, 2018</li>
									<li><span>Participants:</span> 10 teams</li>
									<li><span>Tournament Author:</span> Admin</li>
								</ul>
								<p><span>Prizes:</span> 1st place $2000, 2nd place: $1000, 3rd place: $500</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="tournament-item">
						<div class="ti-notic">Premium Tournament</div>
						<div class="ti-content">
							<div class="ti-thumb set-bg" data-setbg="img/tournament/2.jpg"></div>
							<div class="ti-text">
								<h4>DOOM</h4>
								<ul>
									<li><span>Tournament Beggins:</span> June 20, 2018</li>
									<li><span>Tounament Ends:</span> July 01, 2018</li>
									<li><span>Participants:</span> 10 teams</li>
									<li><span>Tournament Author:</span> Admin</li>
								</ul>
								<p><span>Prizes:</span> 1st place $2000, 2nd place: $1000, 3rd place: $500</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Tournaments section bg -->


	<!-- Review section -->
	<section class="review-section spad set-bg" data-setbg="img/review-bg.png">
		<div class="container">
			<div class="section-title">
				<div class="cata new">new</div>
				<h2>Recent Reviews</h2>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="review-item">
						<div class="review-cover set-bg" data-setbg="img/review/1.jpg">
							<div class="score yellow">9.3</div>
						</div>
						<div class="review-text">
							<h5><?= $api_detail->tampil_semua_detailgame()[0]->nama_game; ?></h5>
							<p><?= $api_detail->tampil_semua_detailgame()[0]->kategori_game; ?></p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="review-item">
						<div class="review-cover set-bg" data-setbg="img/review/2.jpg">
							<div class="score purple">9.5</div>
						</div>
						<div class="review-text">
							<h5><?= $api_detail->tampil_semua_detailgame()[1]->nama_game; ?></h5>
							<p><?= $api_detail->tampil_semua_detailgame()[1]->kategori_game; ?></p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="review-item">
						<div class="review-cover set-bg" data-setbg="img/review/3.jpg">
							<div class="score green">9.1</div>
						</div>
						<div class="review-text">
							<h5><?= $api_detail->tampil_semua_detailgame()[2]->nama_game; ?></h5>
							<p><?= $api_detail->tampil_semua_detailgame()[2]->kategori_game; ?></p>
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="review-item">
						<div class="review-cover set-bg" data-setbg="img/review/4.jpg">
							<div class="score pink">9.7</div>
						</div>
						<div class="review-text">
							<h5><?= $api_detail->tampil_semua_detailgame()[0]->nama_game; ?></h5>
							<p><?= $api_detail->tampil_semua_detailgame()[0]->kategori_game; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Review section end -->

	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.marquee.min.js"></script>
	<script src="js/main.js"></script>
    </body>
</html>