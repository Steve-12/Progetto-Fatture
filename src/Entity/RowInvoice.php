<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="RowInvoice")
 */
class RowInvoice
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
     * @ORM\Column(type="integer")
     */
    private $Id_Invoice;

	public function setId_Invoice($Id_Invoice){
		$this->Id_Invoice = $Id_Invoice;
		return $this->Id_Invoice;
	}
	
	public function getNumber(){
		return $this->Id_Invoice;
	}
    /**
     * @ORM\Column(type="string")
     */
    private $Description;
	public function setDescription($Description){
		$this->Description = $Description;
		return $this->Description;
	}
	public function getClientID(){
		return $this->Description;
	}
	/**
     * @ORM\Column(type="integer")
     */
	private $Quantity;
	public function setQuantity($Quantity){
		$this->Quantity = $Quantity;
		return $this->Quantity;
	}
	public function getQuantity(){
		return $this->Quantity;
	}
	/**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
	private $amounts;
	public function setamounts($amounts){
		$this->amounts = $amounts;
		return $this->amounts;
	}
	public function getamounts(){
		return $this->amounts;
	}
	/**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
	private $IVAamounts;
	public function setIVAamounts($IVAamounts){
		$this->IVAamounts = $IVAamounts;
		return $this->IVAamounts;
	}
	public function getIVAamounts(){
		return $this->IVAamounts;
	}
	/**
     * @ORM\Column(type="decimal", precision=8, scale=2)
     */
	private $Totalamounts;
	public function setTotalamounts($Totalamounts){
		$this->Totalamounts = $Totalamounts;
		return $this->Totalamounts;
	}
	public function getTotalamounts(){
		return $this->Totalamounts;
	}
}
?>