<div class="main-page-title"><!-- start main page title -->
			<div class="container">
				<div class="page-title"><?php echo $contentPage['ContentPage']['title']; ?></div>
			</div>
		</div><!-- end main page title -->

		<div id="page-content"><!-- start content -->
			<div class="content-about">
				<div class="container"><!-- container -->
				<div class="spacer-1">&nbsp;</div>
					<div class="row clearfix">
						<div class="col-md-8">
								<!--<h6><?php echo $contentPage['ContentPage']['title']; ?> </h6>-->
								<?php echo $contentPage['ContentPage']['description']; ?>
						</div>

						<div class="col-md-4 page-slider-container">
							<div class="page-slider">
								<div id="page-slider" class="owl-carousel">
									<div>
										<img src="../images/about-step-1.png" class="img-responsive" alt="page-slider" />
									</div>
									
									<div>
										<img src="../images/about-step-2.png" class="img-responsive" alt="page-slider" />
									</div>

									<div>
										<img src="../images/about-step-3.png" class="img-responsive" alt="page-slider" />
									</div>
									
									<div>
										<img src="../images/about-step-4.png" class="img-responsive" alt="page-slider" />
									</div>
									
								</div>
							</div>
						</div> <!-- end col-4 -->
						
					</div>
					<div class="spacer-1">&nbsp;</div>
				</div><!-- container -->

				<div class="job-status">
					<div class="container">
							<h1>TrilordMarket Overview</h1>
							<p class="lead">By bringing together people from different parts of Kathmandu city, Trilord Market allows them to find the service they need in an organized way, through a secure channel.</p>
				
							<div class="counter clearfix">
								<div class="counter-container">
									<div class="counter-value"><?php echo $user_stats[0][0]['TotalProvider']?></div>
									<div class="line"></div>
									<p>Profiles</p>
								</div>
					
								
								<div class="counter-container">
									<div class="counter-value"><?php echo $user_stats[0][0]['TotalCategory']?></div>
									<div class="line"></div>
									<p>Category</p>
								</div>
								
								<div class="counter-container">
									<div class="counter-value"><?php echo $user_stats[0][0]['NewProfile']?></div>
									<div class="line"></div>
									<p>New Profiles</p>
								</div>
								
								<div class="counter-container">
									<div class="counter-value"><?php echo $user_stats[0][0]['Completed']?></div>
									<div class="line"></div>
									<p>Request Served</p>
								</div>
							</div>
						
					</div>
				</div>
				
				<?php echo $this->element('any_queries')?>
				
			</div><!-- end content -->
		</div><!-- end page content -->

