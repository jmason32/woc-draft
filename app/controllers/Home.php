<?php 

/**
 * home class
 */
class Home
{
	use Controller;
	
	/**
	 * @return void
	 */
	public function index(): void {

		$data['username'] = empty($_SESSION['USER']) ? 'User':$_SESSION['USER']->username;

		$this->view('home',$data);
	}

}
