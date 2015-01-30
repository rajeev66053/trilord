<div class="main-page-title"><!-- start main page title -->
	<div class="container">
		<div class="page-title">Response</div>
	</div>
</div><!-- end main page title -->

<div class="content-about">

	<div class="container">
	<div class="spacer-1">&nbsp;</div>
	<?php //debug($serviceRequestRelays);die;
	foreach($serviceRequestRelays as $serviceRequestRelay ):
	$message_send_date=$serviceRequestRelay['ServiceRequestRelay']['created_date'];
	$seeker_provider_request_id=$serviceRequestRelay['ServiceRequestRelay']['seeker_provider_request_id'];
	$requested_provider=$serviceRequestRelay['SeekerProviderRequest']['service_provider_id'];
	$providers=$serviceRequestRelay['ServiceRequestRelay']['service_provider_id'];
	$providers=explode(',',$providers);
	//debug($provider);die;?>
	
	<blockquote class="blockquote">
	<p>Dear <?php echo AuthComponent::user('name'); ?>,<br>
		As you have requested 
		<?php
			echo $this->SmartForm->getProviderInfo($requested_provider,$seeker_provider_request_id);
		?> 
	    for work, due to unavailabilty of him, I have send you a profile of
	    
	    <?php 
		foreach($providers as $provider): 
		 	echo $this->SmartForm->getProviderInfo($provider,$seeker_provider_request_id).'&nbsp;';
		endforeach;
		?>
	    , if you are interested please look their profile.
	    
	     <?php echo'<br/>Message sent date:'.$message_send_date;?>
	</p>
	</blockquote>
	
	<?php endforeach;?>
	<div class="spacer-1">&nbsp;</div>
	
	</div> <!-- end container -->

</div> <!-- end content-about -->