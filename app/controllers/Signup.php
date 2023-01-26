<?php 

/**
 * signup class
 */
class Signup
{
	use Controller;
	
	/**
	 * Create user
	 * Check if email/username is unqiue
	 * @return void
	 */
	public function index(): void {
		$data = [];
		
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//Create a new User
			$user = new User;
			
			//Check if user is valid
			if($user->validate($_POST))
			{
				$user->insert($_POST);
				redirect('login');
			}
			//If there are any errors, validate will return false with errors
			$data['errors'] = $user->errors;			
		}


		$this->view('signup',$data);
	}

}
