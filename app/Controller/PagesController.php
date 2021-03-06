<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

App::uses('CakeEmail', 'Network/Email');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
 
 	//var $helpers = array('Rating');
	public $uses = array();
	public $components = array('Paginator','Useful');
	
	
	
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('display','invite_friend');
	}

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
 	/*function add() {
		  if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The rating has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rating could not be saved. Please, try again.', true));
			}
		  }
		  $ratings = $this->User->Rating->find('list', array(
			'order' => array('Rating.rating_order'))
		  );
		  $this->set(compact('ratings', 'genres'));
		}
	*/
	public function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title_for_layout'));
		
			//$this->loadModel('User');
			//$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			/*$options = array('conditions' => array('User.role' =>'Serviceprovider'));
			$this->request->data = $this->User->find('all', $options);
			$this->set('user',$this->request->data);
			debug($this->request->data);die;
			*/
			$searchplace = "";
			$searchjob = "";
			$salary = "0;0";

		$this->set('user',  $this->Page->query("
		SELECT U.id,U.name,U.temporary_address,U.place_id,concat_ws(' - ',Place.name,District.name) PlaceName,(select avg(R.rating) from ratings R where R.user_id=U.id)Rating,U.about_me,U.profile_photo,group_concat(distinct(SC.title)) as categories,group_concat(distinct(concat_ws('/',SPR.rate,RP.title))) as rate FROM `users` U
		
		inner join places as Place on Place.id=U.place_id
		inner join districts as District on District.id=Place.district_id
		Left JOIN service_provider_rates SPR ON U.id = SPR.user_id
		Left join rate_packages as RP on SPR.rate_package_id=RP.id
		Left JOIN provider_service_categories PSC on PSC.user_id=U.id 
		Left JOIN service_categories SC on PSC.service_categories_id= SC.id where U.role='Serviceprovider' and U.status='1' and U.profile_visibility='1' group by U.id ORDER BY Rating DESC  LIMIT 6"));
		
		$this->set('new_user',  $this->Page->query("
		SELECT U.id,U.name,U.temporary_address,U.place_id,concat_ws(' - ',Place.name,District.name) PlaceName,U.about_me,U.profile_photo,group_concat(distinct(SC.title)) as categories,group_concat(distinct(concat_ws('/',SPR.rate,RP.title))) as rate FROM `users` U
				
		inner join places as Place on Place.id=U.place_id
		inner join districts as District on District.id=Place.district_id
		Left JOIN service_provider_rates SPR ON U.id = SPR.user_id
		Left join rate_packages as RP on SPR.rate_package_id=RP.id
		Left JOIN provider_service_categories PSC on PSC.user_id=U.id 
		Left JOIN service_categories SC on PSC.service_categories_id= SC.id where U.role='Serviceprovider' and U.status='1' and U.profile_visibility='1' group by U.id ORDER BY U.created_date DESC  LIMIT 6"));
		
		$service_packages = $this->Page->query("select * from service_packages ServicPackage where ServicPackage.is_active=1 and ServicPackage.valid_till >= '".date('Y-m-d')."'");
		$user_stats = $this->Page->query("select count(id) NewProfile,
										(select count(id) from users where role='ServiceProvider' and status=1) TotalProvider,
										(select count(id) from service_categories where is_active=1) TotalCategory,
										(select count(id) from users where role='ServiceSeeker' and status=1) TotalSeeker,
										(select count(id) from seeker_provider_requests where  status='Completed') Completed
										 from users
										 where 
										 status = 1 and role = 'ServiceProvider' and created_date between  (CURDATE()- INTERVAL 30 DAY) and CURDATE()");
		//$ratingCount = $this->Useful->getProviderRating($id);
		//debug($ratingCount);die;
		//$getSearchplace = $this->Useful->getSearchplaceSuggestionList();
		
		$getPlace = $this->Useful->getPlaceSuggestionList();
		$getSearchjob = $this->Useful->getSearchjobSuggestionList();
		
		
		if($searchplace>0){
			$getPlaces = $this->Page->query("select Place.id,concat_ws(' - ',Place.name,District.name) PlaceName from places as Place
	inner join districts as District on District.id=Place.district_id where Place.id in ('$searchplace')");
	//debug($getPlaces);
	foreach($getPlaces as $place){
			$placeDistrict[] = array('id'=>$place['Place']['id'],'name'=>$place[0]['PlaceName']);
			//debug($placeDistrict);
	}
			//debug($placeDistrict);
		}else{
			$placeDistrict = '';	
		}
		if($searchjob>0){
			$job=$this->Page->query("select id,title from service_categories where id='$searchjob'");
			//debug($job);
			$job=array(array('id'=>$job[0]['service_categories']['id'],'name'=>$job[0]['service_categories']['title']));
			//debug($job);die;
		}else{
			$job="";
		}
		
		
		
		$this->loadModel('Testimonial');
		$testimonial=$this->Testimonial->find('all',array('conditions'=>array('Testimonial.is_active'=>'1'),'order' => 'RAND()','limit' => 5));
		$this->set('testimonials',$testimonial);
		//debug($testimonial);die;
		
		
		$this->set(compact('service_packages','searchplace','searchjob','salary','user_stats','getSearchplace','getSearchjob','getPlace','placeDistrict','job'));
		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
		
		//debug($service_packages);
	}
	
	public function search_marketplace(){
		if (!empty($this->params->query)) {
				
				//$arr=$this->params->query;
				$searchplace=$this->params->query['searchplace'];
				$searchjob=$this->params->query['searchjob'];
				
				$conditions[] =null;
				if (!empty($searchplace)) {
					
					//$conditions[] = "U.place_id ='$searchplace'";
					$searchplace=str_replace(",","','",$searchplace);
					//debug($searchplace);die;
					
					$conditions[] = "U.place_id in('$searchplace')";
					//$conditions[] = "U.temporary_address LIKE '%".$searchplace."%'";
				}
				if (!empty($searchjob)) {
					//debug($searchjob);die;
					if(is_numeric ($searchjob)){
						$conditions[] ="SC.id='$searchjob'";
					}else{
						$conditions[] ="U.additional_experience like '%$searchjob%'";
					}
					//$conditions[] ="SC.id='$searchjob'";
				}
				
				//$this->Paginator->settings = array('conditions' => array($conditions));
				$this->paginate = array('limit' => 10);
				$this->Page->recursive = 0;
				$user=$this->Paginator->paginate('Page',$conditions);
				//debug($user);die;
				//$this->set('user',$this->Paginator->paginate('Page',$conditions));
				$this->set(compact('user','searchplace','searchjob','salary'));
				
		}else{
				$searchplace = "";
				$searchjob = "";
				
				$conditions[] = null;
				//$this->Paginator->settings = array('conditions' => array($conditions));
				$this->paginate = array('limit' => 10);	
				$this->Page->recursive = 0;	
				$user=$this->Paginator->paginate('Page',$conditions);
				//debug($this->Paginator->paginate());die;
		
				$this->set(compact('user','searchplace','searchjob','salary'));
			
		}
		
		$service_packages = $this->Page->query("select * from service_packages ServicPackage where ServicPackage.valid_till >= '".date('Y-m-d')."'");
		
		
		if($searchplace>0){
			$getPlaces = $this->Page->query("select Place.id,concat_ws(' - ',Place.name,District.name) PlaceName from places as Place
	inner join districts as District on District.id=Place.district_id where Place.id in ('$searchplace')");
	//debug($getPlaces);
	foreach($getPlaces as $place){
			$placeDistrict[] = array('id'=>$place['Place']['id'],'name'=>$place[0]['PlaceName']);
			//debug($placeDistrict);
	}
			//debug($placeDistrict);
		}else{
			$placeDistrict = '';	
		}
		if($searchjob>0){
			$job=$this->Page->query("select id,title from service_categories where id='$searchjob'");
			//debug($job);
			$job=array(array('id'=>$job[0]['service_categories']['id'],'name'=>$job[0]['service_categories']['title']));
			//debug($job);die;
		}else{
			$job="";
		}
		
		
		//$getSearchplace = $this->Useful->getSearchplaceSuggestionList();
		
		$getSearchjob = $this->Useful->getSearchjobSuggestionList();
		
		$getPlace = $this->Useful->getPlaceSuggestionList();
		
		//$ratingCount = $this->Useful->getProviderRating($id);
		$this->set(compact('service_packages','getSearchplace','getSearchjob','getPlace','placeDistrict','job'));
		
		
	}
	
	/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function admin_display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			return $this->redirect('/');
		}
		$page = $subpage = $title_for_layout = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title_for_layout = Inflector::humanize($path[$count - 1]);
		}
		$user_stats = $this->Page->query("select count(id) NewProfile,
										(select count(id) from users where role='ServiceProvider' and status=1) TotalProvider,
										(select count(id) from service_categories where is_active=1) TotalCategory,
										(select count(id) from users where role='ServiceSeeker' and status=1) TotalSeeker,
										(select count(id) from seeker_provider_requests where  status='Completed') Completed,
										(select count(id) from seeker_provider_requests where  status='New') NewRequest,
										(select count(id) from seeker_provider_requests where  status='Assigned') Assigned,
										(select count(id) from service_seeker_deposits where  amount_medium='Bank Deposit' and status='New Deposit') Unverified,
										(select count(id) from service_seeker_deposits where  amount_medium='Bank Deposit'  and deposited_date between  (CURDATE()- INTERVAL 2 DAY) and CURDATE()) NewBankDeposit,
										(select count(id) from service_seeker_deposits where  amount_medium='Paypal'  and deposited_date between  (CURDATE()- INTERVAL 2 DAY) and CURDATE()) PaypalDeposit,
										(select count(id) from service_seeker_deposits where  amount_medium='Esewa'  and deposited_date between  (CURDATE()- INTERVAL 2 DAY) and CURDATE()) EsewaDeposit,
										(select count(id) from service_seeker_deposits where  amount_medium='Bank Deposit' and status='Success') TotalBankDeposit,
										(select count(id) from service_seeker_deposits where  amount_medium='Paypal' and status='Success') TotalPaypalDeposit,
										(select count(id) from service_seeker_deposits where  amount_medium='Esewa' and status='Success') TotalEsewaDeposit
										 from users
										 where 
										 status = 1 and role = 'ServiceProvider' and created_date between  (CURDATE()- INTERVAL 30 DAY) and CURDATE()");
										 
		$new_review=$this->Page->query("select count(id) TotalReview ,(select count(id) from reviews where is_active ='0') New, (select count(id) from reviews where is_active ='1') Verified,(select count(id) from reviews where is_active ='2') Blocked from reviews");
		//debug($new_review);die;
		$this->set(compact('page', 'subpage', 'title_for_layout','user_stats','new_review'));

		try {
			$this->render(implode('/', $path));
		} catch (MissingViewException $e) {
			if (Configure::read('debug')) {
				throw $e;
			}
			throw new NotFoundException();
		}
	}
	
	public function get_service_request(){
		$this->autoRender = false;
		$this->layout = false;
		$getServiceRequest = $this->Page->query("select * from seeker_provider_requests where status='New' and locked_by<1 and created_date=CURDATE() limit 0,5");
		$this->set(compact('getServiceRequest'));
		$this->render('admin_get_service_request');
		//debug($getServiceRequest);
	}
	
	public function about_us() {
	}
	public function post_resume() {
	}
	public function news() {
	}
	public function contact(){
		}
		
	public function invite_friend(){
		
		if($this->request->is('ajax')){
			
			$this->autoRender = false;
			$this->layout = false;
			//$sender=$this->Auth->User('email');
			$sender = MAIL_FROM;
			$name = $this->request->data['UserFriend']['name'];
			$email = $this->request->data['UserFriend']['email'];
			$trilord= SITE_URL;
			
			
			if(!empty($sender) && !empty($name) && !empty($email)){
				$this->send_mail($sender,$email,$name,$trilord);
				
				echo 1;
			}else{
				echo 0;
				
			}
			
			
		}
	
	}
	private function send_mail($sender=null,$email = null,$name = null,$trilord= null){
			$this->autoRender=false;
			$to = $email;
			$from = $sender;
					//$result = $this->_send_email($from,$get_email,$token_url);
			$Email = new CakeEmail();
			$Email->config('default');
			$Email->viewVars(array('name'=>$name,'trilord'=>$trilord));
			$Email->from(array($from  => $sender))
				  ->to($to)
				  ->subject('Invitation for Trilord MarketPlace.')
				  ->emailFormat('html')
				  ->template('invitation','invitation')
				  ->send();
			
			/*$subject = "Account Activation";
			$message = "You have successfully created account in bolaun with .".
							"\n".
							"Username: ".$username."\n Take initiation to speak!"."\n".
							"Click <a href='".SITE_URL."users/after_verify?email=".$email."&verify_code=".$verify_code."' target='_blank'>Here</a> to verify your account.";				
				
			mail($to,$subject,$message);*/
	}
}
