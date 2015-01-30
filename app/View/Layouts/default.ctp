<?php
/**
 *
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'TrilordMarket');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php echo $this->Html->charset(); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		<?php  echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon',SITE_URL.'app/webroot/favicon.ico');
		
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('style');
	?>
    <!-- fonts -->
    <link href='http://fonts.googleapis.com/css?family=Nunito:300,400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700' rel='stylesheet' type='text/css'>
    <?php	
		echo $this->Html->css('font-awesome');
		echo $this->Html->css('owl.carousel');
		echo $this->Html->css('owl.theme');
		echo $this->Html->css('owl.transitions');
		echo $this->Html->css('jslider');
		echo $this->Html->css('jslider.round');
	?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php 
		echo $this->Html->script('jquery'); 
		 
		echo $this->Html->script('jquery.easytabs.min');
		echo $this->Html->script('modernizr.custom.49511');
		echo $this->Html->script('owl.carousel'); 
		echo $this->Html->script('jshashtable-2.1_src'); 
		echo $this->Html->script('jquery.numberformatter-1.2.3'); 
		echo $this->Html->script('tmpl'); 
		echo $this->Html->script('jquery.dependClass-0.1'); 
		echo $this->Html->script('draggable-0.1');
		echo $this->Html->script('jquery.slider');
				 
		
	?>
    
   <?php
   
   		echo $this->Html->script('job-board'); 
		
	?> 
     <?php
		  echo $this->Html->css('ui-lightness/jquery-ui-1.10.4.custom');
		  echo $this->Html->script('datepicker/jquery-1.10.2');
		  echo $this->Html->script('datepicker/jquery-ui-1.10.4.custom');
		  	  
		  echo $this->Html->css('magnific-popup');
		  echo $this->Html->script('jquery.magnific-popup.min');
		  echo $this->Html->script('jquery.validate.min');
		  
		  echo $this->Html->css('datetimepicker/jquery.datetimepicker');
		  echo $this->Html->script('datetimepicker/jquery.datetimepicker');
	?>
    
    <?php	
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->script('waypoints.min');
		echo $this->Html->script('waypoints-sticky');
	?>
</head>
<body>
	<div id="wrapper"><!-- start main wrapper -->
		<?php echo $this->element('header')?>
		<div id="content">

			<?php //echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<?php echo $this->element('footer')?>
	</div><!-- end main wrapper -->
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <?php 
   		echo $this->Html->script('bootstrap.min');
   ?>
	
  <script>
  $( "#datepicker" ).datepicker({
			inline: true,
			dateFormat: 'yy-mm-dd'
		});
		 
	 $( "#datepicker1" ).datepicker({
			inline: true,
			dateFormat: 'yy-mm-dd'
		});
		
	
	
	
</script>


<SCRIPT>
$(function() {
//$(document).ready(function() { 

		$('#datetimepicker').datetimepicker({
			 // format:'Y-m-d H:i',
			  
			formatDate:'Y-m-d',
			
			});
		
		$("input[name='data[SeekerProviderRequest][opt]']").change(function(event){
			
			if($(this).val()=='0' || $(this).val()=='1'){
			$('#txttime').prop('disabled', false);
			$('#txttime').val("");
			}
			else{
				$('#txttime').prop('disabled', true);
				$('#txttime').val("");
			}
			$('#txttotal').prop('disabled', false);
			$('#txttotal').val("");
			var radioid=$(this).val();
			
			if(radioid=='0')
			{
				$("label[for='txttime']").text('Hours');
			}else if(radioid=='1'){
				$("label[for='txttime']").text('Days');
			}else{
				$("label[for='txttime']").text('Time');
			}
			
			var response =  $(this).next("label").html();
			response = response.replace ( /[^\d.]/g, '' );
			
				event.preventDefault();
				
		 $("#txttime").keypress(function (e) {
    	 //if the letter is not digit then display error and don't type anything
			 if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
				//display error message
				//$("#errmsg").html("Digits Only").show().fadeOut("slow");
				$("#errmsg").html("Digits Only").show();
				//alert('Enter only integer value');
					   return false;
			}
			else{
				$("#errmsg").fadeOut("slow");
			}
		   });
				
			$('#txttime').keyup(function () {
				 var sum=response*$('#txttime').val(); 
				  $("#txttotal").val(sum);
				// alert(sum);
			});
			
					if($('#txttime').prop('disabled')){
						$("#txttotal").val(response);
					}
			
		});
	
});
</SCRIPT> 


 
    
<?php echo $this->element('sql_dump'); ?>
</body>
</html>
