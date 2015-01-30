<div class="main-page-title"><!-- start main page title -->
			<div class="container">
                        <?php echo $this->Session->flash(); ?>
				<div class="row">
					
					
					<div class="col-md-5">
						
						<h4 class="login-title">Log In</h4>
						
						<div class="form-singin-container">
                        
						<?php echo $this->Form->create('User', array('novalidate' => true,'type'=>'file','role'=>'form')); ?>
								<div class="form-group">
                                 <?php echo $this->Form->input('email',array('id'=>'email','type'=>'text','class'=>'form-control input-form','label'=>false,'placeholder'=>'Email registered with TrilordMarket'));?>
								</div>
								<div class="form-group">
                                <?php echo $this->Form->input('password',array('id'=>'password','class'=>'form-control input-form','label'=>false,'placeholder'=>'Password'));?>
                                    <br>
                                    <?php  echo $this->Form->button('LOGIN',array('type'=>'submit','class'=>'btn btn-default btn-blue'));?>
								
									<a href="#forgot_password" id="magnefic-popup6" class="">Forgot Password?</a></div>
							<?php echo $this->Form->end(); ?>
						</div>
					</div>

					<div class="col-md-7 singin-page">
						<h5>Not A Member? Register Now!</h5>
						<div class="row">
							<div class="col-md-6">
								<ul class="style-list-2">
									<li>One single venue for all services from the comfort of your home or office.</li>
									<li>Trusted reviews and ratings from service users.</li>
									<li>Collaboration with law enforcement to ensure safety.</li>
									<li>Transparent, Accountable, and Trustworthy Services found nowhere else in Nepal.</li>
								</ul>
							</div>

							<div class="col-md-6">
								<ul class="style-list-2">
									<li>A wide array of listings and rates of service providers</li>
									<li>Exclusive discounts and deals</li>
									<li>Value for money</li>
									<li>Opportunity to review and rate</li>
									<li>Verified, Secure, Reliable, Hassle free service</li> 
								</ul>
							</div>
						</div>
						<p>
					</div>
				</div>
			</div>
		</div><!-- end main page title -->
        
         <div id="forgot_password" class="mfp-hide white-popup-block">
  <button type="button"  class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	<h4>Enter your email address</h4>
    <div id="showForgetMessage"></div>
    
	<?php echo $this->Form->create('UserForgot', array('id'=>'send_forgot_password','novalidate' => true,'role'=>'form')); ?>
		 
			<div>
                <?php echo $this->Form->input('email',array('id'=>'email','type'=>'email','label'=>'Email','placeholder'=>'example@domain.com'));?>
			</div>
			
		<?php  echo $this->Form->button('SEND',array('id'=>'send_forget','type'=>'submit','class'=>'btn btn-default btn-green'));?>
     <?php echo $this->Form->end(); ?>      
</div>
        
 <script type="text/javascript">
  (function($){  
        $(document).ready(function() {
			
			$('#magnefic-popup4').magnificPopup({
				type: 'inline',
				preloader: false,
				focus: '#username',
				modal: true,
				
			});
			$(document).on('click', '.close', function (e) {
				e.preventDefault();
				$.magnificPopup.close();
			});
			
			$('#magnefic-popup6').magnificPopup({
				type: 'inline',
				preloader: false,
				focus: '#username',
				modal: true,
				callbacks: {
			     	beforeOpen: function() {
						$('#showForgetMessage').html('');
						$("#send_forgot_password")[0].reset();	
						$('#send_forget').removeAttr('disabled');	
						
					}
                      
				}	
				
			});
			
			
			$("#send_forgot_password").validate({
			rules: {
				"data[UserForgot][email]": {
					required: true,
					email: true
				}
			},
			messages: {
				"data[UserForgot][email]": "*"
			},
			submitHandler: function(form) {
				//$("#invite_friend")[0].reset();	
					
				$('#showForgetMessage').html('');	
				$('#send_forget').attr('disabled','disabled');
				var URL = 	'<?php echo SITE_URL.'users/forgot_password'?>';
				var postData = $(form).serializeArray();
				$.ajax({
					url: URL,
					type: "POST",
					data: postData,
					success: function(data) {
								 if($.trim(data)==1){
									$(form)[0].reset();
									$('#showForgetMessage').html('<span style="color:#360">Password reset link has been sent to your email. Thank you!</span>');
								}
								else{
									
									$('#showForgetMessage').html(data);
								}
								
									
								$('#send_forget').removeAttr('disabled');
							}            
					 });
				//$('#invite_friend').submit();
			 }
		});
			
			
			
			
        });
})( jQuery );		
</script>