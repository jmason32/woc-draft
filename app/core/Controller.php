<?php 


Trait Controller
{
	
	/**
	 * @param $name
	 * @param array $data
	 *
	 * @return void
	 */
	public function view($name, array $data = []): void {
		if(!empty($data))
			extract($data);
		
		$filename = "../app/views/".$name.".view.php";
		if(!file_exists($filename)) {
			
			$filename = "../app/views/404.view.php";
		}
		require $filename;
	}
}