<?php
	class View_Loader {

		protected $_contents = [];


		function load($view, $data = []) {
			extract($data);
			$view_path = APP_PATH . "/views/{$view}.php";
			if (!file_exists($view_path)) {
				exit("File not found $view_path");
			}
			ob_start();
			require_once $view_path;
			$this->_contents[] = ob_get_contents();
			ob_end_clean();
		}

		function show() {
			foreach ($this->_contents as $content) {
				echo $content;
			}
		}
	}