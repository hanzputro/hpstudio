        <!-- header -->
		<?php get_header(); ?>
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/pages/home.css">
		<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/vendor/baguetteBox.css">


        <!-- sidebar or left menu -->
        <!-- tabs pure css -->
        <aside class="sidemenu">
            <ul class="sidemenu__ul" id="sidemenu__ul--id">
            	<li class=""><a id="about-link" class="sidemenu__link active" href="#about">ME</a></li>
				<li class=""><a id="work-link" class="sidemenu__link" href="#work">WORK</a></li>
				<li class=""><a id="contact-link" class="sidemenu__link" href="#contact">CONTACT</a></li>
            </ul>
            <div class="sidemenu__minimize">
                <a><img src="<?php bloginfo('template_url'); ?>/dist/images/icons/minmax.png"></a>
            </div>
            <small class="copyright">&copy; 2018, Right Reserved</small>
        </aside>		

		<div class="main-section">
			<!-- cover -->
			<div class="cover"></div>

			<!-- Section : Me -->
			<section class="section" id="about">
				<div class="section__content left">
					<div class="about">
						<h1>
							Hi, Iam <span class="big">Hanif Putra.</span><br>							
							<span class="passion"><span class="big green pass1">Designer</span><strong>+</strong><span class="big orange pass2">Front-end Dev.</span><strong>+</strong><span class="big blue pass3">Web Dev.</span></span><br>
							based in <strong>Bekasi,</strong> <span class="big">Indonesia.</span><br> 
							<br>
							<!-- <span class="quote">"<strong>Cool Design</strong> + <strong>Code</strong> + <strong>Imagination</strong> = <strong>Symphony of Interactive Website</strong>"</span><br> -->
							<br>
							Lets discuss to <a href="#contact" class="big button link-to yellow">Help You</a> or check <a href="#work" class="big button link-to red">My Work</a>
						</h1>
					</div>					
				</div>					
			</section>

			<!-- Section : Work -->
			<section class="section active" id="work">
				<div class="section__content">
					<div class="work">
						<!-- Tab services category -->
						<!-- <div class="tab">
						  	<div class="tab-painel">
							    <input class="tab-open" id="tab-1" name="tab-wrap-1" type="radio">
							    <label class="tab-nav" for="tab-1">Creative Design</label>							    
						  	</div>

						  	<div class="tab-painel">
							    <input class="tab-open" id="tab-2" name="tab-wrap-1" type="radio">
							    <label class="tab-nav" for="tab-2">Front-end Development</label>
						  	</div>

						  	<div class="tab-painel">
							    <input class="tab-open" id="tab-3" name="tab-wrap-1" type="radio">
							    <label class="tab-nav" for="tab-3">Web Development</label>
						  	</div>
						</div> -->

						<ul class="grid-masonry">
							<?php
							for ($x = 0; $x <= 3; $x++) {
							?>						
							<li class="grid-masonry__item work__content">
								<a class="grid-masonry__content" href="<?php bloginfo('template_url'); ?>/dist/images/gallery/1.jpg"
									data-caption="
									<div class='button--info tooltips--work'>
										<span class='ico-info'></span>
										<div class='tooltips--work__content'>
											<h1>Stay Hungry, Stay Foolish <a href=''><span class='ico-link'></span></a></h1>
											<hr>
											<p>JUARA 1</p>
										</div>
									</div>" class="tooltips__gallery">
									<img id="img1" src="<?php bloginfo('template_url'); ?>/dist/images/gallery/1.jpg">
								</a>																
							</li>
							<li class="grid-masonry__item work__content">
								<a class="grid-masonry__content" href="<?php bloginfo('template_url'); ?>/dist/images/gallery/2.jpg"
									data-caption="
									<div class='button--info tooltips--work'>
										<span class='ico-info'></span>
										<div class='tooltips--work__content'>
											<h1>Stay Hungry, Stay Foolish <a href=''><span class='ico-link'></span></a></h1>
											<hr>
											<p>JUARA 1</p>
										</div>
									</div>" class="tooltips__gallery">
									<img id="img2" src="<?php bloginfo('template_url'); ?>/dist/images/gallery/2.jpg">
								</a>																
							</li>
							<li class="grid-masonry__item work__content">
								<a class="grid-masonry__content" href="<?php bloginfo('template_url'); ?>/dist/images/gallery/3.jpg"
									data-caption="
									<div class='button--info tooltips--work'>
										<span class='ico-info'></span>
										<div class='tooltips--work__content'>
											<h1>Stay Hungry, Stay Foolish <a class='popup--link' href=''><span class='ico-link'></span></a></h1>
											<hr>
											<p>JUARA 1</p>
										</div>
									</div>" class="tooltips__gallery">
									<img id="img3" src="<?php bloginfo('template_url'); ?>/dist/images/gallery/3.jpg">
								</a>																
							</li>
							<?php
							}
							?>							
						</ul>
						<div style="clear:both;"></div>
					</div>
				</div>					
			</section>

			<!-- Section : Contact -->
			<section class="section" id="contact">
				<div class="section__content left">
					<div class="contact">
						<h3>Contact Info:</h3>
						<p>
							<span class="label">Email</span> hanzputro@gmail.com<br>
							<span class="label">Phone</span> +62 812 90 655 754<br>
							<span class="label">Address</span> Perumahan Alinda Kencana 1, Blok F2 No 30, RT:007 RW:021,<br>
							Kaliabang Tengah, Bekasi Utara, 17125, Indonesia. 
						</p>						
						<hr>
						<p class="margin0">Lets discuss with me for your project or anythings you want.</p>
						<br>
						<form action="">
							<div class="field grid">
								<input id="name" class="span4" type="text" placeholder="Name">
								<input id="email" class="span4" type="email" Placeholder="Email">
								<input id="phone" class="span4" type="text" Placeholder="Phone">
							</div>
							<!-- <div class="field">
								<label for="">Email</label>
								<input type="Email">
							</div> -->
							<div class="field">
								<textarea id="message" class="" rows="10" Placeholder="Message"></textarea>
							</div>
							<div class="field margin0">
								<a href="" class="button--2">Send</a>
							</div>
						</form>
					</div>					
				</div>					
			</section>

		</div> <!-- /container maincontent -->

	</main><!-- /container -->
</body>

	<!-- JS -->	
	<!-- Latest compiled and minified JavaScript -->
	
	<?php wp_footer(); ?>
	<script src="<?php bloginfo('template_url'); ?>/assets/vendor/imagesloaded/imagesloaded.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/assets/vendor/baguetteBox/baguetteBox.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/assets/vendor/macy/dist/macy.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/dist/js/base.js"></script>
</html>