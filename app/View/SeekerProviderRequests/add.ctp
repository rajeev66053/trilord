<div class="main-page-title"><!-- start main page title -->
	<div class="container">
		<div class="page-title">New Service Enquiry</div>
	</div>
</div><!-- end main page title -->

<div class="content-about">

	<div class="container">
		
		<div class="spacer-1">&nbsp;</div>
		
		<?php echo $this->Session->flash(); ?>
        
        <?php //debug($this->here);
		if (strpos($this->here,'success')== false) {
   			 $success_message=null;
		}else{
			$success_message='success';
		}
		if(empty($success_message)){?>
		
		<p>Please note, fields marked with (<span class="required">*</span>) are mandatory!</p>
		<?php echo $this->Form->create('SeekerProviderRequest', array('novalidate' => true,'class'=>"post-resume-form")); ?>

			<?php //echo $this->Session->flash(); ?>
			<?php
				echo '<div class="row">';
				//echo $this->Form->input('id');
				//echo $this->Form->input('service_provider_id',array('options' => $provider));
				echo '<div class="col-md-6">';
				//echo $this->Form->input('requested_date', array('type' => 'text','class'=>'demoHeaders','id' => 'datepicker','div'=>array('class'=>'form-group'),'class'=>'form-control input'));
				
				echo $this->Form->input('requested_date', array('type' => 'text','placeholder'=>'Click here to select requested date','class'=>'demoHeaders','id' => 'datetimepicker','div'=>array('class'=>'form-group'),'class'=>'form-control input','readonly'=>true));
								
				echo $this->Form->input('description', array('type' => 'textarea','placeholder'=>'Briefly describe the service that you want to request.','div'=>array('class'=>'form-group'),'class'=>'form-control textarea'));
				echo '</div>';
				 
				 //echo $this->Form->input('requested_date_to', array('type' => 'text','class'=>'demoHeaders','id' => 'datepicker1'));
				//echo $this->Form->input('requested_date_from');
				//echo $this->Form->input('requested_date_to');
				//echo $this->Form->input('created_date');
				//debug($provider_rates);die;
				
				echo '<div class="col-md-6">';
				
		if(!empty($provider_rates)){
				echo '<div id="document" class="form-group radio-type">';
						echo $this->Form->label('Rate');
						
				        $num=count($rate);
				
						for($i=0;$i<$num;$i++){
				            $options=array($rate[$i]['RP']['title']=>'');
						    $attributes=array('legend'=>false,'value' =>$rate[$i]['RP']['title']);
				   
				          //  echo  "\n<br /> &nbsp;&nbsp;&nbsp;&nbsp;";
//				            echo $this->Form->radio('opt',$options,$attributes)."&nbsp Rs".$rate[$i]['SPR']['rate'].$rate[$i]['RP']['title'];
//						   // echo $rate[$i]['RP']['title']."&nbsp Rs".$rate[$i]['SPR']['rate']."&nbsp".$this->Form->radio('opt',$options,$attributes);
//						    echo  "\n<br />";
						}
				
				 		for($i=0;$i<$num;$i++){
				            $a[$i]="Rs".$rate[$i]['SPR']['rate'].' '.$rate[$i]['RP']['title'];
						   // echo $rate[$i]['RP']['title']."&nbsp Rs".$rate[$i]['SPR']['rate']."&nbsp".$this->Form->radio('opt',$options,$attributes);
						    
						}
				
				            $options=$a;
						    $attributes=array('legend'=>false);
				         
							
				            echo $this->Form->radio('opt',$options,$attributes);
							
				        	echo '</div>';
							
							echo $this->Form->input('txtTime',array('id'=>'txttime','disabled'=>'disabled','label'=>'Time','div'=>array('class'=>'form-group'),'class'=>'form-control input'));
							echo '<span id="errmsg"></span>';
							echo $this->Form->input('txtTotal',array('id'=>'txttotal','disabled'=>'disabled','label'=>'Total','readonly'=>true,'div'=>array('class'=>'form-group'),'class'=>'form-control input'));
							
							
					?>
           <?php }?>
				
				<?php echo $this->Form->input('payment_on_site',array('type' => 'checkbox','label'=>'Pay in person'));
				
				echo '</div>';
				//echo $this->Form->input('status');
				//echo $this->Form->input('assigned_date');
				//echo $this->Form->input('completed_date');
				//echo $this->Form->input('withdrawn_date');
				
					
			$options = array('div'=>array('class'=>'form-group'),'value'=>'Change Password', 'class'=> 'btn btn-default btn-green');
			echo "</div>";
			echo $this->Form->end($options); 
		?>	
        <?php } ?>
		
		<div class="spacer-1">&nbsp;</div>
	
	</div> <!-- end container -->

</div> <!-- end content-about -->
