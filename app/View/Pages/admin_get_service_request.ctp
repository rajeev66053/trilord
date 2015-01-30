
<?php 
$i = 0;

if(count($getServiceRequest)>0){
foreach($getServiceRequest as $request):
$i++;
?>
	<div>
    	SNo. <?php echo $i;?>
    	Requested By : <?php echo $this->SmartForm->getUserInfo($request['seeker_provider_requests']['service_seeker_id'])?><br />
         <?php if($request['seeker_provider_requests']['service_provider_id']){?>
       	Requested For : <?php echo $this->SmartForm->getUserInfo($request['seeker_provider_requests']['service_provider_id'])?>
        <?php } ?>
        Requested Date : <?php echo $request['seeker_provider_requests']['requested_date']?>
    </div>    

<?php

endforeach;
echo $this->Html->link('View All','/admin/seeker_provider_requests'); 
}else{
	echo 'No new Service Requests.';	
}
?>
