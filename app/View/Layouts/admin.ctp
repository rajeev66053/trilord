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

$cakeDescription = __d('cake_dev', 'Trilord Marketplace');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon',SITE_URL.'app/webroot/favicon.ico');
		
		echo $this->Html->script('jquery');
		echo $this->Html->css('cake.generic');
		echo $this->Html->css('magnific-popup');
		
		
				
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
    <?php
		  		
				
				echo $this->Html->css('ui-lightness/jquery-ui-1.10.4.custom');
				echo $this->Html->script('datepicker/jquery-1.10.2');
				echo $this->Html->script('datepicker/jquery-ui-1.10.4.custom');
				echo $this->Html->script('jquery.magnific-popup.min');
				
				
?> 
  
</head>
<body>

    <?php if (Authcomponent::user()):?>
	<div id="container">
		<div id="header">
        	<h1>&nbsp;</h1>
     <?php endif; ?>
			
            <?php 
			if(($this->Session->read('Auth.User'))) 
					echo $this->element('admin_menu')
			?>
       
    <?php if (Authcomponent::user()):?>
		</div>
    <?php endif; ?>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
        
	 <?php if (Authcomponent::user()):?>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false)
				);
			?>
		</div>
		</div>
    <?php endif; ?>
    
     


  <script>
  
  		$( "#datepicker" ).datepicker({
			inline: true,
			dateFormat: 'yy-mm-dd'
		});
		 
	 	$( "#datepicker1" ).datepicker({
			inline: true,
			dateFormat: 'yy-mm-dd'
		});
		 $( "#datepicker2" ).datepicker({
			inline: true,
			dateFormat: 'yy-mm-dd'
		});
		
		   
		</script>
        
 
        
        

	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
