<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
	//Router::connect('/admin', array('controller' => 'users', 'action' => 'index','admin'=>true));
	Router::connect('/admin', array('controller' => 'pages', 'action' => 'display','admin_home','admin' => true));
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/seeker_register', array('controller' => 'users', 'action' => 'register'));
	Router::connect('/provider_register', array('controller' => 'users', 'action' => 'provider_register'));
	Router::connect('/search_marketplace', array('controller' => 'pages', 'action' => 'search_marketplace'));
	Router::connect('/contents/*', array('controller' => 'content_pages', 'action' => 'view'));
	//Router::connect('/post_resume', array('controller' => 'pages', 'action' => 'post_resume'));
	Router::connect('/news', array('controller' => 'pages', 'action' => 'news'));
	Router::connect('/enquire/*', array('controller' => 'SeekerProviderRequests','action' => 'add'));
	Router::connect('/admin/relay/*', array('controller' => 'ServiceRequestRelays','action' => 'add','admin'=>true));
	Router::connect('/admin/login', array('controller' => 'users','action' => 'login','admin'=>true));
	Router::connect('/response', array('controller' => 'ServiceRequestRelays','action' => 'seeker_request'));
	
	Router::connect('/paypal', array('controller' => 'payments', 'action' => 'paypal'));
	Router::connect('/bank_deposit', array('controller' => 'payments', 'action' => 'bank_deposit'));
	Router::connect('/provider_profile/*', array('controller' => 'users', 'action' => 'provider_profile'));
	Router::connect('/package_request/*', array('controller' => 'service_package_requests', 'action' => 'add'));
	Router::connect('/provider/*', array('controller' => 'users', 'action' => 'provider'));
	Router::connect('/Seeker_profile/*', array('controller' => 'users', 'action' => 'seeker_profile'));
	
	Router::connect('/Provider_profile/*', array('controller' => 'users', 'action' => 'provider_profile_page'));
	Router::connect('/contact_us', array('controller' => 'pages', 'action' => 'contact'));
	Router::connect('/faq_provider', array('controller' => 'faqs', 'action' => 'view','provider'));
	Router::connect('/faq_customer', array('controller' => 'faqs', 'action' => 'view','customer'));
	
	Router::parseExtensions('pdf');
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	//Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
