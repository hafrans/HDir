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
	  error_reporting(E_ERROR | E_WARNING);
	  $config = [
	  			"title" => "Hafrans Directory Mirror",
	  			"SystemCharset" => 'utf8'
	  ];
	 require "./HDir/tool.functions.php";
	 require "./HDir/HDir.class.php";
	 $string = substr($_SERVER['REQUEST_URI'],strpos($_SERVER['REQUEST_URI'],"?")?strpos($_SERVER['REQUEST_URI'],"?")+1:-1);
	 $string = (($string = $string == "/"?false:$string) == false || $string == 'pp' ||  $string == 'p' )?null:$string ;// php test
	 $dir = new HDir($p = $string == null?null:iconv("utf-8",$config['SystemCharset'],urldecode($string)));
	 $string = $string == null?null:iconv("utf-8",$config['SystemCharset'], $string);

	 $cdir= $dir->getCurrentDir();
	 $lib = $dir->showLists();
	 //load templates
	 include "./HDir/template/#main.html";
	 //$dir->debug();
	