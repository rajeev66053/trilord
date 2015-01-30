<?php echo $this->Html->css('rating/rating');?>

<div class="main-page-title"><!-- start main page title -->
	<div class="container">
    <?php if($status=='Completed'){?>
		<div class="page-title">Completed Service Request History</div>
        <?php }elseif($status=='New'){?>
		<div class="page-title">New Service Request History</div>
        <?php }else{?>
		<div class="page-title">Assigned Service Request History</div>
        <?php }?>
	</div>
</div><!-- end main page title -->

<div class="content-about">

	<div class="container">
	<div class="spacer-1">&nbsp;</div>

	<h4><?php //debug($status);die;echo __('SeekerProviderRequest History'); ?></h4>
	<table cellpadding="0" cellspacing="0" class="table table-bordered table-striped">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('service_provider_id'); ?></th>
			<th><?php echo $this->Paginator->sort('requested_date'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<?php if($status=='Assigned'){ ?>
						<th><?php echo $this->Paginator->sort('assigned_date'); ?></th>
						<?php } ?>
			<?php if($status=='Completed'){?>
					<th><?php echo $this->Paginator->sort('completed_date');?> </th>
					<?php }?>
			<!--<th><?php //echo $this->Paginator->sort('rate_package_id'); ?></th>
			<th><?php //echo $this->Paginator->sort('rate'); ?></th>
			<th><?php //echo $this->Paginator->sort('Working_days'); ?></th>
			<th><?php //echo $this->Paginator->sort('working_hour'); ?></th>-->
			<?php //if($status!='New'){?>
					<!--<th><?php //echo $this->Paginator->sort('Assigned_by'); ?></th>-->
				<?php //}?>
             <?php if($status!='Completed'){?>
				<th><?php	echo $this->Paginator->sort('Action'); ?></th>
				<?php }else{?>
            <th><?php	echo $this->Paginator->sort('Action'); ?></th>
            <th><?php	echo $this->Paginator->sort('Rating'); ?></th>
            <?php }?>
	</tr>
	</thead>
	<tbody>
	<?php // debug($service_history);
	foreach ($service_history as $history): ?>
	<tr>
		<td> <?php echo $this->SmartForm->getUserInfo($history['SeekerProviderRequest']['service_provider_id']);?>&nbsp;</td>
		<td><?php echo h($history['SeekerProviderRequest']['requested_date']); ?>&nbsp;</td>
		<td><?php echo substr($history['SeekerProviderRequest']['description'],'0','50').'...'; ?>&nbsp;</td>
		<?php //debug($status);
		if($status=='Assigned'){ ?>
				<td><?php	echo h($history['SeekerProviderRequest']['assigned_date']); ?>&nbsp;</td>
					<?php }?>
		<?php if($status=='Completed'){?>
				<td><?php	echo h($history['SeekerProviderRequest']['completed_date']); ?>&nbsp;</td>
				<?php }?>
		<!--<td>
            <?php //echo $history['RatePackage']['title']; ?>&nbsp;
		</td>
		<td><?php //echo h($history['SeekerProviderRequest']['rate']); ?>&nbsp;</td>
		<td><?php //echo h($history['SeekerProviderRequest']['working_days']); ?>&nbsp;</td>
		<td><?php //echo h($history['SeekerProviderRequest']['working_hour']); ?>&nbsp;</td>
		
		<?php //if(!empty($history['SeekerProviderRequest']['Assigned_by'])){ ?>
			<td><?php //echo $this->SmartForm->getUserInfo($history['SeekerProviderRequest']['Assigned_by']);?>&nbsp;</td>-->
			<?php //}?>
            <?php if($status=='New'){ ?>
				<td colspan="2"><?php	echo $this->Form->postLink(__('Cancel'), array('controller'=>'SeekerProviderRequests', 'action' => 'cancel_request',$history['SeekerProviderRequest']['id']),array('class'=>'btn-view-job btn-red'));?>&nbsp;</td>
			<?php }?>
		<?php if($status!='New'){ ?>
				<td ><?php	echo $this->html->link('Complain', array('controller'=>'Complains', 'action' => 'add',$history['SeekerProviderRequest']['service_provider_id'],$history['SeekerProviderRequest']['id']),array('class'=>'btn-view-job btn-blue')); }?>&nbsp;
        <?php if($status=='Completed'){?>
         <?php
			 		$reviewCount = $this->SmartForm->getReviewCount($history['SeekerProviderRequest']['id']);
					echo $reviewCount==0?$this->html->link('Review', array('controller'=>'Reviews', 'action' => 'add',$history['SeekerProviderRequest']['service_provider_id'],$history['SeekerProviderRequest']['id']),array('class'=>'btn-view-job btn-green')):'';?></td> 
         <td>
			         <?php $ratingCount=$this->SmartForm->getIndividualProviderRating($history['SeekerProviderRequest']['service_provider_id'],$history['SeekerProviderRequest']['service_seeker_id'],$history['SeekerProviderRequest']['id']);?>
			         <div class="insert_after_<?php echo $history['SeekerProviderRequest']['id'];?>"></div>
			          <?php if($ratingCount['rating']==0){?>
			          <div class="rated_div_<?php echo $history['SeekerProviderRequest']['id'];?>">
			                 <div class="rate-ex3-cnt" id="<?php echo $history['SeekerProviderRequest']['id'];?>" provider_id="<?php echo $history['SeekerProviderRequest']['service_provider_id']?>">
			                     <div onclick="insertRate(1,'<?php echo $history['SeekerProviderRequest']['service_provider_id']?>','<?php echo $history['SeekerProviderRequest']['id'];?>')" id="1" class="rate-btn-1 rate-btn"></div>
			                     <div onclick="insertRate(2,'<?php echo $history['SeekerProviderRequest']['service_provider_id']?>','<?php echo $history['SeekerProviderRequest']['id'];?>')" id="2" class="rate-btn-2 rate-btn"></div>
			                     <div onclick="insertRate(3,'<?php echo $history['SeekerProviderRequest']['service_provider_id']?>','<?php echo $history['SeekerProviderRequest']['id'];?>')" id="3" class="rate-btn-3 rate-btn"></div>
			                     <div onclick="insertRate(4,'<?php echo $history['SeekerProviderRequest']['service_provider_id']?>','<?php echo $history['SeekerProviderRequest']['id'];?>')" id="4" class="rate-btn-4 rate-btn"></div>
			                     <div onclick="insertRate(5,'<?php echo $history['SeekerProviderRequest']['service_provider_id']?>','<?php echo $history['SeekerProviderRequest']['id'];?>')" id="5" class="rate-btn-5 rate-btn"></div>
			                 </div>
			            </div> 
			            <?php }else{?> 
			          <div class="box-result-cnt" id="<?php echo $history['SeekerProviderRequest']['id'];?>">
			         	<hr>
			        
			             <div class="rate-result-cnt">
			                 <div class="rate-bg" style="width:<?php echo $ratingCount['rating']; ?>%"></div>
			                 <div class="rate-stars"></div>
			             </div>
			             
			         	<div>(<span id="rating_point"><?php echo $ratingCount['rating_point'];?></span> from <span  id="rating_people"><?php // echo $ratingCount['people']?></span> you)
			         	</div>
			         	<hr>
			 
			     	</div><!-- /rate-result-cnt -->
			         <?php }?>
			         </td>         
         <?php }?>
         
        
	</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	 <div class="row clearfix">
            			
    			<div class="col-md-6">
    				<p class="pagination-info">
    				<?php
    				echo $this->Paginator->counter(array(
    				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
    				));
    				?>	</p>
    			</div>
    			
				<div class="col-md-6"><!-- Pagination -->
						<ul class="job-pagination pull-right">
						<?php
						//echo $this->Paginator->prev(' << ' . __('previous'),array('tag' => 'li'),null,array('class' => 'prev disabled'));
						//echo $this->Paginator->numbers(array('first' => 'First page'));
						//echo $this->Paginator->next('Next >>',null,null,array('class' => 'disabled'));
						?>
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
			</div>
            
            <div class="spacer-1">&nbsp;</div>    
	</div> <!-- end container -->
	
</div> <!-- end content-about -->

<script>
        // rating script
        //(function($){
			$(document).ready(function () {
				$('.rate-ex2-cnt').mouseover(function() {
					var divId=this.id;
					var pId=$(this).attr('provider_id');
								
						$('#'+divId).find('.rate-btn').hover(function(){
							
							
							$('#'+divId).find('.rate-btn').removeClass('rate-btn-hover');
							//alert($(this).attr('id'));die;
							var therate = $(this).attr('id');
							//alert(therate);
							for (var i = therate; i >= 0; i--) {
								$('#'+divId).find('.rate-btn-'+i).addClass('rate-btn-hover');
							};
						});
				
								
				
				});
			});
        //});
		
		function insertRate(rate,providerId,serviceId){
			  var therate = rate;
			  
			  var dataRate = 'act=rate&provider_id='+providerId+'&request_id='+serviceId+'&rate='+therate; //
			  $('#'+serviceId).find('.rate-btn').removeClass('rate-btn-active');
			  for (var i = therate; i >= 0; i--) {
				  
				  $('#'+serviceId).find('.rate-btn-'+i).addClass('rate-btn-active');
			  }
			  
			  $.ajax({
				  type : "POST",
				  url : '<?php echo SITE_URL.'users/provider_rating'?>',
				  data: dataRate,
				  success:function(e){
							  $('.rated_div_'+serviceId).remove();
							  $('<div class="box-result-cnt"><hr><div class="rate-result-cnt"><div style="width:'+e+'%" class="rate-bg"></div><div class="rate-stars"></div></div><div>(<span id="rating_point">'+rate+'</span> from <span id="rating_people"></span> you)</div><hr></div>').insertAfter('.insert_after_'+serviceId);
						  }
			  });
		}
</script>