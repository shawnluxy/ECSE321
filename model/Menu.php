<?php
/*PLEASE DO NOT EDIT THIS CODE*/
/*This code was generated using the UMPLE 1.24.0-edef018 modeling language!*/

class Menu
{

  //------------------------
  // MEMBER VARIABLES
  //------------------------

  //Menu Attributes
  private $id;
  private $name;
  private $price;
  private $popularity;

  //Menu Associations
  private $foods;

  //------------------------
  // CONSTRUCTOR
  //------------------------

  public function __construct($aId, $aName, $aPrice, $aPopularity)
  {
    $this->id = $aId;
    $this->name = $aName;
    $this->price = $aPrice;
    $this->popularity = $aPopularity;
    $this->foods = array();
  }

  //------------------------
  // INTERFACE
  //------------------------

  public function setId($aId)
  {
    $wasSet = false;
    $this->id = $aId;
    $wasSet = true;
    return $wasSet;
  }

  public function setName($aName)
  {
    $wasSet = false;
    $this->name = $aName;
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

  public function setPopularity($aPopularity)
  {
    $wasSet = false;
    $this->popularity = $aPopularity;
    $wasSet = true;
    return $wasSet;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getPrice()
  {
    return $this->price;
  }

  public function getPopularity()
  {
    return $this->popularity;
  }

  public function getFood_index($index)
  {
    $aFood = $this->foods[$index];
    return $aFood;
  }

  public function getFoods()
  {
    $newFoods = $this->foods;
    return $newFoods;
  }

  public function numberOfFoods()
  {
    $number = count($this->foods);
    return $number;
  }

  public function hasFoods()
  {
    $has = $this->numberOfFoods() > 0;
    return $has;
  }

  public function indexOfFood($aFood)
  {
    $wasFound = false;
    $index = 0;
    foreach($this->foods as $food)
    {
      if ($food->equals($aFood))
      {
        $wasFound = true;
        break;
      }
      $index += 1;
    }
    $index = $wasFound ? $index : -1;
    return $index;
  }

  public static function minimumNumberOfFoods()
  {
    return 0;
  }

  public function addFood($aFood)
  {
    $wasAdded = false;
    if ($this->indexOfFood($aFood) !== -1) { return false; }
    $this->foods[] = $aFood;
    $wasAdded = true;
    return $wasAdded;
  }

  public function removeFood($aFood)
  {
    $wasRemoved = false;
    if ($this->indexOfFood($aFood) != -1)
    {
      unset($this->foods[$this->indexOfFood($aFood)]);
      $this->foods = array_values($this->foods);
      $wasRemoved = true;
    }
    return $wasRemoved;
  }

  public function addFoodAt($aFood, $index)
  {  
    $wasAdded = false;
    if($this->addFood($aFood))
    {
      if($index < 0 ) { $index = 0; }
      if($index > $this->numberOfFoods()) { $index = $this->numberOfFoods() - 1; }
      array_splice($this->foods, $this->indexOfFood($aFood), 1);
      array_splice($this->foods, $index, 0, array($aFood));
      $wasAdded = true;
    }
    return $wasAdded;
  }

  public function addOrMoveFoodAt($aFood, $index)
  {
    $wasAdded = false;
    if($this->indexOfFood($aFood) !== -1)
    {
      if($index < 0 ) { $index = 0; }
      if($index > $this->numberOfFoods()) { $index = $this->numberOfFoods() - 1; }
      array_splice($this->foods, $this->indexOfFood($aFood), 1);
      array_splice($this->foods, $index, 0, array($aFood));
      $wasAdded = true;
    } 
    else 
    {
      $wasAdded = $this->addFoodAt($aFood, $index);
    }
    return $wasAdded;
  }

  public function equals($compareTo)
  {
    return $this == $compareTo;
  }

  public function delete()
  {
    $this->foods = array();
  }

}
?>