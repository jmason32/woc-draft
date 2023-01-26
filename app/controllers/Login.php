<?php 

/**
 * login class
 */
class Login
{
	use Controller;
	
	/**
	 * @return void
	 */
	public function index(): void {
		$data = [];
		
		if($_SERVER['REQUEST_METHOD'] == "POST")
		{
			//Create a new User object to be used in the App
			$user = new User;
			
			//Retrieve the (email, password) from frontend
			$arr['email'] = $_POST['email'];
			$arr['username'] = $_POST['username'];

			//Check database
			$row = $user->first($arr);
			
			//If data is returned
			if($row)
			{
				//Check if passwords match
				//TODO : Salt password, beef up security
				if($row->password === $_POST['password'])
				{
					//Set the session user per the data returned from DB
					$_SESSION['USER'] = $row;
					redirect('home'); // Redirect home
				}
			}
			//If any errors
			$user->errors['email'] = "Wrong email or password";

			$data['errors'] = $user->errors;
		}
		//Set view back to login, since errors
		$this->view('login',$data);
	}

}
