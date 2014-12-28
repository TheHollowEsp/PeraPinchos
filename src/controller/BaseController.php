<?php
//file: controller/BaseController.php

require_once (__DIR__ . "/../core/ViewManager.php");
require_once (__DIR__ . "/../core/I18n.php");

require_once (__DIR__ . "/../model/User.php");

/**
 * Class BaseController
 *
 * Implements a basic super constructor for
 * the controllers in the Blog App.
 * Basically, it provides some protected
 * attributes and view variables.
 *
 * @author lipido <lipido@gmail.com>
 */
class BaseController {

	/**
	 * The view manager instance
	 * @var ViewManager
	 */
	protected $view;

	/**
	 * The current user instance
	 * @var User
	 */
	protected $currentUser;

	public function __construct() {

		$this -> view = ViewManager::getInstance();
		if (isset($_SESSION["currentuserTipo"])) {
			switch ($_SESSION["currentuserTipo"]) {
				case "Jurado" :
					$this -> view -> setLayout("jurado");
					break;
				case "Establecimiento" :
					$this -> view -> setLayout("establecimiento");
					break;
				case "Organizador" :
					$this -> view -> setLayout("organizador");
					break;
				default :
					$this -> view -> setLayout("welcome");
			}
		} else {
			$this -> view -> setLayout("welcome");
		}

		// get the current user and put it to the view
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}

		if (isset($_SESSION["currentuser"])) {

			$this -> currentUser = new User($_SESSION["currentuser"]);
			//add current user to the view, since some views require it
			$this -> view -> setVariable("currentusername", $this -> currentUser -> getUsername());
		}
	}

}
