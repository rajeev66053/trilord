<?php echo $this->Html->css('rating/rating');?>
        <?php echo $this->element('search');?>
		
		<div class="recent-job"><!-- Start Job -->
			<div class="container">
				
				<div class="row">
				
					<div class="col-md-9">
						
						<h4><i class="fa fa-users"></i> Market Search Results</h4>
						<div  class='tab-container'><!-- Start Tabs -->
		               <!-- <div id="tab-container" class='tab-container'>-->
							<ul class='etabs clearfix'>
								<!--<li class='tab'><a href="#all">Workers</a></li>
								<li class='tab'><a href="#toprated">Top Rated Workers</a></li>-->
							</ul>
		
							<div class='panel-container'>
								
								<div id="all"><!-- Tabs section 1 -->
									 
									 <?php 
									 if($user){
									 	$i=0;
									    foreach($user as $users): 
			                            $i++;
									 ?>
									
									<div class="provider-list">
										
										<div class="profile-block clearfix">
											
											<p class="pic">
												
												<?php if(file_exists(WWW_ROOT.'providers_photo/thumbs/'.$users['U']['profile_photo'])&&!empty($users['U']['profile_photo'])){
															echo $this->Html->link($this->Html->image('/providers_photo/thumbs/'.$users['U']['profile_photo'],array('class'=>'img-responsive img-thumbnail','alt'=>'dummy-joblist')),array('controller' => 'users', 'action' => 'provider',$users['U']['id']),array('escape'=>false));
												
												}else{									  
														echo $this->Html->link($this->Html->image('avatar.gif',array('class'=>'img-responsive img-thumbnail','alt'=>'dummy-joblist')),array('controller' => 'users', 'action' => 'provider',$users['U']['id']),array('escape'=>false));				  
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
									                <div class="rate-bg" style="width:<?php  echo $ratingCount['rating']; ?>%"></div>
									                <div class="rate-stars"></div>
									            </div>
									
									        	</div> <!-- rating end -->
									        	
									        	<span class="request-info">
									        		<?php echo $this->html->link('Request Info', array('controller'=>'SeekerProviderRequests', 'action' => 'add',$users['U']['id']),array('class'=>'btn btn-red'));?>
									        	</span>
												
											</div> <!-- end profile-detail -->
										
										</div> <!-- end profile-block -->
										
										<div class="user-info">
											
											<p><?php echo substr($users['U']['about_me'],0,130)."...";?></p>
                                            <?php if($users[0]['PlaceName']){?>
									 				<h6><i class="fa fa-map-marker"></i><?php echo $users[0]['PlaceName'];?></h6>
                                     		<?php } ?>
											
											
											<?php if($users[0]['rate']){
											$rate=explode(",",$users[0]['rate']);
												foreach($rate as $rates):
												 if($rates){
												?>
													  <h6 class="rates"><i class="fa fa-money"></i><?php echo $rates ?></h6>
                                                <?php }?>
												<?php endforeach; 
												}?>
										
										</div> <!-- end user-info -->
									
									</div> <!-- end provider-list -->
									

									  <?php endforeach; 
								 }else{
									 echo 'At this time, we do not have anything available in the category you just selected. We apologize for any inconvenience. Please check out other categories or contact us at Toll Free: 1660-01-13579, or email us at info@trilordmarket.com if you need any assistance.';
								 }?>
								</div><!-- Tabs section 1 -->
								<div id="toprated"><!-- Tabs section 2 -->
								</div><!-- Tabs section 2 -->
							</div>
							
							<div class="row clearfix">
                           <?php  if($user){ ?>
								<div class="col-md-12"><!-- Pagination -->
										<ul class="job-pagination pull-right">
										
											<li >
											<?php
												echo $this->Paginator->prev('Prev',array('class' => 'pag-prev'), null, array('class' => 'pag-prev disabled'));
											?>
											</li>
											<li>
											<?php
												echo $this->Paginator->numbers(array('separator' => '','currentClass' => 'pag-num active','class' =>'pag-num'));
											?>
											</li>
											<li>
											<?php 
												echo $this->Paginator->next('Next',array('class' => 'pag-next'), null, array('class' => 'pag-next disabled'));
											?>
											</li>
										</ul>
								</div><!-- Pagination -->
                                <?php } ?>
							</div>
							
						</div><!-- end Tabs -->
						
					</div> <!-- end col-md-8 -->
					
					<div class="col-md-3">
						
						<h5><i class="fa fa-folder-open"></i> Skilled Workers Index</h5>
						<ul class="list-group service-provider-overview">
                        <?php foreach($getSearchjob as $joblist): 
						
						if($this->SmartForm->getServiceInfo($joblist['id'])>0){?>
                            <li class="list-group-item"><?php echo $joblist['name'].'<span class="badge">'.$this->SmartForm->getServiceInfo($joblist['id']).'</span>'; ?></li>
                        <?php } endforeach; ?>
                        </ul>
					</div> <!-- end col-md-4 -->
				
				</div> <!-- end row -->
				
			</div>
		</div><!-- end Job -->
		<?php
						
			if(isset($service_packages) && count($service_packages)>0)
			{
				?>
		<div class="job-status">
			<div class="container">
				
				<div id="job-opening">
					<div class="job-opening-top"><!-- job opening carousel nav -->
						<div class="job-oppening-title">SPECIAL PACKAGE</div>
						<div class="job-opening-nav">
							<a class="btn prev"></a>
							<a class="btn next"></a>
							<div class="clearfix"></div>
						</div>
					</div><!-- job opening carousel nav -->
					<div class="clearfix"></div>
					
					<br/>
					
					<div id="job-listing-carousel" class="owl-carousel"><!-- job opening carousel item -->
						
						
						<?php
						
						//if(isset($service_packages) && count($service_packages)>0)
						//{
							  foreach($service_packages as $service_package):
						?>
								
						      <div class="item-listing">
								  <div class="job-opening">
									  
									  <div class="job-opening-content">
										  <h5><?php  //debug($service_package);die;
										  echo $service_package['ServicPackage']['title']?></h5>
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
						      
						      
						<?php endforeach; //}?>
								
					</div><!-- job opening carousel item -->
					
				</div> <!-- end job-opening -->
				
			</div> <!-- end container -->
		</div> <!-- end job-status -->
        <?php }?>

		<div id="page-content"><!-- start content -->
			<div class="content-about">

				<?php echo $this->element('any_queries')?>
				
			</div><!-- end content -->
		</div><!-- end page content -->