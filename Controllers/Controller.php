<?php
session_start();
/**
 * Controller
 */
class Controller
{

	protected $viewPathName = 'Views';
	protected $production = false;

	public function view($file, $args = [])
	{
		extract($args);
		require_once('./' . $this->viewPathName . '/' . $file . '.php');
	}

	public function getViewPath() {
		return $this->$viewPathName;
	}

	public function css($rel, $file) {
		if ($rel == 0) {
			echo '<link rel="stylesheet" type="text/css" href="./' . $this->viewPathName . '/css/' . $file . '.css">';
		} else if($rel == 1) {
			echo '<link rel="stylesheet" type="text/css" href="../' . $this->viewPathName .'/css/' . $file . '.css">';
		} else if($rel == 2) {
			echo '<link rel="stylesheet" type="text/css" href="../../' . $this->viewPathName .'/css/' . $file . '.css">';
		} else if($rel == 3) {
			echo '<link rel="stylesheet" type="text/css" href="../../../' . $this->viewPathName .'/css/' . $file . '.css">';
		}
	}

	public function js($rel, $file) {
		if($rel == 0) {
			echo '<script src="./' . $this->viewPathName . '/js/' . $file . '.js"></script>';
		} else if($rel == 1) {
			echo '<script src="../' . $this->viewPathName . '/js/' . $file . '.js"></script>';
		} else if($rel == 2) {
			echo '<script src="../../' . $this->viewPathName . '/js/' . $file . '.js"></script>';
		} else if($rel == 3) {
			echo '<script src="../../../' . $this->viewPathName . '/js/' . $file . '.js"></script>';
		}
	}

	public function lib($cdn) {
		echo '<link rel="stylesheet" type="text/css" href="' . $cdn . '">';
	}

	public function redirect($file) {
		header('location: '.$file);
	}

	public function secure($html) {
		return htmlspecialchars($html);
	}

	public function isAdmin() {
		if($_SESSION['grade'] == 10) {
			return true;
		}
	}
}