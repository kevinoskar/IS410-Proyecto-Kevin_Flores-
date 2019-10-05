<?php
class Comentarios{
	protected $idUser;
	protected $nameUserComment;
	protected $date;
	protected $stars;

	public function __construct(
		$idUser = null,
		$nameUserComment = null,
		$date = null,
		$stars = null
	){
		$this->idUser = $idUser;
		$this->nameUserComment = $nameUserComment;
		$this->date = $date;
		$this->stars = $stars;
	}

	public function getIdUser(){
		return $this->idUser;
	}

	public function setIdUser($idUser){
		$this->idUser = $idUser;
	}
	public function getNameUserComment(){
		return $this->nameUserComment;
	}

	public function setNameUserComment($nameUserComment){
		$this->nameUserComment = $nameUserComment;
	}
	public function getDate(){
		return $this->date;
	}

	public function setDate($date){
		$this->date = $date;
	}
	public function getStars(){
		return $this->stars;
	}

	public function setStars($stars){
		$this->stars = $stars;
	}

}
?>