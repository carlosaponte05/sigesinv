<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');
//MAKE GOD
Artisan::command("make:god {user_id}", function($user_id){
	$user = \Sentinel::findById($user_id);
	if ($user) {
		$god = App\Gods::create(['user_id' => $user_id]);
		$god->save();
		$this->info("{$user->first_name} successfully upgraded as GOD!");
	}else{
		$this->error("OOPS...!!!! Something went wrong! Check and try again.");
	}
});
//REMOVE GOD
Artisan::command("remove:god {user_id}", function($user_id){
	$user = \Sentinel::findById($user_id);
	if ($user) {
		$god = App\Gods::where('user_id', $user_id)->first();
		$god->delete();
		$this->info("{$user->first_name} successfully removed as GOD!");
	}else{
		$this->error("OOPS...!!!! Something went wrong! Check and try again.");
	}
});
//USER REGISTERATION
Artisan::command("user:registeration", function(){
	$activation = "";
	$this->info("Please verify that you have access to do.");
	$credentials = [
        'email'    => $this->ask("Email"),
        'password' => $this->secret("Password")
        ];

	$god = \Sentinel::findUserByCredentials($credentials);
	if($god){
		$var_god = \Sentinel::validateCredentials($god, $credentials);
		if($var_god){
			if(empty(\App\Gods::where('user_id', $god->id)->first())){
				$this->error("Permission Denied!");
			}else{
				$this->info("Successfully verified!");
				$user = \Sentinel::register([
						'first_name' => $this->ask("Type a new username. Example: Bill Keck, Taylor Hill, etc"),
						'email' => $this->ask("Type a new email. Example: Bill Keck, Taylor Hill, etc"),
						'password' => $this->ask("Please! Give it a strong password "),					
					]);
				if ($this->confirm('Do you also want to activate this user?')) {
				    $activation = \Activation::create($user);
				    if (\Activation::complete($user, $activation->code)){
				    	$this->info("A new already activated User successfully created!");
				    }
				}else{
					$this->info("A new unactivated User successfully created!");
				}
				
			}
		}elseif(!$var_god){
			$this->error("An Error Occured! Please, Try Again.");die;
		}
	}else{
		$this->error("An Error Occured! Please, Try Again.");die;
	}
})->describe("For user registeration.");

// Artisan::command('activate:user {id} {activate_code}', function ($id, $activate_code) {
//     $user = \Sentinel::findById($id);
//     if(\Activation::exists($user)) {
//         if (\Activation::complete($user, $activate_code))
//         {
//             $this->info("Activation was successfull");
//         }
//         else
//         {
//             $this->info("Activation not found or not completed");
//         }   
//     } else {
//         		$this->info("Already Activated!");
//     }
// })->describe('Activate a user');


// //Add User TO ROle
// Artisan::command('adduserrole {id : The ID of the user} {role_slug : The slug of the role}', function($id, $role_slug){
// 	$user = Sentinel::findById($id);
// 	$role = Sentinel::findRoleBySlug($role_slug);
// 	if ($this->confirm("Are you sure you want this user to add to this role?")) {
// 	$role->users()->attach($user);
// 		$this->info("{$user->first_name} was successfully added to {$role->name}!");
// 	}else{
// 		$this->error("Denied by user!");
// 	}
// })->describe("Add User to specifice Role.");


// //Testing Table
// Artisan::command("getusers", function(){
// 	$header = ['ID', 'NAME'];
// 	$roles = \Sentinel::getUserRepository()->get(['id','first_name'])->sortBy('first_name')->toArray();
// 	$this->table($header, $roles);
// });
