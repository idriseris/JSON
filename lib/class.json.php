<?PHP
class Json {
	public $source;
	public $folder;
	public function __construct($src){
		if(!file_exists($src)){
			$this->folder = fopen($src,"w");
			fwrite($this->folder,"{}");
		}
		$this->source = $src;
	}
	public function add($lab,$val){
		$data = file_get_contents($this->source);
		$json = json_decode($data, false);
		$json->$lab = $val;
		$this->folder = fopen($this->source,"w+");
		fwrite($this->folder,json_encode($json, JSON_UNESCAPED_UNICODE));
	}
	public function get(){
		$data = file_get_contents($this->source);
		return json_decode($data, false);
	}
	public function del($lab){
		$data = file_get_contents($this->source);
		$json = json_decode($data, false);
		unset($json->$lab);
		$this->folder = fopen($this->source,"w+");
		fwrite($this->folder,json_encode($json, JSON_UNESCAPED_UNICODE));
	}
	public function close(){
		if(is_resource($this->folder)){
			fclose($this->folder);
		}
	}
	public function remove(){
		$this->close();
		unlink($this->source);
	}
	public function __destruct(){
		$this->close();
	}
}
?>