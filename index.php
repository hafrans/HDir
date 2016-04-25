<?php
	@header("Content-type:text/html;charset=utf8");
	/**
	 * 	Hdir 入口
	 * 
	 * 
	 */
	 /**
	  * 主配置文件
	  */
	  $config = [
	  			"title" => "Hafrans Directory Mirror"
	  ];
	 require "./HDir/HDir.class.php";
	 $dir = new HDir();
	 $lib = $dir->showLists();
	 //load templates
	 include "./HDir/template/#main.html";
	 //$dir->debug();
	 
	