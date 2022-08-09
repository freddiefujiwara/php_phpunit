<?php
namespace Tddbc;

class VendingMachine
{
	function __construct(){
		$this -> total = 0;
	}
	function input($coin){
		if(in_array($coin,[10,50,100,500,1000],true)){
			$this -> total += $coin;
			return;
		}
		throw new \Exception("coin should be 10,50,100,500 or 1000");
	}
	function refund(){
		$prevTotal = $this -> total;
		$this -> total = 0;
		return $prevTotal;
	}
}
