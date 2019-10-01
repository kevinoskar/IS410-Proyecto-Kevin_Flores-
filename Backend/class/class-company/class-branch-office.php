<?php

require_once('class-company.php');

class BranchOffice extends Company{
	protected $branchOfficeName;
	protected $branchOfficeAddress;
	protected $branchOfficeLatLon;
	protected $branchOfficeWorkers;
	protected $branchOfficePhone;
	protected $branchOfficeEmail;
	protected $branchOfficeImage;

	public function __construct(
		$branchOfficeName = null,
		$branchOfficeAddress = null,
		$branchOfficeLatLon = null,
		$branchOfficeWorkers = null,
		$branchOfficePhone = null,
		$branchOfficeEmail = null,
		$branchOfficeImage = null
	){
		$this->branchOfficeName = $branchOfficeName;
		$this->branchOfficeAddress = $branchOfficeAddress;
		$this->branchOfficeLatLon = $branchOfficeLatLon;
		$this->branchOfficeWorkers = $branchOfficeWorkers;
		$this->branchOfficePhone = $branchOfficePhone;
		$this->branchOfficeEmail = $branchOfficeEmail;
		$this->branchOfficeImage = $branchOfficeImage;
	}

	public function getBranchOfficeName(){
		return $this->branchOfficeName;
	}

	public function setBranchOfficeName($branchOfficeName){
		$this->branchOfficeName = $branchOfficeName;
	}
	public function getBranchOfficeAddress(){
		return $this->branchOfficeAddress;
	}

	public function setBranchOfficeAddress($branchOfficeAddress){
		$this->branchOfficeAddress = $branchOfficeAddress;
	}
	public function getBranchOfficeLatLon(){
		return $this->branchOfficeLatLon;
	}

	public function setBranchOfficeLatLon($branchOfficeLatLon){
		$this->branchOfficeLatLon = $branchOfficeLatLon;
	}
	public function getBranchOfficeWorkers(){
		return $this->branchOfficeWorkers;
	}

	public function setBranchOfficeWorkers($branchOfficeWorkers){
		$this->branchOfficeWorkers = $branchOfficeWorkers;
	}
	public function getBranchOfficePhone(){
		return $this->branchOfficePhone;
	}

	public function setBranchOfficePhone($branchOfficePhone){
		$this->branchOfficePhone = $branchOfficePhone;
	}
	public function getBranchOfficeEmail(){
		return $this->branchOfficeEmail;
	}

	public function setBranchOfficeEmail($branchOfficeEmail){
		$this->branchOfficeEmail = $branchOfficeEmail;
	}
	public function getBranchOfficeImage(){
		return $this->branchOfficeImage;
	}

	public function setBranchOfficeImage($branchOfficeImage){
		$this->branchOfficeImage = $branchOfficeImage;
	}

	public function createBranchOffice(){
	}
	public function deleteBranchOffice(){
	}
	public function obtainBranchOffice(){
	}
	public function obtainsBranchOffices(){
	}
	public function updateBranchOffice(){
	}

}
?>