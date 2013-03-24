<?php
  
	class Whatsapp {
		
		public function __construct($api) {
			$this->api_key = $api;
			$this->error = null;
			$this->result = null;
			$this->url = "http://api.whatsapp-api.com/connector/auth?";
		}
		
		public function send($country, $number, $msg) {
			$query = http_build_query(array("key"=>$this->api_key, "cc"=>$country, "number"=>$number, "msg"=>$msg));
			$results = json_decode(file_get_contents($this->url.$query), true);
			$this->result = $results['result'];
			if(isset($results['reason'])){ 
				$this->error = $results['reason'];
      			} else {
      				unset($this->error);
      			}
      			if($this->result) {
      				return true;
      			} else {
      				return false;
      			}
		}
		
	}
	
?>
