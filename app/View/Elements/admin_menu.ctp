<ul>
	<li><?php echo $this->Html->link('Home', '/admin'); ?></li>
	<?php 
	if(($this->Session->read('Auth.User.id')=='131')){
	?>
    <li><?php   echo $this->Html->link('User','/admin/users/index'); ?>
    </li>
    <?php } ?>
    
    <li><?php echo __('Seeker'); ?>
    	<ul>
        	<li><?php echo $this->Html->link('List service seeker','/admin/users/seeker_index'); ?></li>			
            <li><?php echo $this->Html->link('Service Request','/admin/seeker_provider_requests'); ?></li>
             <li><?php echo $this->Html->link('Service Package Request','/admin/service_package_requests'); ?></li>
             <li><?php echo $this->Html->link('Deposits','/admin/service_seeker_deposits'); ?></li>
             <li><?php echo $this->Html->link('Testimonial','/admin/testimonials',array('id'=>'testimonial_count')); ?></li>
        </ul>
    </li>
    <li><?php echo __('Service Provider'); ?>
    	<ul>
         	<li><?php echo $this->Html->link('List Service Provider','/admin/users/provider_index'); ?></li>
            <li><?php echo $this->Html->link(__('Add Individual Provider'),'/admin/users/provider_add'); ?></li>
        
			<li><?php echo $this->Html->link(__('Add Company as Provider'),'/admin/users/company_add'); ?></li>
        	<li><?php echo $this->Html->link('Complains','/admin/complains'); ?></li>
   			 <li><?php echo $this->Html->link('Reviews','/admin/reviews'); ?></li>
   			 <li><?php echo $this->Html->link('Places','/admin/places'); ?></li>
   			 <li><?php echo $this->Html->link('Provider Requests','/admin/provider_requested_documents'); ?></li>
        </ul>
    </li>
    <li>Categories
		<ul>
			<li><?php echo $this->Html->link('Rate Management','/admin/rate_packages'); ?></li>
            <li><?php echo $this->Html->link('Service Category','/admin/service_categories'); ?></li>
             <li><?php echo $this->Html->link('Service Packages','/admin/service_packages'); ?></li>
             <li><?php echo $this->Html->link('Career','/admin/careers'); ?></li>
              <li><?php echo $this->html->link("Provider FAQ", array('controller'=>'faqs', 'action' => 'index/provider'));?></li>
              <li><?php echo $this->html->link("Customer FAQ", array('controller'=>'faqs', 'action' => 'index/customer'));?></li>
                                
     	</ul>
     </li>
   
    
    <li>Settings
   		<ul>
        	
            <li><?php echo $this->Html->link('Paypal','/admin/paypal_settings/edit/1'); ?></li>
            <li><?php echo $this->Html->link('Esewa','/admin/paypal_settings/esewa/1'); ?></li>
            <!--<li><?php //echo $this->Html->link('MoCo','/admin/paypal_settings/moco/1'); ?></li>-->
            <li><?php echo $this->Html->link('SMS','/admin/paypal_settings/sms/1'); ?></li>
            <li><?php echo $this->Html->link('Country','/admin/countries'); ?></li>
            <li><?php echo $this->Html->link('Change Password', '/admin/users/change_password'); ?></li>
            <li><?php echo $this->Html->link('Logout', '/admin/users/logout'); ?></li>
        </ul>
   </li>
	
    <li><?php echo $this->Html->link('Contents','/admin/content_pages'); ?></li>
   
    
	
</ul>


     <script>
     	$(function(){ 
		//alert('1');
		  function loadajax(){
		  $.ajax({ 
			url:'<?php echo SITE_URL.'admin/testimonials/notification'?>',
			type:"post",
			success:function(data){
				if(data!=0){
				 $('#testimonial_count').append( '&nbsp;'+' <span class="error-message">'+ data + '</span>');
				}
			}
		  });
		  }
           setTimeout(loadajax,1000);
		   
	      $('#testimonial_count').mouseover(function(){
				
				$.ajax({ 
					url:'<?php echo SITE_URL.'admin/testimonials/notification'?>',
					data: ({testimonial: 0}),
					type:"post",
					success:function(data){
						//alert(data);
						$('.error-message').remove();
						$('#testimonial_count').removeClass("error-message");
						 //$('#testimonial_count').removeClass("error-message");
					}
				});
			});
		   
		 
     	});
		
     </script>