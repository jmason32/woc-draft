<?php 

/**
 * logout class
 */
class Logout
{
	use Controller;
	
	/**
	 * @return void
	 */
	public function index(): void {
		// Clear session data
		if(!empty($_SESSION['USER']))
			unset($_SESSION['USER']);

		redirect('home');
	}

}
