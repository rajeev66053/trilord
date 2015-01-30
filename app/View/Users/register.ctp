<div class="main-page-title"><!-- start main page title -->
			<div class="container">
				
				<h4 class="register-title">Register</h4>
				
				<div class="row">
					
					<div class="col-md-12 register-blob">
						<p>We have a wide variety services for instance, <em>independent workers, contractors, factory workers, security guards, drivers, domestic helpers, delivery workers</em>, and all <em>skilled</em> and <em>semi-skilled</em> workers. Register now!</p>
					</div>
					
				</div> <!-- end register-blob -->
                
				<div class="row">
					
						<?php echo $this->Form->create('User', array('novalidate' => true,'type'=>'file','role'=>'form', 'class'=>'contact')); ?>
                        	
                        	<?php echo $this->Session->flash(); ?>
                        	
                        	<p class="col-md-12 info">Please note, fields marked with (<span class="error">*</span>) are mandatory!</p>
                        	
							<div class="col-md-4">
								<div class="form-group">
                                <?php echo $this->Form->input('name',array('id'=>'name','class'=>'form-control name','placeholder'=>'Full Name','tabindex'=>'1'));?>
								</div>
                                
								<div class="form-group">
                                
        						<?php echo $this->Form->input('password',array('id'=>'password','class'=>'form-control name','placeholder'=>'Password  (minimum 6 characters)','tabindex'=>'3'));?>
								</div>
								
								<div class="form-group">
								 <?php echo $this->Form->input('primary_phone',array('id'=>'primary_phone','type'=>'text','label'=>'Phone','class'=>'form-control phone','placeholder'=>'Phone / Cell','tabindex'=>'5'));?>
								</div>
										
							</div>
					
							<div class="col-md-4">
								
								<div class="form-group">
								<?php echo $this->Form->input('email',array('id'=>'email','type'=>'text','class'=>'form-control email','placeholder'=>'Email','tabindex'=>'2'));?>
								</div>
								
								<div class="form-group">
								 <?php echo $this->Form->input('confirm_password',array('id'=>'confirm_password','type'=>'password','class'=>'form-control name','placeholder'=>'Confirm Password','tabindex'=>'4'));?>
								</div>
								
        
								<div class="form-group">
                                <?php echo $this->Form->input('temporary_address',array('id'=>'temporary_address','label'=>'Address','class'=>'form-control subject','placeholder'=>'Address','tabindex'=>'6'));?>
								</div>
							</div>							
							<div class="col-md-12 ">
                                <p>
                                    <?php  echo $this->Form->button('REGISTER',array('type'=>'submit','class'=>'btn btn-default btn-blue', 'tabindex'=>'7'));?>
                               </p>	
							</div>
                            
                            	<?php echo $this->Form->end(); ?>
					
				
				</div> <!-- end row -->
			</div> 
		</div><!-- end main page title -->
        
        
<div id="page-content"><!-- start content -->
	<div class="content-about">
		
		<?php echo $this->element('login')?>
        
     </div><!-- end content -->
</div><!-- end page content -->