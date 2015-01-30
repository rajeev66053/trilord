<div class="main-page-title"><!-- start main page title -->
	<div class="container">
		<div class="page-title">Change Password</div>
	</div>
</div><!-- end main page title -->

      <?php echo $this->Session->flash(); ?>

<div class="content-about">

	<div class="container">
		
		<div class="spacer-1">&nbsp;</div>
		
		<div class="row">
		
			<div class="col-md-9">
				
				<?php echo $this->Form->create('User', array('novalidate' => true,'class'=>"post-resume-form")); ?>
					<?php
						echo $this->Form->input('old_Password', array('id'=>'old_Password','type'=>'password','div'=>array('class'=>'form-group'),'class'=>'form-control input'));
						echo $this->Form->input('new_Password', array('id'=>'new_Password','type'=>'password','div'=>array('class'=>'form-group'),'class'=>'form-control input'));
						echo $this->Form->input('confirm_password', array('id'=>'confirm_password','type'=>'password','div'=>array('class'=>'form-group'),'class'=>'form-control input'));
						
					?>
				<?php 
					$options = array('div'=>array('class'=>'form-group'),'value'=>'Change Password', 'class'=> 'btn btn-default btn-green');
					echo $this->Form->end($options); 
				?>
			
			</div>
			
			<div class="col-md-3">
				
				<?php echo $this->element('seeker_qlinks');?>
				
			</div>
		
		</div>
			
		<div class="spacer-1">&nbsp;</div>
	
	</div> <!-- end container -->
	
</div> <!-- end content-about -->

