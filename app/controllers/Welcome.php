<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Welcome extends Controller {
	public function index() {
		$this->call->view('welcome_page');
	}

	public function about() {
		$this->call->view('about');
	}

	public function contact() {
		$this->call->view('contact');
	}

	public function explore_subjects() {
		$this->call->view('explore_subjects');
	}

	public function help_support() {
		$this->call->view('help_support');
	}
}
?>
