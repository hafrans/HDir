<?php
 
 
 /**	
  * Hdir Class
  * @author: Hafrans Newton
  */
/**
 * 
 * 返回示例  
 * 
//Array
//(
//  [0] => Array
//      (
//          [0] => Array
//              (
//                  [name] => .
//                  [details] => Array
//                      (
//                          [stat] => Array
//                              (
//                                  [0] => 3
//                                  [1] => 0
//                                  [2] => 16895
//                                  [3] => 1
//                                  [4] => 0
//                                  [5] => 0
//                                  [6] => 3
//                                  [7] => 4096
//                                  [8] => 1461214229
//                                  [9] => 1461214229
//                                  [10] => 1461210142
//                                  [11] => -1
//                                  [12] => -1
//                                  [dev] => 3
//                                  [ino] => 0
//                                  [mode] => 16895
//                                  [nlink] => 1
//                                  [uid] => 0
//                                  [gid] => 0
//                                  [rdev] => 3
//                                  [size] => 4096
//                                  [atime] => 1461214229
//                                  [mtime] => 1461214229
//                                  [ctime] => 1461210142
//                                  [blksize] => -1
//                                  [blocks] => -1
//                              )
//
//                      )
//
//              )
//
//  [1] => Array
//      (
//          [0] => Array
//              (
//                  [name] => index.php
//                  [details] => Array
//                      (
//                          [pathinfo] => Array
//                              (
//                                  [dirname] => D:\Hafrans\Documents\HBuilderProject\Hafrans
//                                  [basename] => index.php
//                                  [extension] => php
//                                  [filename] => index
//                              )
//
//                          [stat] => Array
//                              (
//                                  [0] => 3
//                                  [1] => 0
//                                  [2] => 33206
//                                  [3] => 1
//                                  [4] => 0
//                                  [5] => 0
//                                  [6] => 3
//                                  [7] => 288
//                                  [8] => 1461210293
//                                  [9] => 1461245863
//                                  [10] => 1461210293
//                                  [11] => -1
//                                  [12] => -1
//                                  [dev] => 3
//                                  [ino] => 0
//                                  [mode] => 33206
//                                  [nlink] => 1
//                                  [uid] => 0
//                                  [gid] => 0
//                                  [rdev] => 3
//                                  [size] => 288
//                                  [atime] => 1461210293
//                                  [mtime] => 1461245863
//                                  [ctime] => 1461210293
//                                  [blksize] => -1
//                                  [blocks] => -1
//                              )
//
//                      )
//
//              )
//
//      )
//
//  [dir] => Array
//      (
//          [0] => Array
//              (
//                  [name] => .
//                  [details] => Array
//                      (
//                          [stat] => Array
//                              (
//                                  [0] => 3
//                                  [1] => 0
//                                  [2] => 16895
//                                  [3] => 1
//                                  [4] => 0
//                                  [5] => 0
//                                  [6] => 3
//                                  [7] => 4096
//                                  [8] => 1461214229
//                                  [9] => 1461214229
//                                  [10] => 1461210142
//                                  [11] => -1
//                                  [12] => -1
//                                  [dev] => 3
//                                  [ino] => 0
//                                  [mode] => 16895
//                                  [nlink] => 1
//                                  [uid] => 0
//                                  [gid] => 0
//                                  [rdev] => 3
//                                  [size] => 4096
//                                  [atime] => 1461214229
//                                  [mtime] => 1461214229
//                                  [ctime] => 1461210142
//                                  [blksize] => -1
//                                  [blocks] => -1
//                              )
//
//                      )
//
//              )
//
//  [file] => Array
//      (
//          [0] => Array
//              (
//                  [name] => index.php
//                  [details] => Array
//                      (
//                          [pathinfo] => Array
//                              (
//                                  [dirname] => D:\Hafrans\Documents\HBuilderProject\Hafrans
//                                  [basename] => index.php
//                                  [extension] => php
//                                  [filename] => index
//                              )
//
//                          [stat] => Array
//                              (
//                                  [0] => 3
//                                  [1] => 0
//                                  [2] => 33206
//                                  [3] => 1
//                                  [4] => 0
//                                  [5] => 0
//                                  [6] => 3
//                                  [7] => 288
//                                  [8] => 1461210293
//                                  [9] => 1461245863
//                                  [10] => 1461210293
//                                  [11] => -1
//                                  [12] => -1
//                                  [dev] => 3
//                                  [ino] => 0
//                                  [mode] => 33206
//                                  [nlink] => 1
//                                  [uid] => 0
//                                  [gid] => 0
//                                  [rdev] => 3
//                                  [size] => 288
//                                  [atime] => 1461210293
//                                  [mtime] => 1461245863
//                                  [ctime] => 1461210293
//                                  [blksize] => -1
//                                  [blocks] => -1
//                              )
//
//                      )
//
//              )
//
//      )
//
//)
 */
//Check
if(!strpos($_SERVER['PHP_SELF'], "index.php"))
{header("HTTP/1.0 404 NOT FOUND"); exit("err:404");}
 
 
 
class HDir{
	    private $currentDir = './';
		private $dir_handle = null;
		private $fileinfo_handle = null;
		/**
		 * constructor Method
		 * @param string $dir current directory
		 */
	 	public function __construct($dir = null){
	 		if($dir === null) 
	 			$this->currentDir = dirname(__DIR__)."";
			else
				$this->currentDir = $dir;
			if(!is_readable($this->currentDir))
			{
				die($this->currentDir." is unreadable!");
			}
			$this->dir_handle = opendir($this->currentDir) or die("can not read the dir ".$this->currentDir."!");
			return ;
	 	}
	 	/**
	 	 *  读取文件夹
	 	 * @access private
	 	 * @return array/mixed list 文件夹详情
	 	 */
	 	private function showDirectory(){
	 		if(!$this->dir_handle)
				return false;
			else
				$list = [];
				rewinddir($this->dir_handle);
				while(($file = readdir($this->dir_handle)) !== FALSE)
				{
					if(!is_file($this->currentDir.DIRECTORY_SEPARATOR.$file) 
						&& $this->currentDir.DIRECTORY_SEPARATOR.$file <> dirname(__DIR__).DIRECTORY_SEPARATOR."HDir")
						$list[] = [
							"name"   => $file,
							"details"=> $this->getDirectoryInfo($file)
						];
				}
				
				return $list;
	 	}
	 	/**
	 	 * 显示文件
	 	 * @access private
	 	 * @return array list 文件详情
	 	 */
	 	private function showFiles(){
	 		if(!$this->dir_handle)
				return false;
			else
				$list = [];
				rewinddir($this->dir_handle);
				while(($file = readdir($this->dir_handle)) !== FALSE)
				{
					if(is_file($this->currentDir.DIRECTORY_SEPARATOR.$file))
					{
						$list[] = [
							"name"   => $file,
							"details"=> $this->getFileInfo($file)
						];
					}
					
				}
				
				return $list;
	 	}
	 	/**
	 	 * 获取文件的详情信息
	 	 * @access private
	 	 * @param string $filename 文件基于当前目录<$this->currentDir>)
	 	 */
	 	private function getFileInfo($filename){
	 	    if(!file_exists($this->currentDir.DIRECTORY_SEPARATOR.$filename))
			{
				exit("Invaild Call HDir::getFileInfo");
			}
//			if(!$this->fileinfo_handle)
//			  try{
//			        $this->fileinfo_handle = @finfo_open(FILEINFO_MIME);
//			    }catch(Exception $e){
//			        	die ($e->getMessage());
//			    }
			/////////////////////////////////////////////////
			$list['pathinfo'] = pathinfo($this->currentDir.DIRECTORY_SEPARATOR.$filename);
			$list['stat']     = stat($this->currentDir.DIRECTORY_SEPARATOR.$filename);
//			$list['mime']	  = $this->fileinfo_handle->file($this->currentDir.DIRECTORY_SEPARATOR.$filename);
			return $list;
	 	}
		private function getDirectoryInfo($path){
			$list = [];
			if(!is_dir($this->currentDir.DIRECTORY_SEPARATOR.$path))
			{
				$list['stat'] = [];
				return $list;
			}			
			$list['stat'] = stat($this->currentDir.DIRECTORY_SEPARATOR.$path);
			return $list;
		}
	 	/**
	 	 * 返回可迭代的文件夹与文件数组
	 	 * @access public 
	 	 * @return array List
	 	 */
		public function showLists(){
			$list[] = $this->showDirectory();
			$list[] = $this->showFiles();
			$list['dir']  = $list[0];
			$list['file'] = $list[1];
			return $list;
		}
		/**
		 * DEBUG Method
		 */
	 	public function debug(){
	 		print_r($this->showLists());
	 	}
	 	/**
	 	 * 返回当前文件夹
	 	 * @access public
	 	 * @return string dir 当前文件夹
	 	 */
		public function getCurrentDir(){
			return $this->currentDir;
		}
		/**
		 * destructor method
		 */
		public function __destruct(){
			if(isset($this->dir_handle))
			{
				closedir($this->dir_handle);
			}
		}
	 }
	 