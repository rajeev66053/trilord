<?php echo $this->Html->css('rating/rating');?>
<?php echo $this->Session->flash(); ?>
<div class="main-slider"><!-- start main-headline section -->
	<div class="slider-nav">
		<a class="slider-prev"><i class="fa fa-chevron-circle-left"></i></a>
		<a class="slider-next"><i class="fa fa-chevron-circle-right"></i></a>
	</div>
	<div id="home-slider" class="owl-carousel owl-theme">
		<div class="item-slide">
			<img src="images/upload/dummy-slide-1.jpg" class="img-responsive" alt="TrilordMarket-slide" />
		</div>
        <div class="item-slide">
			<img src="images/upload/dummy-slide-5.png" class="img-responsive" alt="TrilordMarket-slide" />
		</div>
	</div>
</div><!-- end main-headline section -->

<!--<div class="headline container">
		<div class="row" >
			<div class="col-md-6 align-right">
				<h4>Easiest way to find skilled workers.</h4>
				<p>We have independent workers, contractors, factory workers, security guards, drivers, domestic helpers, delivery workers and all skilled workers.</p>
			</div>
			<div class="col-md-6 align-left">
				<h4>New to TrilordMarket? Register now!</h4>
				<p>Trilord Market is an online platform that matches people offering services with customers requiring them.</p>
                
			</div>
			<div class="clearfix"></div>
		</div>
</div><!-- end headline section --> 

<?php echo $this->element('search');?>

<div class="recent-job"><!-- Start Recent Job -->
	  <div class="container">
		  <div class="row">
			  <div class="col-md-8">
				  <h4><i class="fa fa-users"></i> Skilled Workers Overview</h4>
				  <div id="tab-container" class='tab-container'><!-- Start Tabs -->
					  <ul class='etabs clearfix'>
						  <li class='tab'><a href="#all">Top Skilled Workers</a></li>
						  <li class='tab'><a href="#new">New Workers</a></li>
					  </ul>
					  <div class='panel-container clearfix'>
						  
						  <div id="all"><!-- Tabs section 1 -->
                         	
                         	<?php 
						 	$i=0;
						    foreach($user as $users): 
                            $i++;
							?>
							
							<div class="provider-list">
								
								<div class="profile-block clearfix">
									<p class="pic">
									<?php if(file_exists(WWW_ROOT.'providers_photo/thumbs/'.$users['U']['profile_photo'])&&!empty($users['U']['profile_photo'])){
												echo $this->Html->link($this->Html->image('/providers_photo/thumbs/'.$users['U']['profile_photo'],array('class'=>'img-responsive img-thumbnail','alt'=>'Profile Photo')),array('controller' => 'users', 'action' => 'provider',$users['U']['id']),array('escape'=>false));
									
									}else{									  
											echo $this->Html->link($this->Html->image('avatar.gif',array('class'=>'img-responsive img-thumbnail','alt'=>'Profile Photo Avatar')),array('controller' => 'users', 'action' => 'provider',$users['U']['id']),array('escape'=>false));				  
									}?>
									</p>
									
									<div class="profile-detail">
									
									<h6><?php echo $this->Html->link($users['U']['name'],array('controller' => 'users', 'action' => 'provider',$users['U']['id']));?></h6>
									<p class="category">
										<span class="small">
											<?php $serviceCategories=str_replace(",",", ",$users[0]['categories']);
											echo $serviceCategories;?>
										</span>
									</p>
									
									<?php $ratingCount = $this->SmartForm->getProviderRating($users['U']['id'])?>
									<!--rating-->
									 <div class="box-result-cnt">
									 
									  <div class="rate-result-cnt">
									      <div class="rate-bg" style="width:<?php echo $ratingCount['rating']; ?>%"></div>
									      <div class="rate-stars"></div>
									  </div>
									  
									 </div> <!-- end rating -->
										
									
									<span class="request-info">
										<?php echo $this->html->link('Request Info', array('controller'=>'SeekerProviderRequests', 'action' => 'add',$users['U']['id']),array('class'=>'btn btn-red','text'=>'Request Information'));?>
									</span>
									
									</div> <!-- end col -->
									
								</div> <!-- end profile-block -->
								
								<div class="user-info">
									
									 <p><?php echo substr($users['U']['about_me'],0,80)."..."?></p>
									 
                                     <?php if($users[0]['PlaceName']){?>
									 <h6><i class="fa fa-map-marker"></i><?php echo $users[0]['PlaceName'];?></h6>
                                     <?php } ?>
									 
									 <?php if($users[0]['rate']){
									  $rate=explode(",",$users[0]['rate']);
									  foreach($rate as $rates):
									 //$rates=explode(" ",$rates);
									 if($rates){
									  ?>
									 <h6 class="rates"><i class="fa fa-money"></i><?php echo $rates ?></h6>
                                     <?php }?>
									 <?php endforeach;
									 }?>
									
								</div> <!-- end user-info -->
								
							</div> <!-- end provider-list -->
							
							<?php endforeach; ?>
							
							  
						  </div><!-- Tabs section 1 -->
						  
						  <div id="new"><!-- Tabs section 2 -->
							  <?php 
						 	$i=0;
						    foreach($new_user as $users): 
                            $i++;
							?>
							
							<div class="provider-list">
								
								<div class="profile-block clearfix">
									<p class="pic">
									<?php if(file_exists(WWW_ROOT.'providers_photo/thumbs/'.$users['U']['profile_photo'])&&!empty($users['U']['profile_photo'])){
												echo $this->Html->link($this->Html->image('/providers_photo/thumbs/'.$users['U']['profile_photo'],array('class'=>'img-responsive img-thumbnail','alt'=>'Profile Photo')),array('controller' => 'users', 'action' => 'provider',$users['U']['id']),array('escape'=>false));
									
									}else{									  
											echo $this->Html->link($this->Html->image('avatar.gif',array('class'=>'img-responsive img-thumbnail','alt'=>'Profile Photo Avatar')),array('controller' => 'users', 'action' => 'provider',$users['U']['id']),array('escape'=>false));				  
									}?>
									</p>
									
									<div class="profile-detail">
									
									<h6><?php echo $this->Html->link($users['U']['name'],array('controller' => 'users', 'action' => 'provider',$users['U']['id']));?></h6>
									<p class="category">
										<span class="small">
											<?php $serviceCategories=str_replace(",",", ",$users[0]['categories']);
											echo $serviceCategories;?>
										</span>
									</p>
									
									<?php $ratingCount = $this->SmartForm->getProviderRating($users['U']['id'])?>
									<!--rating-->
									 <div class="box-result-cnt">
									 
									  <div class="rate-result-cnt">
									      <div class="rate-bg" style="width:<?php echo $ratingCount['rating']; ?>%"></div>
									      <div class="rate-stars"></div>
									  </div>
									  
									 </div> <!-- end rating -->
										
									
									<span class="request-info">
										<?php echo $this->html->link('Request Info', array('controller'=>'SeekerProviderRequests', 'action' => 'add',$users['U']['id']),array('class'=>'btn btn-red','text'=>'Request Information'));?>
									</span>
									
									</div> <!-- end col -->
									
								</div> <!-- end profile-block -->
								
								<div class="user-info">
									
									 <p><?php echo substr($users['U']['about_me'],0,80)."..."?></p>
									 
							         <?php if($users[0]['PlaceName']){?>
									 <h6><i class="fa fa-map-marker"></i><?php echo $users[0]['PlaceName'];?></h6>
							         <?php } ?>
									 
									 <?php 
									  $rate=explode(",",$users[0]['rate']);
									  foreach($rate as $rates):
									 //$rates=explode(" ",$rates);
									 if($rates){
									  ?>
									 <h6 class="rates"><i class="fa fa-money"></i><?php echo $rates ?></h6>
							         <?php }?>
									 <?php endforeach; ?>
									
								</div> <!-- end user-info -->
								
							</div> <!-- end provider-list -->
							  
							<?php endforeach; ?>
							  
						  </div><!-- Tabs section 2 -->
				   
					  </div>
				  </div> <!-- end Tabs -->
                    <?php //echo $this->html->link('Request Info', array('controller'=>'SeekerProviderRequests', 'action' => 'send_request'),array('class'=>'btn btn-red'));?>
				  <div class="spacer-1"></div>
			  </div>
			  
			  <div class="col-md-4">
              <?php  if(isset($service_packages) && count($service_packages)>0){ ?>
				  <div id="job-opening">
					  <div class="job-opening-top">
						  <div class="job-opening-nav">
							  <a class="btn prev"></a>
							  <a class="btn next"></a>
							  <div class="clearfix"></div>
						  </div>
					  </div>
					  <div class="clearfix"></div>
					  <br/>
					  <div id="job-opening-carousel" class="owl-carousel">
					  <?php foreach($service_packages as $service_package):
					  ?>
                      		
                            <div class="item-home">
							  <div class="job-opening">
								  
								  <div class="job-opening-content">
									  <h5><?php echo $service_package['ServicPackage']['title']?></h5>
									  <p>
										  <?php echo substr($service_package['ServicPackage']['description'],0,150).' ...'?>
                                          
									  </p>
								  </div>
								  
								  <div class="job-opening-meta clearfix">
									  <div class="meta-job-location meta-block"><i class="fa fa-clock-o"></i>Validity: <?php echo $this->Time->format('d M, Y',$service_package['ServicPackage']['valid_till'])?></div>
									  <div class="meta-job-type meta-block"><i class="fa fa-check-circle"></i><?php echo $this->Html->link('Request Package',array('controller' => 'service_package_requests', 'action' => 'add',$service_package['ServicPackage']['slug']));?></div>
								  </div>
							  </div>
						  </div>
                            
                            
                      <?php endforeach; ?>
                      		
					  </div>
                      <?php }?>
				  </div>

				  <?php /*?><div class="post-resume-title">Take a look. How it works?</div>
				  <iframe src="//player.vimeo.com/video/35251456?title=0&amp;byline=0&amp;portrait=0" width="370" height="208" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe><?php */?>
			  </div>
			  <div class="clearfix"></div>
		  </div>
	  </div>
  </div><!-- end service-provider list -->

<div class="step-to">
	<div class="container">
		<h1>How TrilordMarket Works?</h1>
		
		<div class="step-spacer"></div>
		<div id="step-image">
			<div class="step-by-container">
				<div class="step-by">
					First Step
					<div class="step-by-inner">
						<div class="step-by-inner-img">
							<img src="images/step-icon-1.png" alt="step" />
						</div>
					</div>
					<p>Visit trilordmarket.com &amp; browse for services you need.</p>
				</div>
						
				<div class="step-by">
					Second Step
					<div class="step-by-inner">
						<div class="step-by-inner-img">
							<img src="images/step-icon-2.png" alt="step" />
						</div>
					</div>
					<p>Select the service &amp; place the work order. Make the payment online or in person.</p>
				</div>
						
				<div class="step-by">
					Third Step
					<div class="step-by-inner">
						<div class="step-by-inner-img">
							<img src="images/step-icon-3.png" alt="step" />
						</div>
					</div>
					<p>Fix a mutually agreed time once the service provider calls.</p>
				</div>
						
				<div class="step-by">
					Final Step
					<div class="step-by-inner">
						<div class="step-by-inner-img">
							<img src="images/step-icon-4.png" alt="step" />
						</div>
					</div>
					<p>Grade &amp; review the completed work based on your experience.</p>
				</div>
						
			</div>
		</div>
		<div class="step-spacer"></div>
	</div>
</div>  <!-- steps -->
  
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
</div> <!-- overview  block -->
 
<?php if(!empty($testimonials)){?>
<div class="testimony">
	<div class="container">
		<h1>What People Say</h1>
		
	</div>
                
                <div id="testimonial-carousel" class="owl-carousel">
				 <?php foreach($testimonials as $testimonial):?>
   
   					<div class="testimony-content container">
					<p>
				
					<?php echo $testimonial['Testimonial']['description'];?>
					</p>
					<p class="testimonial-by">
            		<?php echo "&mdash; ".$testimonial['User']['name'];?>
					</p>
				
			</div>
        <?php endforeach; ?>
				</div>
                <div class="spacer-1">
      </div>
      </div>
      <?php } ?>
      
   </div>
</div>

<script type="text/javascript">
        $(document).ready(function() {
         			
			$('#magnefic-popup5').magnificPopup({
				type: 'inline',
				preloader: false,
				focus: '#username',
				modal: true,
				
			});
			$(document).on('click', '.close', function (e) {
				e.preventDefault();
				$.magnificPopup.close();
			});
			
        });
        </script>
