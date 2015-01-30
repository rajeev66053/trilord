<div class="main-page-title"><!-- start main page title -->
	<div class="container">
		<div class="page-title">Edit Profile</div>
	</div>
</div><!-- end main page title -->

<div class="content-about">

	<div class="container">
		
		<div class="spacer-1">&nbsp;</div>
		
		<div class="row">
		
			<div class="col-md-9">
				
				<p>Please note, fields marked with (<span class="required">*</span>) are mandatory!</p>
				
				<?php echo $this->Session->flash(); ?>
				
				<?php echo $this->Form->create('User', array('novalidate' => true,'class'=>"post-resume-form")); ?>
				<?php
					echo $this->Form->input('id');
					echo '<div class="row">';
					echo '<div class="col-md-6">';
					echo $this->Form->input('name',array('div'=>array('class'=>'form-group'),'class'=>'form-control input', 'tabindex'=>'1'));
					echo '</div>';
					echo '<div class="col-md-6">';
					echo $this->Form->input('email',array('readonly'=>true,'div'=>array('class'=>'form-group'),'class'=>'form-control input','tabindex'=>'2'));
					echo '</div>';
					//echo $this->Form->input('username',array('div'=>array('class'=>'form-group'),'class'=>'form-control input'));
					//echo $this->Form->input('password');
					echo '<div class="col-md-6">';
					echo $this->Form->input('primary_phone',array('div'=>array('class'=>'form-group'),'label'=>'Phone / Cell No.','class'=>'form-control input','tabindex'=>'3'));
					echo '</div>';
					//echo $this->Form->input('dob');
					echo '<div class="col-md-6">';
					echo $this->Form->input('dob_english', array('type' => 'text','class'=>'demoHeaders','label'=>'DOB','id' => 'datepicker','div'=>array('class'=>'form-group'),'class'=>'form-control input','tabindex'=>'4'));
					echo '</div>';
					echo '<div class="col-md-6">';
					echo $this->Form->input('permanent_address',array('div'=>array('class'=>'form-group'),'class'=>'form-control input','tabindex'=>'5'));
					echo '</div>';
					echo '<div class="col-md-6">';
					echo $this->Form->input('temporary_address',array('div'=>array('class'=>'form-group'),'class'=>'form-control input','tabindex'=>'6'));
					echo '</div>';
					//echo $this->Form->input('profile_photo',array('type'=>'file'));
				?>
				<?php
					$options = array('div'=>array('class'=>'form-group'),'value'=>'Edit', 'class'=> 'btn btn-default btn-green','tabindex'=>'8');
					echo '</div>';
					echo $this->Form->end($options);
				?>
			
			</div> <!-- end col-9 -->
			
			<div class="col-md-3">
				
				<?php echo $this->element('seeker_qlinks');?>
				
			</div> <!-- end col-3 -->
			
		</div> <!-- end row -->
	
		<div class="spacer-1">&nbsp;</div>
	
	</div> <!-- end container -->
	
</div> <!-- end content-about -->

