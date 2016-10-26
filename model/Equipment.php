<?php
/*PLEASE DO NOT EDIT THIS CODE*/
/*This code was generated using the UMPLE 1.24.0-edef018 modeling language!*/

class Equipment
{

  //------------------------
  // MEMBER VARIABLES
  //------------------------

  //Equipment Attributes
  private $name;
  private $quantity;
  private $price;

  //------------------------
  // CONSTRUCTOR
  //------------------------

  public function __construct($aName, $aQuantity, $aPrice)
  {
    $this->name = $aName;
    $this->quantity = $aQuantity;
    $this->price = $aPrice;
  }

  //------------------------
  // INTERFACE
  //------------------------

  public function setName($aName)
  {
    $wasSet = false;
    $this->name = $aName;
    $wasSet = true;
    return $wasSet;
  }

  public function setQuantity($aQuantity)
  {
    $wasSet = false;
    $this->quantity = $aQuantity;
    $wasSet = true;
    return $wasSet;
  }

  public function setPrice($aPrice)
  {
    $wasSet = false;
    $this->price = $aPrice;
    $wasSet = true;
    return $wasSet;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getQuantity()
  {
    return $this->quantity;
  }

  public function getPrice()
  {
    return $this->price;
  }

  public function equals($compareTo)
  {
    return $this == $compareTo;
  }

  public function delete()
  {}

}
?>