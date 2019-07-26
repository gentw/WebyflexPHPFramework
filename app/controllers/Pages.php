<?php
class Pages extends Controller {
	public function __construct() {

	}

	public function index() {
		echo "Hellw from Index page!";
	}

	public function about() {
		echo "Hellw from about page!";
	}

	public function edit($id) {
		echo __method__ . ' -> ' . $id;
	}
}