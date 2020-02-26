<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Invoce")
 */
class Invoice
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
	function getId(){
		return $this->id;
	}
    /**
     * @ORM\Column(type="date")
     */
    private $Date;
	
	public function getDate(){
		return $this->Date;
	}
	public function setDate($Date){
		$this->Date = $Date;
		return $this->Date;
	}
    /**
     * @ORM\Column(type="integer")
     */
    private $Number;

	public function setNumber($Number){
		$this->Number = $Number;
		return $this->Number;
	}
	
	public function getNumber(){
		return $this->Number;
	}
    /**
     * @ORM\Column(type="integer")
     */
    private $ClientID;
	public function setClientID($ClientID){
		$this->ClientID = $ClientID;
		return $this->ClientID;
	}
	public function getClientID(){
		return $this->ClientID;
	}
}
?>