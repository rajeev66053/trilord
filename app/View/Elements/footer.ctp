<div id="footer"><!-- Footer -->
			<div class="container"><!-- Container -->
				<div class="row">
					<div class="col-md-3 footer-widget"><!-- Text Widget -->
						<h6 class="widget-title">About TrilordMarket</h6>
						<div class="textwidget">
							<p>TrilordMarket is an online service portal devoted to bridging the needs between service seekers and service providers. It acts as a facilitator by connecting the right service providers with the service seekers through the website. It allows service seekers to find services they need in an organised way by displaying a list of secure and verified service providers thus, saving time and cost. TrilordMarket provides a wide-range of services such as lawyers, auditors, caterers, domestic helpers, plumbers, electricians etc.</p>
						</div>
					</div><!-- Text Widget -->
					
					<div class="col-md-2 footer-widget"><!-- Footer Menu Widget -->
						<h6 class="widget-title">Quick Links</h6>
						<div class="footer-widget-nav">
							<ul>
                                <li><?php echo $this->html->link('Home',array('controller' => 'pages', 'action' => 'display', 'home'));?></li>
								<li><?php echo $this->html->link($menuItems['About']['title'],$menuItems['About']['url']);?></li>
                                <li><?php echo $this->html->link('Search Market', array('controller'=>'pages', 'action' => 'search_marketplace'));?></li>
                                 <li> <?php echo $this->html->link('Request Info', array('controller'=>'SeekerProviderRequests', 'action' => 'send_request'));?></li>
                                 <li><?php //echo $this->html->link('Career', array('controller'=>'careers', 'action' => 'career'));
								 		echo $this->html->link("FAQ", array('controller'=>'pages', 'action' => 'display'));
								 ?></li>
                                  <li><a href="#test-modal" id="magnefic-popup2">Invite Friends</a></li>
                                  <?php if(isset($getPrivacyPolicy[0]['ContentPage']['title'])){?>
                                  <li><?php echo $this->html->link($getPrivacyPolicy[0]['ContentPage']['title'],SITE_URL.'contents/'.$getPrivacyPolicy[0]['ContentPage']['slug']);?></li>
                                  <?php } ?>
                                 </ul>
						</div>
					</div><!-- Footer Menu Widget -->
					
					<div class="col-md-4 footer-widget"><!-- Recent Tweet Widget -->
						<h6 class="widget-title">Payment Options</h6>
						
						<p><img src="<?php echo SITE_URL;?>images/payment.png" width="350" height="143" alt="Payment Options" /></p>
						
					</div><!-- Recent Tweet Widget -->

					<div class="col-md-3 footer-widget"><!-- News Leter Widget -->
						<h6 class="widget-title">Contact Information</h6>
						<div class="textwidget">
							<p>Toll Free No. 1660-01-13579</p>
						</div>
						
						<address>
							<p>Bagbazar, Kathmandu, Nepal</p>
							<p>Phone: 01-4220007</p>
							<p>Email: email@trilordmarket.com</p>
                            <p>Customer Service Hours:</p>
                            <p>8:00am-6:00pm, Sunday-Friday</p>
						</address>
				
					</div><!-- News Leter Widget -->
					<div class="clearfix"></div>
				</div>

				<div class="footer-credits"><!-- Footer credits -->
					<p class="pull-left">&copy; TrilordMarket. All Rights Reserved.</p>
					<p class="pull-right"><a href="<?php echo SITE_URL.'contents/'.$getPrivacyPolicy[0]['ContentPage']['slug']; ?>">Privacy Policy</a> | <a href="#">User Agreement</a></p>
				</div><!-- Footer credits -->
				
			</div><!-- Container -->
		</div><!-- Footer -->
  


<div id="test-modal" class="mfp-hide white-popup-block">
	<h4>Invite friend</h4>
    <div id="showInviteMessage"></div>
	<?php echo $this->Form->create('UserFriend', array('id'=>'invite_friend','novalidate' => true,'role'=>'form')); ?>
		 
				
                <?php echo $this->Form->input('name',array('id'=>'name','class'=>'name','type'=>'text','label'=>'Name','placeholder'=>'Name of your friend','div'=>array('class'=>'form-group')));?>
            
				
                <?php echo $this->Form->input('email',array('id'=>'email','class'=>'email','type'=>'email','label'=>'Email','placeholder'=>'example@domain.com','div'=>array('class'=>'form-group')));?>
		
			
    	<?php  echo $this->Form->button('SEND',array('id'=>'send_invitation','type'=>'submit','class'=>'btn btn-default btn-green'));?>
     <?php echo $this->Form->end(); ?>     
     
</div>



<script type="text/javascript">
 (function($){ 
        $(document).ready(function() {
          	$('.top').waypoint('sticky');
			
			$('#magnefic-popup2').magnificPopup({
				  type: 'inline',
		          preloader: false,
		          focus: '#name',

		          // When elemened is focused, some mobile browsers in some cases zoom in
		          // It looks not nice, so we disable it:
		          callbacks: {
			     	beforeOpen: function() {
						$('#showInviteMessage').html('');
						$("#invite_friend")[0].reset();	
						$('#send_invitation').removeAttr('disabled');	
						if($(window).width() < 700) {
							this.st.focus = false;
						} else {
							this.st.focus = '#name';
						}
					}
                      
				}	
				
			});
			
			
			$("#invite_friend").validate({
			rules: {
				"data[UserFriend][name]": "required",
				"data[UserFriend][email]": {
					required: true,
					email: true
				}
			},
			messages: {
				"data[UserFriend][name]": "*",
				"data[UserFriend][email]": "*"
			},
			submitHandler: function(form) {
				//$("#invite_friend")[0].reset();	
					
				$('#showInviteMessage').html('');	
				$('#send_invitation').attr('disabled','disabled');
				var URL = 	'<?php echo SITE_URL.'pages/invite_friend'?>';
				var postData = $(form).serializeArray();
				$.ajax({
					url: URL,
					type: "POST",
					data: postData,
					success: function(data) {
								 if($.trim(data)!=1){
									$('#showInviteMessage').html('<span style="color:red;">Invitation could not be sent. Plese fill all the fields.</span>');
								}else{
									$(form)[0].reset();
									$('#showInviteMessage').html('<span style="color:#360">Invitation has been sent. Thank you.</span>');
								}
								
									
								$('#send_invitation').removeAttr('disabled');
							}            
					 });
				//$('#invite_friend').submit();
			 }
		});
			
			/*$('#invite_friend').submit(function(e) {
				e.preventDefault();
				$('#showInviteMessage').html('');	
				$('#send_invitation').attr('disabled','disabled');
				var URL = 	'<?php //echo SITE_URL.'pages/invite_friend'?>';
				// get the form data
				var formData = {
					'name' 				: $('#name').val(),
					'email' 			: $('#email').val()
					
				};
				var postData = $(this).serializeArray();
				// process the form
				$.ajax({
					url 		: URL, // the url where we want to POST
					type 		: 'POST', // define the type of HTTP verb we want to use (POST for our form)
					data 		: postData, // our data object
					//dataType 	: 'json', // what type of data do we expect back from the server
					//encode          : true
					success: function(data, textStatus, jqXHR)
						{
			 				if($.trim(data)!=1){
								$('#showInviteMessage').html('<span style="color:red;">Invitation could not be sent. Plese fill all the fields.</span>');
							}else{
								$("#submit-enquiry")[0].reset();
								$('#showInviteMessage').html('<span style="color:#360">Invitation has been sent. Thank you.</span>');
							}
							
								
							$('#send_invitation').removeAttr('disabled');
						}
						
				});
				return false;
				
			});*/
			
			
      });
		
})( jQuery );			
		
        </script>