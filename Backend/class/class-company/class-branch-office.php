<?php

require_once('class-company.php');

class BranchOffice{
	protected $branchOfficeName;
	protected $branchOfficeAddress;
	protected $branchOfficeLatLon;
	protected $branchOfficeWorkers;
	protected $branchOfficePhone;
	protected $branchOfficeEmail;
	protected $branchOfficeImage;

	public function __construct(
		$branchOfficeName,
		$branchOfficeAddress,
		$branchOfficeLatLon,
		$branchOfficeWorkers,
		$branchOfficePhone,
		$branchOfficeEmail,
		$branchOfficeImage
	){
		$this->branchOfficeName = $branchOfficeName;
		$this->branchOfficeAddress = $branchOfficeAddress;
		$this->branchOfficeLatLon = $branchOfficeLatLon;
		$this->branchOfficeWorkers = $branchOfficeWorkers;
		$this->branchOfficePhone = $branchOfficePhone;
		$this->branchOfficeEmail = $branchOfficeEmail;
		$this->branchOfficeImage = $branchOfficeImage;
	}

	public function getData(){
		$brancoff['branchOfficeName']=$this->branchOfficeName;
		$brancoff['branchOfficeAddress']=$this->branchOfficeAddress;
		$brancoff['branchOfficeLatLon']=$this->branchOfficeLatLon;
		$brancoff['branchOfficeWorkers']=$this->branchOfficeWorkers;
		$brancoff['branchOfficePhone']=$this->branchOfficePhone;
		$brancoff['branchOfficeEmail']=$this->branchOfficeEmail;
		$brancoff['branchOfficeImage']=$this->branchOfficeImage;
		return $brancoff;
	}
	
	public function createBranchOffice($db,$keyCompany){
		$branch=$this->getData();
		$result = $db->getReference('companys')
			->getChild($keyCompany) 
			->getChild('branchOffice') 
			->push($branch);
		   
		if ($result->getKey() != null)
			return '{"mensaje":"Sucursal Anexada con exito","key":"'.$result->getKey().'"}';
		else 
			return '{"mensaje":"Error al guardar la sucursal"}';
	}

	public static function obtainBranchOffice($db,$keyfirebaseCompany,$keyProduct){
		$result=$db->getReference('companys')
			->getChild($keyfirebaseCompany)
			->getChild('branchOffice')
			->getChild($keyProduct)
			->getValue();

		echo json_encode($result);
	}
	public static function obtainBranchOffices($db,$firebaseCompany){
		$result=$db->getReference('companys')
		->getChild($firebaseCompany)
		->getChild('branchOffice')
		->getValue();

		echo json_encode($result);
	}
	public static function deleteBranchOffice($db,$keyfirebaseCompany,$keyProduct){
		$result=$db->getReference('companys')
			->getChild($keyfirebaseCompany)
			->getChild('branchOffice')
			->getChild($keyProduct)
			->remove();

		echo '{"mensaje":"Se eliminó la sucursal con id '.$keyProduct.' de la empresa con id '.$keyfirebaseCompany.'"}';
	
	}
	public function updateBranchOffice($db,$keyfirebaseCompany,$keyProduct){
		$prod=$this->getData();
		$result = $db->getReference('companys')
		->getChild($keyfirebaseCompany)
		->getChild('branchOffice')
		->getChild($keyProduct)
		->set($prod);
	
		if ($result->getKey() != null)
			return '{"mensaje":"Sucursal actualizada","key":"'.$result->getKey().'"}';
		else 
			return '{"mensaje":"Error al actualizar la sucursal"}';
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

	
}
?>