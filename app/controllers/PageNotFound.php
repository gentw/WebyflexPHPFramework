<?php
class PageNotFound {
	public function index() {
		echo "<h2>Sorry, the page you are looking for could not be found.</h2>" .
		"Go to <a href='/'>filehunt.net</a>";
	}
}