<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class Page extends AppModel {

public $useTable = false;

public function paginate($conditions,$fields, $order, $limit, $page = 1, $recursive = null, $extra = array()) {
		//$conditions=implode(' and ',$conditions);
		if($conditions!=null){
		$conditions=implode(' and ',$conditions);
			
		}
		
		//debug($conditions);die;
		$pageLimit = ($page-1)*$limit;
			
		$recursive = -1;
		
			
			$sql = "SELECT U.id,U.name,U.temporary_address,concat_ws(' - ',Place.name,District.name) PlaceName,U.about_me,U.profile_photo,group_concat(distinct(concat_ws('/',SPR.rate,RP.title))) as rate,group_concat(distinct(SC.title)) as categories  FROM `users` U
		
		inner join places as Place on Place.id=U.place_id
		inner join districts as District on District.id=Place.district_id
		Left JOIN service_provider_rates SPR ON U.id = SPR.user_id
		Left join rate_packages as RP on SPR.rate_package_id=RP.id
		Left JOIN provider_service_categories PSC on PSC.user_id=U.id 
		Left JOIN service_categories SC on PSC.service_categories_id= SC.id where U.role='Serviceprovider' and U.status='1' and U.profile_visibility='1' {$conditions}
		group by U.id ORDER BY U.created_date DESC limit {$pageLimit},{$limit}";
		$results = $this->query($sql);
		//debug($results);die;
		return $results;
		
		
		
		
	}	
		public function paginateCount($conditions = null, $recursive = 0, $extra = array()) {
		if($conditions!=null){
		$conditions=implode(' and ',$conditions);
		}
			$sql = "SELECT U.id,U.name,U.temporary_address,concat_ws(' - ',Place.name,District.name) PlaceName,U.about_me,U.profile_photo,group_concat(distinct(concat_ws('/',SPR.rate,RP.title))) as rate,group_concat(distinct(SC.title)) as categories FROM `users` U
			
		inner join places as Place on Place.id=U.place_id
		inner join districts as District on District.id=Place.district_id
		Left JOIN service_provider_rates SPR ON U.id = SPR.user_id
		Left join rate_packages as RP on SPR.rate_package_id=RP.id
		Left JOIN provider_service_categories PSC on PSC.user_id=U.id 
		Left JOIN service_categories SC on PSC.service_categories_id= SC.id where U.role='Serviceprovider' and U.status='1' and U.profile_visibility='1' {$conditions}
		group by U.id ORDER BY U.created_date DESC";
				$this->recursive = $recursive;
				$results = $this->query($sql);
				//debug(count($results));die;
				return count($results);
		
				
			}

}
