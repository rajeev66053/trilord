<div class="main-page-title"><!-- start main page title -->
	<div class="container">
		<div class="page-title">Complain</div>
	</div>
</div><!-- end main page title -->

         <?php echo $this->Session->flash(); ?>
<div class="content-about">

	<div class="container">
		
		<div class="spacer-1">&nbsp;</div>
<?php echo $this->Form->create('Complain',array('class'=>"post-resume-form")); ?>
	<fieldset>
	<?php
		echo $this->Form->input('description',array('label'=>'Message','div'=>array('class'=>'form-group'),'class'=>'form-control textarea'));
	?>
	</fieldset>
<?php $options = array('div'=>array('class'=>'form-group'),'value'=>'Change Password', 'class'=> 'btn btn-default btn-green');
				echo $this->Form->end($options); ?>
<div class="spacer-1">&nbsp;</div>
	
	</div> <!-- end container -->

</div> <!-- end content-about -->