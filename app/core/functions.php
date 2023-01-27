<?php
	use JetBrains\PhpStorm\NoReturn;
	
	/**
	 * @param $stuff
	 *
	 * @return void
	 */
	function show($stuff): void {
	echo "<pre>";
	print_r($stuff);
	echo "</pre>";
}
	
	/**
	 * @param $str
	 *
	 * @return string
	 */
	function esc($str): string {
	return htmlspecialchars($str);
}
	
	/**
	 * @param $path
	 *
	 * @return void
	 */
	#[NoReturn] function redirect($path): void {
	header("Location: " . ROOT."/".$path);
	die;
}
