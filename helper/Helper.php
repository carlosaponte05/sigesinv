<?php 
//For Testing Only
function setThemeColors(){
	Config::set('usersetting.theme-colors', 'skin-red');
}

function isGod($userId){
	if (empty(\App\Gods::where('user_id', $userId)->first())) {
	    return false;
	} else {
	  return true;
	}
}

//For Deployment process only

function cbPermGetter($type){
	$permissions= getPermissions($type);
	$maker = '<div class="col-md-2 mg-right-5">
					<div class="row">
						<div class="col-md-12">
							<strong class="col-md-offset-1">For '.ucfirst($type).'</strong>
							<div class="container mg-top-10 mg-bottom-minus-10">';

	foreach ($permissions as $permission => $value) {
		$checked = ($value ? 'checked': '');

		$maker .= "<div class='checkbox no-margin'>
							<label>
								<input type='checkbox' name='".$type."[]' value=".$permission." ".$checked.">".ucfirst($permission)."
							</label>
						</div><br>";

		// $maker .= "<div class='checkbox-inline ".$var_class." ".$col."'><label><input type='checkbox' name='".$type."[]' value=".$permission." ".$checked.">".ucfirst($permission)."</label></div>";
	}

	$maker .= '</div></div></div></div>';
	
	echo $maker;
}
function checkBoxes($type,$var_class,$col){
	$permissions[]= array('{"user.create":true,"user.update":true,"user.delete":true,"user.view":true,"post.create":true,"post.update":true,"post.delete":true,"post.view":true}');
	$maker = '<div class="col-md-2 mg-right-5">
					<div class="row">
						<div class="col-md-12">
							<strong class="col-md-offset-1">For '.ucfirst($type).'</strong>
							<div class="container mg-top-10 mg-bottom-minus-10">';

	foreach ($permissions as $permission => $value) {
		$checked = ($value ? 'checked': '');

		/*$maker .= "<div class='checkbox no-margin'>
							<label>
								<input type='checkbox' name='".$type."[]' value=".$permission." ".$checked.">".ucfirst($permission)."
							</label>
						</div><br>";*/

		$maker .= "<div class='checkbox-inline ".$var_class." ".$col."'><label><input type='checkbox' name='".$type."[]' value=".$permission." ".$checked.">".ucfirst($permission)."</label></div>";
	}

	$maker .= '</div></div></div></div>';
	
	echo $maker;
}

function storeRole($var_roleName, $var_types, $var_checked, $description){

		$roleSlug = strtolower($var_roleName);
		$roleName = ucfirst($roleSlug);
		
		$role = \Sentinel::getRoleRepository()->createModel()->create([
						'name' => $roleName,
						'slug' =>  $roleSlug,
						'description' => $description,
					]);

		setPermissions($role, $var_types, $var_checked);
		shelterToGod($roleSlug);	
}
function saveDefaultRoles($arr_roles){
	$roles = \Sentinel::getRoles();

	foreach ($roles as $role) {
		if (in_array($role->slug, $arr_roles)) {
			$role->is_default = 1;
		}else{
			$role->is_default = 0;
		}
		$role->save();
	}
}
function updateUserRoles($user, $arr_roles){

	$roles = \Sentinel::getRoles();

	foreach ($roles as $role) {
		if (in_array($role->slug, $arr_roles)) {

			if(!$user->inRole($role->slug)){
				$role->users()->attach($user);
			}
		} else {
			if($user->inRole($role->slug)){
				$role->users()->detach($user);
			}
		}
		
	}
}
function setUserRoles($user, $arr_roles){

	$roles = \Sentinel::getRoles();

	foreach ($roles as $role) {
		if (in_array($role->slug, $arr_roles)) {
			$role->users()->attach($user);
		} 		
	}
}
/*
* First parameter $id -> ID of the role to update
* Second parameter $u_roleName -> updated/new role's name
* Third parameter ["put update/new role's permissions checkboxes values"] 
* Fourth parameter $u_description -> updated/new role's description 
* u_name mean updated/new value to replace as the old.
*/
function updateRole($id, $u_roleName, $var_types, $u_checked, $u_description){
	$role = \Sentinel::findRoleById($id);

	$role->slug = strtolower($u_roleName);
	$role->name = ucfirst($role->slug);
	$role->description = $u_description;

	setPermissions($role, $var_types, $u_checked);	
}

function setPermissions($role, $var_types, $var_checked){

	$types = ( (is_array($var_types)) ? $var_types : array($var_types) );

	// $role = \Sentinel::findRoleBySlug(ucfirst($roleName));
	
	$permissions =[];
	$count =0;

	foreach ($var_types as $type ) {
		foreach (getPermissions($type) as $key => $value) {
			$checked[$count] = arrFillNull($var_checked[$count]);
			$permissions["{$type}.{$key}"] = arrChecker($key, $checked[$count]);
		}
		$count += 1;
	}

	$role->update(["permissions" => $permissions]);
}

function getPermissions($type){
	// $allPermissions = include realpath(base_path('helper/permissions.php'));
	// $permissions = ( (empty($type)) ? $allPermissions : $allPermissions[$type] );
	$permissions = config('as_permissions.'.$type);
	return $permissions;
}
function arrFillNull($arr){
	return ( empty($arr) ? array( [0 => '&%$#'] ) : $arr);
}
function arrChecker($var, $arr, $pass= true, $fail= false){
	return ( in_array($var ,$arr) ? $pass : $fail );
}

function shelterToGod( $role_slug){  //Protected
	$gods = App\Gods::get();
	
	foreach ($gods as $god) {
		$user = \Sentinel::findById($god->user_id);
		$role = \Sentinel::findRoleBySlug($role_slug);
		$role->users()->attach($user);
	}
}
function showPermissions($type, $permissions){
	$config_permissions = getPermissions($type);
	$maker = '<div class="col-md-2">
					<ul class="list-group">
							<li class="list-group-item active"><h4 class="col-sm-offset-1"><strong>For '.ucfirst($type).'</strong></h4></li>';

	foreach ($config_permissions as $key => $value) {

		$bool = $permissions[$type.".".$key];
		$fa = ($bool) ? "fa-check" : "fa-close";  
		$maker .= '<li class="list-group-item">
					 <span><strong>'.ucfirst($key).'</strong></span>
					 <span class="pull-right"><i class="fa '.$fa.'"></i></span></li>';
	}

	$maker .= '</div>';
	echo $maker;
} 

function editPermissions($permissions, $type){
	$config_permissions = getPermissions($type);
	$maker = '<div class="col-md-2 mg-right-5">
					<div class="row">
						<div class="col-md-12">
							<strong class="col-md-offset-1">For '.ucfirst($type).'</strong>
							<div class="container mg-top-10 mg-bottom-minus-10">';

	foreach ($config_permissions as $key => $value) {

		$bool = $permissions[$type.".".$key];
		$checked = ($bool ? 'checked': '');
		$maker .= "<div class='checkbox no-margin'>
							<label>
								<input type='checkbox' name='".$type."[]' value=".$key." ".$checked.">".ucfirst($key)."
							</label>
						</div><br>";
	}

	$maker .= '</div></div></div></div>';

	echo $maker;
}

?>