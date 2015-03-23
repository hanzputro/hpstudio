        <!-- header -->
		<?php include("includes/header.php"); ?>

        <!-- sidebar or left menu -->
        <!-- tabs pure css -->
        <div class="menuleft">
            <ul class="menuleft__ul" id="menuleft__ul--id">
				<li class=""><a class="menuleft--a" id="link-work" href="#work">WORK</a></li>
				<li class=""><a class="menuleft--a" id="link-services" href="#services">SERVICES</a></li>
				<li class=""><a class="menuleft--a" id="link-about" href="#about">ABOUT</a></li>
            </ul>
            <div class="menuleft__minimize">
                <a><img src="assets/images/icons/minmax.png"></a>
            </div>
        </div>		

		<div class="container--maincontent">

			<!-- Work panel -->
			<div class="maincontent panel" id="work">
				<div class="maincontent--wrap">
					<div class="maincontent__work">
						<ul class="grid effect-2 maincontent__work--ul" id="work__masonry">
							<li class="maincontent__work--li">
								<a href="assets/images/gallery/1.jpg"
								data-caption="
								<div class='button--info tooltips__work--gallery'>
									<span class='icon--info'></span>
									<div class='tooltips__work--span'>
										<h1 class='tooltips__work--h1'>Stay Hungry, Stay Foolish <a class='popup--link' href=''><span class='icon--link'></span></a></h1>
										<hr>
										<p class='tooltips__work--p'>JUARA 1</p>
									</div>
								</div>								
								<div class='button--gallery'><span class='icon--gallery'></span></div>
								" class="maincontent__work--a tooltips__gallery">
									<img class="maincontent__work--img" src="assets/images/gallery/1.jpg">
								</a>																
							</li>
							<li class="maincontent__work--li">
								<a href="assets/images/gallery/2.jpg"
								data-caption="
								<div class='button--info tooltips__work--gallery'>
									<span class='icon--info'></span>
									<div class='tooltips__work--span'>
										<h1 class='tooltips__work--h1'>Stay Hungry, Stay Foolish <a class='popup--link' href=''><span class='icon--link'></span></a></h1>
										<hr>
										<p class='tooltips__work--p'>JUARA 1</p>
									</div>
								</div>								
								<div class='button--gallery'><span class='icon--gallery'></span></div>
								" class="maincontent__work--a tooltips__gallery">
									<img class="maincontent__work--img" src="assets/images/gallery/2.jpg">
								</a>																
							</li>
							<li class="maincontent__work--li">
								<a href="assets/images/gallery/3.jpg"
								data-caption="
								<div class='button--info tooltips__work--gallery'>
									<span class='icon--info'></span>
									<div class='tooltips__work--span'>
										<h1 class='tooltips__work--h1'>Stay Hungry, Stay Foolish <a class='popup--link' href=''><span class='icon--link'></span></a></h1>
										<hr>
										<p class='tooltips__work--p'>JUARA 1</p>
									</div>
								</div>								
								<div class='button--gallery'><span class='icon--gallery'></span></div>
								" class="maincontent__work--a tooltips__gallery">
									<img class="maincontent__work--img" src="assets/images/gallery/3.jpg">
								</a>																
							</li>
						</ul>
						<div style="clear:both;"></div>					
					</div>
				</div>					
			</div>

			<!-- Services panel -->
			<div class="maincontent panel" id="services">
				<div class="maincontent--wrap">
					<!-- Tab services category -->
					<div class="tab">

					  	<!-- Tab Painel -->
					  	<div class="tab-painel">
						    <input class="tab-open" id="tab-1" name="tab-wrap-1" type="radio" checked>
						    <label class="tab-nav" for="tab-1">Web Development</label>
						    <div class="tab-inner">						    	
						      - wordpress<br>
						      - frontend Development
						    </div>
					  	</div>

					  	<div class="tab-painel">
						    <input class="tab-open" id="tab-2" name="tab-wrap-1" type="radio">
						    <label class="tab-nav" for="tab-2">Mobile Development</label>
						    <div class="tab-inner">
						      - Mobile Application
						    </div>
					  	</div>

					  	<div class="tab-painel">
						    <input class="tab-open" id="tab-3" name="tab-wrap-1" type="radio">
						    <label class="tab-nav" for="tab-3">Creative Design</label>
						    <div class="tab-inner">
						      - Website &amp; Mobile Design<br>
						      - Branding &amp; Marketing design
						    </div>
					  	</div>					  	

					</div>
				</div>					
			</div>

			<!-- About panel -->
			<div class="maincontent panel" id="about">
				<div class="maincontent--wrap">
					sssssss
				</div>					
			</div>

			<!-- <div style="clear:both;"></div> -->
		</div> <!-- /container maincontent -->

	</div><!-- /container -->
</body>

	<!-- JS -->
	<!-- Latest compiled and minified JavaScript -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="assets/js/min/corejs.min.js"></script>


</html>