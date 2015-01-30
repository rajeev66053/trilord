
<?php 
echo $this->Html->css('rating/rating');?>

<div class="main-page-title"><!-- start main page title -->
	<div class="container">
		<h3 class="job-detail-title"><?php echo h($user['User']['name']); ?>'s Profile</h3>
		<div class="recent-job-detail">
			<div class="col-md-4 job-detail-desc">
				
				<?php if(file_exists(WWW_ROOT.'providers_photo/thumbs/'.$user['User']['profile_photo'])&&!empty($user['User']['profile_photo'])){        
				 			echo $this->Html->image('/providers_photo/thumbs/'.$user['User']['profile_photo'],array('class'=>'img-responsive job-detail-logo img-rounded','alt'=>'Profile Image'));
						}else{
							echo $this->Html->image('avatar.gif',array('class'=>'img-responsive job-detail-logo img-rounded','alt'=>'No Image')) ;
						}
				?>
				
				<h5>
				<?php
					/*$i =0;
					foreach($serviceCategories as $category):
					debug($category);*/
				$serviceCategories=str_replace(",",", ",$serviceCategories[0][0]['title']);
				echo $serviceCategories;
					//endforeach;
				?>
				</h5>
				<p><?php echo h($user['User']['expertise_level']); ?></p>
				
				<div class="box-result-cnt inline-block">
				           
		            <div class="rate-result-cnt">
		                <div class="rate-bg" style="width:<?php echo $ratingCount['rating']; ?>%"></div>
		                <div class="rate-stars-green-alt"></div>
		            </div>
				
		        </div><!-- /rate-result-cnt -->
                
                <?php if(!empty($user['User']['additional_experience'])){
							echo '<p style="display:block; clear:both;"><b>Additional Experiences: </b><br>' . $user['User']['additional_experience'].'</p>';
					}
				?>
				
			</div>
			<div class="col-md-3 job-detail-name">
				<h6><i class="fa fa-trophy"></i><?php //debug($user);die;
					if(!empty($user['User']['year_of_experience'])){
						$experience[]= $user['User']['year_of_experience']." Year";
					}
					if(!empty($user['User']['month_of_experience'])){
						$experience[]= $user['User']['month_of_experience']." month";
					}
					if(!empty($experience)){
					$experience=implode(' & ',$experience);
					echo $experience.' of Experience';
					}?></h6>
			</div>
			<div class="col-md-2 job-detail-location">
				<h6><i class="fa fa-map-marker"></i><?php if(!empty($user_place[0][0]['PlaceName'])){
					echo h($user_place[0][0]['PlaceName']);
				}?></h6>
			</div>
                       
            
			<div class="col-md-3">
				<div class="row">
					<div class="col-md-7 job-detail-type">
						<?php
						foreach($ratePackages as $rate):
						?>
						
							  <h6><i class="fa fa-money"></i><?php echo $rate['SPR']['rate']."/".$rate['RP']['title']; ?></h6>
						
						<?php endforeach; ?>
					</div>
					<div class="col-md-5 job-detail-button">
						<?php //debug($previousId);
						echo $this->html->link('Request Info', array('controller'=>'SeekerProviderRequests', 'action' => 'add',$user['User']['id'],$previousId),array('class'=>'btn btn-red'));?>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>

		<div class="row  job-detail">
			<div class="col-md-9">
				<h6>ABOUT ME</h6>
				<p><?php echo ($user['User']['about_me']); ?></p>
                <p><?php if($user['User']['registered_as']=='company'){
							if(!empty($user['User']['contact_person'])){
								echo '<b>Contact Person:</b> '.$user['User']['contact_person'];
							}
						}?>
                 </p>
			</div>
			<!--<div class="col-md-3">
				<h6>DOCUMENTS</h6>
				<?php
					/*echo "<ul id='documents-list'>";
					foreach($user['ServiceProviderDocument'] as $document):
					echo "<li>";
					echo '<span>'.$document['title'].'</span>';
				   	echo '<span>'. $this->Html->image('/providers_document/'.$document['document_file'],array('width'=>140,'height'=>'100','alt'=>'Documents','class'=>'img-rounded')).'</span>';
				   	echo "</li>";
					endforeach;
					echo "</ul>";*/
				?>
			</div>-->
            <div class="col-md-3">
				<h6>REVIEWS</h6>
				<blockquote class="blockquote">
				<?php 
                      if(isset($review_record) && count($review_record)>0){
					?>  
                <div id="job-opening-carousel" class="owl-carousel">
						<?php  foreach($review_record as $review_records): ?>
                      <div class="item-home blockquote-content">
                            <p>
                            <?php echo substr($review_records['Review']['description'],0,120).' ...'?>
                            </p>                            
             				<footer><?php $time=$this->Time->format('F jS, Y',$review_records['Review']['review_date']);
							 echo $this->SmartForm->getUserInfo($review_records['Review']['service_seeker_id']).'</br> '. $time?></footer>
									
                       </div>
                     <?php endforeach; }else{?>
                      		<div class="item-home blockquote-content">
							  <p>No review available.</p>
						  </div>
                      <?php } ?>
				  </div>
				</blockquote>
			</div> <!-- end col-md-3 -->
		</div> <!-- end row -->
		
		<div class="row service-history">
			
			<div class="container">
				
				<div class="row">
				
					<div class="col-md-12">
						
						 <?php //debug($history_3);die;
						
						 if(!empty($history_3)){?>
						    <h4><?php echo __('Service Success History'); ?></h4>
						    <table cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
						    <thead>
						    <tr>
						            <th><?php echo __('Enquired By'); ?></th>
						            <th><?php echo __('Assigned Date'); ?></th>
						            <th><?php echo __('Completed Date'); ?></th>
						            <th><?php echo __('Package');?></th>
						            <th><?php echo __('Working Days'); ?></th>
						            <th><?php echo __('Working Hours'); ?></th>
						    </tr>
						    </thead>
						    <tbody>
						    <?php  $i=1; 
						    foreach ($history_3 as $Service_history): ?>
						    <tr>
						        <td>
						        <?php //debug($history);die;
						        echo $this->SmartForm->getUserInfo($Service_history['SeekerProviderRequest']['service_seeker_id']);
						        ?></td>        
						        <td><?php echo h($Service_history['SeekerProviderRequest']['assigned_date']); ?></td>
						        <td><?php echo h($Service_history['SeekerProviderRequest']['completed_date']); ?></td>
						        <td><?php echo h($Service_history['RatePackage']['title']); ?></td>
						        <td><?php echo h($Service_history['SeekerProviderRequest']['working_days']); ?></td>
						        <td><?php echo h($Service_history['SeekerProviderRequest']['working_hour']); ?></td>
						    </tr>
		                     <?php if ($i++ == 6) break;?>
						<?php endforeach; ?>
							</tbody>
						    </table>
						    
						        <?php if($i>6){
						        echo $this->Html->link(__('View More'), array('controller'=>'SeekerProviderRequests','action' => 'provider_service_history',$Service_history['SeekerProviderRequest']['service_provider_id'],'Completed'),array('class'=>'btn btn-default btn-green btn-sm'));
								}?> 
						<?php }?>
						
					</div> <!-- end col-md-12 -->
				
				</div> <!-- end row -->
			
            </div> <!-- end container -->    
			
		</div> <!-- end service-history row -->
		
		<div class="spacer-1">&nbsp;</div>
	</div>
</div> <!-- End main page title -->

 <?php  if($provider_records){	?>		
<div class="container">				
	<div class="spacer-1">&nbsp;</div>
	<h4><i class="fa fa-users"></i> RELATED SERVICE PROVIDERS</h4>
	
	<!--<div id="tab-container" class='tab-container'>--><!-- Start Tabs -->
		<ul class='etabs clearfix'>
			<!--<li class='tab'><a href="#all">All</a></li>
			<li class='tab'><a href="#contract">Contract</a></li>
			<li class='tab'><a href="#full">Full Time</a></li>
			<li class='tab'><a href="#free">Freelence</a></li>-->
		</ul>
		<div class='panel-container'>
			
            
            <div class='panel-container'>
								
								<div id="all"><!-- Tabs section 1 -->
									 
									 <?php //debug($provider_records);die; 
									  //if($provider_records){
									 	$i=0;
										foreach($provider_records as $provider_record): 
                            			 $i++;
									 ?>
									
									<div class="provider-list">
										
										<div class="profile-block clearfix">
											
											<p class="pic">
												
												<?php if(file_exists(WWW_ROOT.'providers_photo/medium/'.$provider_record['User']['profile_photo'])&&!empty($provider_record['User']['profile_photo'])){
						echo $this->Html->link($this->Html->image('/providers_photo/thumbs/'.$provider_record['User']['profile_photo'],array('class'=>'img-responsive img-rounded','alt'=>'company-logo')),array('controller' => 'users', 'action' => 'provider',$provider_record['User']['id']),array('escape'=>false));
					}else{									  
							echo $this->Html->link($this->Html->image('avatar.gif',array('class'=>'img-responsive img-rounded','alt'=>'company-logo')),array('controller' => 'users', 'action' => 'provider',$provider_record['User']['id']),array('escape'=>false));				  
								  }?>
												
											</p>
											
											<div class="profile-detail">
												
												<h4><?php echo $this->Html->link($provider_record['User']['name'],array('controller' => 'users', 'action' => 'provider',$provider_record['User']['id']));?></h4>
												
												<p class="category">
												<span class="small">
												<?php $serviceCategories=str_replace(",",", ",$provider_record[0]['categories']);
												echo $serviceCategories;?>
												</span>
												</p>
												
												<?php $ratingCount =$this->SmartForm->getProviderRating($provider_record['User']['id']);?>
												          
									          	<!--rating-->
									           	<div class="box-result-cnt">
									           
									            <div class="rate-result-cnt">
									                <div class="rate-bg" style="width:<?php  echo $ratingCount['rating']; ?>%"></div>
									                <div class="rate-stars"></div>
									            </div>
									
									        	</div> <!-- rating end -->
									        	
									        	<span class="request-info">
									        		<?php echo $this->html->link('Request Info', array('controller'=>'SeekerProviderRequests', 'action' => 'add',$provider_record['User']['id']),array('class'=>'btn btn-red'));?>
									        	</span>
												
											</div> <!-- end profile-detail -->
										
										</div> <!-- end profile-block -->
										
										<div class="user-info">
											
											<p><?php echo substr($provider_record['User']['about_me'],0,130)."...";?></p>
                                            <?php 
											if($provider_record[0]['PlaceName']){?>
												<h6><i class="fa fa-map-marker"></i><?php echo $provider_record[0]['PlaceName'];?></h6>
											<?php }?>
											
										
											<?php if($provider_record[0]['rate']){
											$rate=explode(",",$provider_record[0]['rate']);
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
								 ?>
								</div><!-- Tabs section 1 -->
					
			
            
            
		</div>
		
	</div><!-- end Tabs -->
</div> <!-- end container -->
<?php } ?>

<div id="page-content"><!-- start content -->
	<div class="content-about">

		<?php echo $this->element('any_queries')?>
		
	</div><!-- end content -->
</div><!-- end page content -->

<script>
        // rating script
        //(function($){
			$(document).ready(function () {
				$('.rate-btn').hover(function(){
					$('.rate-btn').removeClass('rate-btn-hover');
					var therate = $(this).attr('id');
					for (var i = therate; i >= 0; i--) {
						$('.rate-btn-'+i).addClass('rate-btn-hover');
					};
				});
								
				$('.rate-btn').click(function(){    
					
					var therate = $(this).attr('id');
					var dataRate = 'act=rate&provider_id=<?php echo $provider_id; ?>&rate='+therate; //
					$('.rate-btn').removeClass('rate-btn-active');
					for (var i = therate; i >= 0; i--) {
						$('.rate-btn-'+i).addClass('rate-btn-active');
					};
					$.ajax({
						type : "POST",
						url : '<?php echo SITE_URL.'users/provider_rating'?>',
						data: dataRate,
						success:function(e){
									var data = JSON.parse(e);
									//alert(data['rating']);
									$('#rating_point').html(data['rating_point']);
									$('#rating_people').html(data['people']);
									
									$('.rate-bg').css('width',data['rating']+'%');
								}
					});
					
				});
			});
        //});
</script>