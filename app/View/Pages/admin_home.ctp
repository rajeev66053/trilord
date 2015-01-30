<div id="content" class="full-width">
	<div class="dashboard-block">
		<h1>User Statstics</h1>
		<ul>
			<li>Total Service Providers: <?php echo $user_stats[0][0]['TotalProvider']?></li>
			<li>New Service Providers: <?php echo $user_stats[0][0]['NewProfile']?> for last 30 days</li>
			<li>Total Service Categories: <?php echo $user_stats[0][0]['TotalCategory']?></li>
			<li>Total Service Seekers: <?php echo $user_stats[0][0]['TotalSeeker']?></li>
		</ul>
	</div>
	
	<div class="dashboard-block last">
		<h1>Service Requests</h1>
		<ul>
			<li>New Service Requests: <?php echo $user_stats[0][0]['NewRequest']?></li>
			<li>Ongoing Service Process: <?php echo $user_stats[0][0]['Assigned']?></li>
			<li>Total Completed Services: <?php echo $user_stats[0][0]['Completed']?></li>
		</ul>
	</div>
	
	<div class="dashboard-block">
		<h1>Cash Deposits</h1>
		<ul>
			<li>Unverified Bank Deposit: <?php echo $user_stats[0][0]['Unverified']?></li>
			<li>New Bank Deposits: <?php echo $user_stats[0][0]['NewBankDeposit']?> for last 3 days</li>
			<li>New Paypal Deposits: <?php echo $user_stats[0][0]['PaypalDeposit']?>  for last 3 days</li>
			<li>New Esewa Deposits: <?php echo $user_stats[0][0]['EsewaDeposit']?>  for last 3 days</li>
			<li>Total Verified Bank Deposits: <?php echo $user_stats[0][0]['TotalBankDeposit']?></li>
			<li>Total Verified Paypal Deposits: <?php echo $user_stats[0][0]['TotalPaypalDeposit']?></li>
			<li>Total Verified Esewa Deposits: <?php echo $user_stats[0][0]['TotalEsewaDeposit']?></li>
		</ul>
	</div>
	
	<div class="dashboard-block last">
		<h1>New Service Request of the Day</h1>
		<div id="load-service-request">
		<?php echo $this->requestAction('pages/get_service_request');?>
		</div>
	</div>
    
    <div class="dashboard-block last">
		<h1>Reviews</h1>
		<ul>
            <li>Total Reviews: <?php echo $new_review[0][0]['TotalReview']?></li>
            <li>Verified Reviews: <?php echo $new_review[0][0]['Verified']?></li>
            <li>Reviews to be verify: <?php echo $new_review[0][0]['New']?></li>
			<li>Reviews blocked by admin: <?php echo $new_review[0][0]['Blocked']?></li>
			
		</ul>
	</div>
</div>
<script>

$(document).ready(function () {
	setInterval('getServiceRequest()', 60000);
	
});

function getServiceRequest(){
	var loaderImage = '<?php echo SITE_URL."img/loading.gif"?>';
	$('#load-service-request').html('');
	$('#load-service-request').prepend('<span id="product_loaders"><img src="'+loaderImage+'" ></span>');
	var siteUrl = '<?php echo SITE_URL."pages/get_service_request/"?>';
	$.post(siteUrl,
			  
			  function(data,status){
				
				$('#load-service-request').html(data);
				$('#product_loaders').hide();
			  });
}
</script>