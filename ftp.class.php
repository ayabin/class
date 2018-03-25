<?php
/* ----------------------------------------------------------------
FTP.CLASS.PHP 1.0

	[1.0] 2018/3/16
-----------------------------------------------------------------*/
class ftp{
	
	private $conn_id;
	private $result_upload;
	public $local_dir_path;
	public $server_dir_path;
	private $removeFile;
	private $uploadFlag;
	
	function __construct($ftp_server,$ftp_user,$ftp_pass,$ftp_port=21){
		
		$this->conn_id=ftp_connect($ftp_server,$ftp_port);
		if(!$this->conn_id){die('CANNOT CONNECT');}
		
		$this->result_upload=@ftp_login($this->conn_id,$ftp_user,$ftp_pass);
		if(!$this->result_upload){die('CANNOT LOGIN');}
		ftp_pasv($this->conn_id,true);
		
		$this->uploadFlag=0;
		
	}
	
	public function upload($file){
		if($this->uploadFlag==0){ftp_chdir($this->conn_id,$this->server_dir_path);}
		if(!ftp_put($this->conn_id,$file,$this->local_dir_path.$file,FTP_BINARY)){echo "FAULT";}
		$this->uploadFlag++;
	}
	
	public function remove($file){
		$this->removeFile=$this->server_dir_path.$file;
		if(ftp_size($this->conn_id,$this->removeFile)>0){
			ftp_delete($this->conn_id,$this->removeFile);
		}
	}
	
	public function download($file){
		$serverFile=$this->server_dir_path.$file;
		$localFile=$this->local_dir_path.$file;
		if(!ftp_get($this->conn_id,$localFile,$serverFile,FTP_BINARY)){echo "FAULT";}
	}
	
	public function close(){
		ftp_close($this->conn_id);
	}
}

?>