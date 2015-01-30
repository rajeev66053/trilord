<div class="main-page-title"><!-- start main page title -->
	<div class="container">
		<div class="page-title">Add Testimonial</div>
	</div>
</div><!-- end main page title -->

<div class="content-about">

	<div class="container">
		
		<div class="spacer-1">&nbsp;</div>
		
			<?php echo $this->Form->create('Testimonial', array('class'=>"post-resume-form")); ?>
				<?php echo $this->Session->flash(); ?>
				<?php
					//echo $this->Form->input('user_id');
					echo $this->Form->input('description',array('type' => 'textarea','id'=>'description','class'=>'default','div'=>array('class'=>'form-group'),'class'=>'form-control textarea','label'=>'Write down your testimonial here'));
					//echo $this->Form->input('is_active');
				?>
				
			<?php 
				$options = array('div'=>array('class'=>'form-group'),'value'=>'Change Password', 'class'=> 'btn btn-default btn-green');
				echo $this->Form->end($options); 
			?>
		
		<div class="spacer-1">&nbsp;</div>
	
	</div> <!-- end container -->

</div> <!-- end content-about -->