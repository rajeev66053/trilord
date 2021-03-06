<?php 
$manualLimit = isset($this->request->data['User']['document_count'])?$this->request->data['User']['document_count']:'0';

//debug($manualLimit);die;
?>
<script>
$(function() {
	
	$('#document_count').val('<?php echo $manualLimit?>');
	
	
	
	$('#document-button').click(function(event){
				
		var documentCount = parseInt($('#document_count').val())+1;
		var inputHtml = '<div class="input text"><label for="UserDocumentId2">Document Title</label><input id="UserDocumentId2" type="text" name="data[User][document_id_'+documentCount+']"></div><div class="input file"><input id="UserDocument2" type="file" name="data[User][document_'+documentCount+']"></div>';
		$('#document_count').val(documentCount);
		event.preventDefault();
		$('#document').append(inputHtml);
	});
	
	
	
});


</script>

<div class="users form">
<?php echo $this->Form->create('User', array('novalidate' => true,'type'=>'file')); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name',array('id'=>'name','class'=>'default'));
		//echo $this->Form->input('email',array('id'=>'email','class'=>'default'));
		//echo $this->Form->input('username',array('id'=>'username','class'=>'default'));
		
		echo $this->Form->input('dob',array('id'=>'dob','class'=>'default'));
		echo $this->Form->input('permanent_address',array('id'=>'permanent_address','class'=>'default'));
		echo $this->Form->input('temporary_address',array('id'=>'temporary_address','class'=>'default'));
		echo $this->Form->input('city',array('id'=>'city','class'=>'default'));
		echo $this->Form->input('country_id',array('empty'=>'<--Select-->','options'=>$country,'id'=>'country_id','class'=>'default'));
		echo $this->Form->input('citizenship_number',array('id'=>'citizenship_number','class'=>'default'));
		echo $this->Form->input('passport_number',array('id'=>'passport_number','class'=>'default'));
		echo $this->Form->input('phone',array('label'=>false,'label'=>'Mobile number','id'=>'phone','class'=>'default'));
		echo $this->Form->input('optional_number',array('id'=>'optional_number','class'=>'default'));
		echo $this->Form->input('expertise_level',array('empty'=>'<--Select-->','options'=>array('expert'=>'Expert','intermediate'=>'Intermediate','basic'=>'Basic'),'id'=>'expertise_level','class'=>'default'));
		/*echo $this->Form->input('profile_photo',array('type'=>'file','id'=>'profile_photo','class'=>'default'));
		echo $this->Html->image('/providers_photo/'.$features['User']['profile_photo']); 
		echo $this->Form->hidden('profile_photo');*/
		echo $this->Form->input('about_me', array('type' => 'textarea','id'=>'about_me','class'=>'default', 'escape' => false));
		$i =0;
		foreach($ratePackages as $rate):
			$i++;
			echo $rate['RP']['title'];
			echo $this->Form->input('rate_'.$i,array('value' => $rate['SPR']['rate']));
			echo $this->Form->hidden('rate_id_'.$i, array('value'=>$rate['RP']['id']));
		endforeach;
		//count $ratePackages
		echo $this->Form->hidden('rate_count',array('value'=>count($ratePackages)));

			$i=0;
			//debug($documents);
			foreach($document as $doc):
					$i++;
					echo $this->Form->input('doc_title_'.$i,array('value' => $doc['SPD']['title'],'label'=>false,'label'=>'Document Title'	));
					echo $this->Form->input('doc_name_'.$i,array('type'=>'file','label'=>false));
					echo $this->Form->hidden('doc_id_'.$i,array('value'=>$doc['SPD']['id']));
					echo $this->Form->hidden('user_id_'.$i,array('value'=>$doc['SPD']['user_id']));
					echo $this->Form->hidden('doc_name_'.$i,array('value'=>$doc['SPD']['document_file']));
					echo $this->Html->image('/providers_document/'.$doc['SPD']['document_file'],array('width'=>140,'height'=>'100'));	 					
					echo $this->Form->hidden('document_file');
					
			endforeach;
			echo $this->Form->hidden('doc_count',array('value'=>count($document)));
			
		//debug($manualLimit);die;	
		echo '<div id="document">';
		
		for($j=1;$j<=$manualLimit;$j++){
		
			echo '<div>';

				echo $this->Form->input('document_id_'.$j,array('label'=>false,'label'=>'Document Title'));
				echo $this->Form->input('document_'.$j,array('type'=>'file','label'=>false));
			
			echo '</div>';
			
		}
		echo '</div>';
		//debug($count);die;
		echo $this->Form->hidden('document_count',array('id'=>'document_count','value'=>$manualLimit));
		echo $this->Form->button('ADD DOCUMENT', array('type' => 'button','id'=>'document-button'));
   		//echo $this->Form->input('category', array('multiple'=>'checkbox','options'=>$serviceCategories,'id'=>'category','class'=>'default'));
		$i =0;
  		foreach($serviceCategories as $key=>$value){
			$i++;
			$cb = $this->Form->checkbox('category_id_'.$i, array('value'=>$key,'checked' =>in_array($key,$checkedArray)?true:false,'id'=>'category','class'=>'default'));
 			echo  "<li>$cb $value &nbsp;</li>";
  			}
  		echo $this->Form->hidden('category_count',array('value'=>count($serviceCategories)));
		echo '<div>';
		echo $this->Form->input('year_of_experience',array('div'=>false,'label'=>false,'label'=>'Years of experience in current occupation :','empty'=>'<--Select Year-->','options'=>range(1,20)));
		echo $this->Form->input('month_of_experience',array('empty'=>'<--Select Month-->','options'=>range(1,11),'div'=>false,'label'=>false));
		echo '</div>';
		echo $this->Form->input('additional_experience',array('label'=>false,'label'=>'Additional Experiences in related field :','type'=>'textarea','id'=>'additional_experience','class'=>'default'));
		echo $this->Form->input('do_you_work_alone',array('label'=>false,'label'=>'Do you work alone?    If no, list your partners and their expertise','type'=>'textarea','id'=>'do_you_work_alone','class'=>'default'));
	?>
	</fieldset>
	
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('User.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('User.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'admin_provider_index')); ?></li>
</div>
