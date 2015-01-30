<div class="main-page-title"><!-- start main page title -->
	<div class="container">
		<div class="page-title">Career</div>
	</div>
</div><!-- end main page title -->
<div class="content-about">

	<div class="container">
	<div class="spacer-1">&nbsp;</div>
		<?php //debug(!empty($vacancy));die;
		if(!empty($vacancy)){ ?>
		<div class="row">
		
		<?php foreach($vacancy as $vacancies):?>
        <div class="col-md-6">
			<div class="jumbotron">
				<h3><?php echo($vacancies['Career']['title']);?></h3>
				<p><?php echo substr($vacancies['Career']['description'],0,220).'...';?></p>
                <?php $time=$this->Time->format('F jS, Y',$vacancies['Career']['valid_till']);?>
				<p><em>Application Deadline:</em> <?php echo $time?></p>
				<p><?php echo $this->Html->link('Apply',array('controller' => 'JobAppliers', 'action' => 'add',$vacancies['Career']['id']), array('class'=>'btn btn-red btn-default'));?>
                <?php echo $this->Html->link('View more', array('controller'=>'careers', 'action' => 'view_more',$vacancies['Career']['id']), array('class'=>'btn btn-green btn-default'));?></p>
			</div>
		</div>
        <?php endforeach;?>
        
        </div> <!-- end row -->
        <?php }else{ 
		echo 'Unfortunately there are no job vacancies or job openings available.Please be update with us.';
		 }?>
        
        <div class="spacer-1">&nbsp;</div>
	
	</div> <!-- end container -->

</div> <!-- end content-about -->