<?php
/*PLEASE DO NOT EDIT THIS CODE*/
/*This code was generated using the UMPLE 1.24.0-edef018 modeling language!*/

class Manager
{

  //------------------------
  // STATIC VARIABLES
  //------------------------

  private static $theInstance = null;

  //------------------------
  // MEMBER VARIABLES
  //------------------------

  //Manager Associations
  private $staffs;
  private $schedules;
  private $equipments;
  private $foods;
  private $menus;
  private $orders;

  //------------------------
  // CONSTRUCTOR
  //------------------------

  private function __construct()
  {
    $this->staffs = array();
    $this->schedules = array();
    $this->equipments = array();
    $this->foods = array();
    $this->menus = array();
    $this->orders = array();
  }

  public static function getInstance()
  {
    if(self::$theInstance == null)
    {
      self::$theInstance = new Manager();
    }
    return self::$theInstance;
  }

  //------------------------
  // INTERFACE
  //------------------------

  public function getStaff_index($index)
  {
    $aStaff = $this->staffs[$index];
    return $aStaff;
  }

  public function getStaffs()
  {
    $newStaffs = $this->staffs;
    return $newStaffs;
  }

  public function numberOfStaffs()
  {
    $number = count($this->staffs);
    return $number;
  }

  public function hasStaffs()
  {
    $has = $this->numberOfStaffs() > 0;
    return $has;
  }

  public function indexOfStaff($aStaff)
  {
    $wasFound = false;
    $index = 0;
    foreach($this->staffs as $staff)
    {
      if ($staff->equals($aStaff))
      {
        $wasFound = true;
        break;
      }
      $index += 1;
    }
    $index = $wasFound ? $index : -1;
    return $index;
  }

  public function getSchedule_index($index)
  {
    $aSchedule = $this->schedules[$index];
    return $aSchedule;
  }

  public function getSchedules()
  {
    $newSchedules = $this->schedules;
    return $newSchedules;
  }

  public function numberOfSchedules()
  {
    $number = count($this->schedules);
    return $number;
  }

  public function hasSchedules()
  {
    $has = $this->numberOfSchedules() > 0;
    return $has;
  }

  public function indexOfSchedule($aSchedule)
  {
    $wasFound = false;
    $index = 0;
    foreach($this->schedules as $schedule)
    {
      if ($schedule->equals($aSchedule))
      {
        $wasFound = true;
        break;
      }
      $index += 1;
    }
    $index = $wasFound ? $index : -1;
    return $index;
  }

  public function getEquipment_index($index)
  {
    $aEquipment = $this->equipments[$index];
    return $aEquipment;
  }

  public function getEquipments()
  {
    $newEquipments = $this->equipments;
    return $newEquipments;
  }

  public function numberOfEquipments()
  {
    $number = count($this->equipments);
    return $number;
  }

  public function hasEquipments()
  {
    $has = $this->numberOfEquipments() > 0;
    return $has;
  }

  public function indexOfEquipment($aEquipment)
  {
    $wasFound = false;
    $index = 0;
    foreach($this->equipments as $equipment)
    {
      if ($equipment->equals($aEquipment))
      {
        $wasFound = true;
        break;
      }
      $index += 1;
    }
    $index = $wasFound ? $index : -1;
    return $index;
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

  public function getOrder_index($index)
  {
    $aOrder = $this->orders[$index];
    return $aOrder;
  }

  public function getOrders()
  {
    $newOrders = $this->orders;
    return $newOrders;
  }

  public function numberOfOrders()
  {
    $number = count($this->orders);
    return $number;
  }

  public function hasOrders()
  {
    $has = $this->numberOfOrders() > 0;
    return $has;
  }

  public function indexOfOrder($aOrder)
  {
    $wasFound = false;
    $index = 0;
    foreach($this->orders as $order)
    {
      if ($order->equals($aOrder))
      {
        $wasFound = true;
        break;
      }
      $index += 1;
    }
    $index = $wasFound ? $index : -1;
    return $index;
  }

  public static function minimumNumberOfStaffs()
  {
    return 0;
  }

  public function addStaff($aStaff)
  {
    $wasAdded = false;
    if ($this->indexOfStaff($aStaff) !== -1) { return false; }
    $this->staffs[] = $aStaff;
    $wasAdded = true;
    return $wasAdded;
  }

  public function removeStaff($aStaff)
  {
    $wasRemoved = false;
    if ($this->indexOfStaff($aStaff) != -1)
    {
      unset($this->staffs[$this->indexOfStaff($aStaff)]);
      $this->staffs = array_values($this->staffs);
      $wasRemoved = true;
    }
    return $wasRemoved;
  }

  public function addStaffAt($aStaff, $index)
  {  
    $wasAdded = false;
    if($this->addStaff($aStaff))
    {
      if($index < 0 ) { $index = 0; }
      if($index > $this->numberOfStaffs()) { $index = $this->numberOfStaffs() - 1; }
      array_splice($this->staffs, $this->indexOfStaff($aStaff), 1);
      array_splice($this->staffs, $index, 0, array($aStaff));
      $wasAdded = true;
    }
    return $wasAdded;
  }

  public function addOrMoveStaffAt($aStaff, $index)
  {
    $wasAdded = false;
    if($this->indexOfStaff($aStaff) !== -1)
    {
      if($index < 0 ) { $index = 0; }
      if($index > $this->numberOfStaffs()) { $index = $this->numberOfStaffs() - 1; }
      array_splice($this->staffs, $this->indexOfStaff($aStaff), 1);
      array_splice($this->staffs, $index, 0, array($aStaff));
      $wasAdded = true;
    } 
    else 
    {
      $wasAdded = $this->addStaffAt($aStaff, $index);
    }
    return $wasAdded;
  }

  public static function minimumNumberOfSchedules()
  {
    return 0;
  }

  public function addSchedule($aSchedule)
  {
    $wasAdded = false;
    if ($this->indexOfSchedule($aSchedule) !== -1) { return false; }
    $this->schedules[] = $aSchedule;
    $wasAdded = true;
    return $wasAdded;
  }

  public function removeSchedule($aSchedule)
  {
    $wasRemoved = false;
    if ($this->indexOfSchedule($aSchedule) != -1)
    {
      unset($this->schedules[$this->indexOfSchedule($aSchedule)]);
      $this->schedules = array_values($this->schedules);
      $wasRemoved = true;
    }
    return $wasRemoved;
  }

  public function addScheduleAt($aSchedule, $index)
  {  
    $wasAdded = false;
    if($this->addSchedule($aSchedule))
    {
      if($index < 0 ) { $index = 0; }
      if($index > $this->numberOfSchedules()) { $index = $this->numberOfSchedules() - 1; }
      array_splice($this->schedules, $this->indexOfSchedule($aSchedule), 1);
      array_splice($this->schedules, $index, 0, array($aSchedule));
      $wasAdded = true;
    }
    return $wasAdded;
  }

  public function addOrMoveScheduleAt($aSchedule, $index)
  {
    $wasAdded = false;
    if($this->indexOfSchedule($aSchedule) !== -1)
    {
      if($index < 0 ) { $index = 0; }
      if($index > $this->numberOfSchedules()) { $index = $this->numberOfSchedules() - 1; }
      array_splice($this->schedules, $this->indexOfSchedule($aSchedule), 1);
      array_splice($this->schedules, $index, 0, array($aSchedule));
      $wasAdded = true;
    } 
    else 
    {
      $wasAdded = $this->addScheduleAt($aSchedule, $index);
    }
    return $wasAdded;
  }

  public static function minimumNumberOfEquipments()
  {
    return 0;
  }

  public function addEquipment($aEquipment)
  {
    $wasAdded = false;
    if ($this->indexOfEquipment($aEquipment) !== -1) { return false; }
    $this->equipments[] = $aEquipment;
    $wasAdded = true;
    return $wasAdded;
  }

  public function removeEquipment($aEquipment)
  {
    $wasRemoved = false;
    if ($this->indexOfEquipment($aEquipment) != -1)
    {
      unset($this->equipments[$this->indexOfEquipment($aEquipment)]);
      $this->equipments = array_values($this->equipments);
      $wasRemoved = true;
    }
    return $wasRemoved;
  }

  public function addEquipmentAt($aEquipment, $index)
  {  
    $wasAdded = false;
    if($this->addEquipment($aEquipment))
    {
      if($index < 0 ) { $index = 0; }
      if($index > $this->numberOfEquipments()) { $index = $this->numberOfEquipments() - 1; }
      array_splice($this->equipments, $this->indexOfEquipment($aEquipment), 1);
      array_splice($this->equipments, $index, 0, array($aEquipment));
      $wasAdded = true;
    }
    return $wasAdded;
  }

  public function addOrMoveEquipmentAt($aEquipment, $index)
  {
    $wasAdded = false;
    if($this->indexOfEquipment($aEquipment) !== -1)
    {
      if($index < 0 ) { $index = 0; }
      if($index > $this->numberOfEquipments()) { $index = $this->numberOfEquipments() - 1; }
      array_splice($this->equipments, $this->indexOfEquipment($aEquipment), 1);
      array_splice($this->equipments, $index, 0, array($aEquipment));
      $wasAdded = true;
    } 
    else 
    {
      $wasAdded = $this->addEquipmentAt($aEquipment, $index);
    }
    return $wasAdded;
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

  public static function minimumNumberOfOrders()
  {
    return 0;
  }

  public function addOrder($aOrder)
  {
    $wasAdded = false;
    if ($this->indexOfOrder($aOrder) !== -1) { return false; }
    $this->orders[] = $aOrder;
    $wasAdded = true;
    return $wasAdded;
  }

  public function removeOrder($aOrder)
  {
    $wasRemoved = false;
    if ($this->indexOfOrder($aOrder) != -1)
    {
      unset($this->orders[$this->indexOfOrder($aOrder)]);
      $this->orders = array_values($this->orders);
      $wasRemoved = true;
    }
    return $wasRemoved;
  }

  public function addOrderAt($aOrder, $index)
  {  
    $wasAdded = false;
    if($this->addOrder($aOrder))
    {
      if($index < 0 ) { $index = 0; }
      if($index > $this->numberOfOrders()) { $index = $this->numberOfOrders() - 1; }
      array_splice($this->orders, $this->indexOfOrder($aOrder), 1);
      array_splice($this->orders, $index, 0, array($aOrder));
      $wasAdded = true;
    }
    return $wasAdded;
  }

  public function addOrMoveOrderAt($aOrder, $index)
  {
    $wasAdded = false;
    if($this->indexOfOrder($aOrder) !== -1)
    {
      if($index < 0 ) { $index = 0; }
      if($index > $this->numberOfOrders()) { $index = $this->numberOfOrders() - 1; }
      array_splice($this->orders, $this->indexOfOrder($aOrder), 1);
      array_splice($this->orders, $index, 0, array($aOrder));
      $wasAdded = true;
    } 
    else 
    {
      $wasAdded = $this->addOrderAt($aOrder, $index);
    }
    return $wasAdded;
  }

  public function equals($compareTo)
  {
    return $this == $compareTo;
  }

  public function delete()
  {
    $this->staffs = array();
    $this->schedules = array();
    $this->equipments = array();
    $this->foods = array();
    $this->menus = array();
    $this->orders = array();
  }

}
?>