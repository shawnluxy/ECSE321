<?php
/*PLEASE DO NOT EDIT THIS CODE*/
/*This code was generated using the UMPLE 1.24.0-edef018 modeling language!*/

class Order
{

  //------------------------
  // MEMBER VARIABLES
  //------------------------

  //Order Attributes
  private $id;
  private $time;
  private $status;

  //Order Associations
  private $menus;

  //------------------------
  // CONSTRUCTOR
  //------------------------

  public function __construct($aId, $aTime, $aStatus)
  {
    $this->id = $aId;
    $this->time = $aTime;
    $this->status = $aStatus;
    $this->menus = array();
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

  public function setTime($aTime)
  {
    $wasSet = false;
    $this->time = $aTime;
    $wasSet = true;
    return $wasSet;
  }

  public function setStatus($aStatus)
  {
    $wasSet = false;
    $this->status = $aStatus;
    $wasSet = true;
    return $wasSet;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getTime()
  {
    return $this->time;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function isStatus()
  {
    return $this->status;
  }

  public function getMenus_index($index)
  {
    $aMenus = $this->menus[$index];
    return $aMenus;
  }

  public function getMenus()
  {
    $newMenus = $this->menus;
    return $newMenus;
  }

  public function numberOfMenus()
  {
    $number = count($this->menus);
    return $number;
  }

  public function hasMenus()
  {
    $has = $this->numberOfMenus() > 0;
    return $has;
  }

  public function indexOfMenus($aMenus)
  {
    $wasFound = false;
    $index = 0;
    foreach($this->menus as $menus)
    {
      if ($menus->equals($aMenus))
      {
        $wasFound = true;
        break;
      }
      $index += 1;
    }
    $index = $wasFound ? $index : -1;
    return $index;
  }

  public static function minimumNumberOfMenus()
  {
    return 0;
  }

  public function addMenus($aMenus)
  {
    $wasAdded = false;
    if ($this->indexOfMenus($aMenus) !== -1) { return false; }
    $this->menus[] = $aMenus;
    $wasAdded = true;
    return $wasAdded;
  }

  public function removeMenus($aMenus)
  {
    $wasRemoved = false;
    if ($this->indexOfMenus($aMenus) != -1)
    {
      unset($this->menus[$this->indexOfMenus($aMenus)]);
      $this->menus = array_values($this->menus);
      $wasRemoved = true;
    }
    return $wasRemoved;
  }

  public function addMenusAt($aMenus, $index)
  {  
    $wasAdded = false;
    if($this->addMenus($aMenus))
    {
      if($index < 0 ) { $index = 0; }
      if($index > $this->numberOfMenus()) { $index = $this->numberOfMenus() - 1; }
      array_splice($this->menus, $this->indexOfMenus($aMenus), 1);
      array_splice($this->menus, $index, 0, array($aMenus));
      $wasAdded = true;
    }
    return $wasAdded;
  }

  public function addOrMoveMenusAt($aMenus, $index)
  {
    $wasAdded = false;
    if($this->indexOfMenus($aMenus) !== -1)
    {
      if($index < 0 ) { $index = 0; }
      if($index > $this->numberOfMenus()) { $index = $this->numberOfMenus() - 1; }
      array_splice($this->menus, $this->indexOfMenus($aMenus), 1);
      array_splice($this->menus, $index, 0, array($aMenus));
      $wasAdded = true;
    } 
    else 
    {
      $wasAdded = $this->addMenusAt($aMenus, $index);
    }
    return $wasAdded;
  }

  public function equals($compareTo)
  {
    return $this == $compareTo;
  }

  public function delete()
  {
    $this->menus = array();
  }

}
?>