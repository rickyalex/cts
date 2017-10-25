<?php

//===============STANDARDIZE COMMON FUNCTIONS==============//
	//TO IMPLEMENT BETTER PROGRAMMING APPROACH IN BCS//
//=========================================================//

class Commons
{
	public $APP ;
	
	public function __construct() { 
		
	}
	
	//CONVERT DATE FORMAT INTO Y-M-D
	public function date_format($originalDate){
		return date("Y-m-d", strtotime($originalDate));
	}
	
	//CONVERT DECIMAL INTO ROMANIC NUMBER
	public function romanic_number($integer, $upcase = true) 
	{ 
		$table = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9, 'V'=>5, 'IV'=>4, 'I'=>1); 
		$return = ''; 
		while($integer > 0) 
		{ 
			foreach($table as $rom=>$arb) 
			{ 
				if($integer >= $arb) 
				{ 
					$integer -= $arb; 
					$return .= $rom; 
					break; 
				} 
			} 
		} 

		return $return; 
	}
	
	//CONVERT DECIMAL INTO LETTER
	public function letter_number($integer, $upcase = true) 
	{
		$table = array('A'=>1, 'B'=>2, 'C'=>3, 'D'=>4, 'E'=>5, 'F'=>6, 'G'=>7, 'H'=>8, 'I'=>9, 'J'=>10, 'K'=>11, 'L'=>12, 'M'=>13, 'N'=>14, 'O'=>15, 'P'=>16, 'Q'=>17, 'R'=>18, 'S'=>19, 'T'=>20, 'U'=>21, 'V'=>22, 'W'=>23, 'X'=>24, 'Y'=>25, 'Z'=>26); 

		foreach($table as $letter=>$int) 
		{ 
			if($integer == $int) 
			{ 
				$return = $letter; 
				break; 
			} 
		} 

		return $return;
	}
	
	//GET APP NAME
	public function getAPP(){
		$this->setAPP();
		return $this->APP;
	}
	
	//SET APP NAME
	public function setAPP(){
		$this->APP = "cts";
	}
}

?>
