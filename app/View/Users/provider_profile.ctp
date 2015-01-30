<?php //echo $this->Html->css('rating/rating');?>
<div class="users view">
<?php echo $this->Session->flash(); ?>
<h2><?php echo __('User'); ?></h2>

   <?php /*?> <div class="tuto-cnt">

       <!-- <div class="rate-ex1-cnt">
            <div id="1" class="rate-btn-1 rate-btn"></div>
            <div id="2" class="rate-btn-2 rate-btn"></div>
            <div id="3" class="rate-btn-3 rate-btn"></div>
            <div id="4" class="rate-btn-4 rate-btn"></div>
            <div id="5" class="rate-btn-5 rate-btn"></div>
        </div>

        <hr>-->
        
        <div class="rate-ex2-cnt">
            <div id="1" class="rate-btn-1 rate-btn"></div>
            <div id="2" class="rate-btn-2 rate-btn"></div>
            <div id="3" class="rate-btn-3 rate-btn"></div>
            <div id="4" class="rate-btn-4 rate-btn"></div>
            <div id="5" class="rate-btn-5 rate-btn"></div>
        </div>

        <hr>

        <!--<div class="rate-ex3-cnt">
            <div id="1" class="rate-btn-1 rate-btn"></div>
            <div id="2" class="rate-btn-2 rate-btn"></div>
            <div id="3" class="rate-btn-3 rate-btn"></div>
            <div id="4" class="rate-btn-4 rate-btn"></div>
            <div id="5" class="rate-btn-5 rate-btn"></div>
        </div>-->
        
         <br><br><br><br><br>

        <div class="box-result-cnt">
           
            <hr>
           
            <div class="rate-result-cnt">
                <div class="rate-bg" style="width:<?php echo $ratingCount['rating']; ?>%"></div>
                <div class="rate-stars"></div>
            </div>
            <div>(<span  id="rating_people"><?php echo $ratingCount['people']?></span>)
            <hr>

        </div><!-- /rate-result-cnt -->
        
    </div><!-- /tuto-cnt --><?php */?>

	<dl>
		
		<dt><?php echo __('Image'); ?></dt>
   		 <dd>         
         <?php echo $this->Html->image('/providers_photo/'.$user['User']['profile_photo'],array('width'=>140,'height'=>'100','alt'=>'no picture'));?>
		<td class="actions"> 
        <?php echo $this->Html->link(__('Edit photo'), array('action' => 'provider_pic_edit', $user['User']['id']),array('class'=>'btn btn-default btn-green btn-sm')); ?> 
        <td class="actions">
        </dd>
		
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
        
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phone'); ?></dt>
		<dd>
			<?php echo h($user['User']['phone']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dob'); ?></dt>
		<dd>
			<?php echo h($user['User']['dob']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Permanent Address'); ?></dt>
		<dd>
			<?php echo h($user['User']['permanent_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Temporary Address'); ?></dt>
		<dd>
			<?php echo h($user['User']['temporary_address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Expertise Level'); ?></dt>
		<dd>
			<?php echo h($user['User']['expertise_level']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('About Me'); ?></dt>
		<dd>
			<?php echo h($user['User']['about_me']); ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Rate'); ?></dt>
		<dd>
			<?php 
			$i =0;
			foreach($ratePackages as $rate):
				$i++;
				echo $rate['RP']['title'];
				echo ' : Rs '.$rate['SPR']['rate'].'<br>';
				//echo $this->Form->hidden('rate_id_'.$i, array('value'=>$rate['RP']['id']));
			endforeach;
		//count $ratePackages
		echo $this->Form->hidden('rate_count',array('value'=>count($ratePackages)));
		 ?>
			&nbsp;
		</dd>
        <dt><?php echo __('ServiceCategory'); ?></dt>
		<dd>
			<?php
			$i =0;
			foreach($serviceCategories as $category):
				$i++; 
			echo $category['service_categories']['title'].'<br>';
			endforeach;
		 ?>
			&nbsp;
		</dd>
        <dt><?php echo __('Documents'); ?></dt>
		<dd>
			<?php
			foreach($user['ServiceProviderDocument'] as $document):
            
			echo $document['title'].'</br>';
            echo $this->Html->image('/providers_document/'.$document['document_file'],array('width'=>140,'height'=>'100','alt'=>'No Image')).'&nbsp;'.'</br>';
			
			endforeach;
		 ?>
			&nbsp;
		</dd>
		
	</dl>
    <td class="actions"> 
        <?php echo $this->Html->link(__('Edit Profile'), array('action' => 'provider_edit', $user['User']['id']),array('class'=>'btn btn-default btn-green btn-sm')); ?> 
        <td class="actions">
     <td class="actions"> 
        <?php
		echo $this->Html->link(__('Change password'), array('action' => 'change_password'),array('class'=>'btn btn-default btn-green btn-sm')); ?> 
        <td class="actions">
</div>

 <?php /*?><script>
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
									$('#rating_people').html(data['people']);
									$('.rate-bg').css('width',data['rating']+'%');
								}
					});
					
				});
			});
        //});
</script><?php */?>