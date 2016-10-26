<?php
/*PLEASE DO NOT EDIT THIS CODE*/
/*This code was generated using the UMPLE 1.24.0-edef018 modeling language!*/

class Staff
{

  //------------------------
  // MEMBER VARIABLES
  //------------------------

  //Staff Attributes
  private $id;
  private $name;
  private $role;
  private $gender;
  private $age;
  private $tel;

  //Staff Associations
  private $schedules;

  //------------------------
  // CONSTRUCTOR
  //------------------------

  public function __construct($aId, $aName, $aRole, $aGender, $aAge, $aTel)
  {
    $this->id = $aId;
    $this->name = $aName;
    $this->role = $aRole;
    $this->gender = $aGender;
    $this->age = $aAge;
    $this->tel = $aTel;
    $this->schedules = array();
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

  public function setRole($aRole)
  {
    $wasSet = false;
    $this->role = $aRole;
    $wasSet = true;
    return $wasSet;
  }

  public function setGender($aGender)
  {
    $wasSet = false;
    $this->gender = $aGender;
    $wasSet = true;
    return $wasSet;
  }

  public function setAge($aAge)
  {
    $wasSet = false;
    $this->age = $aAge;
    $wasSet = true;
    return $wasSet;
  }

  public function setTel($aTel)
  {
    $wasSet = false;
    $this->tel = $aTel;
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

  public function getRole()
  {
    return $this->role;
  }

  public function getGender()
  {
    return $this->gender;
  }

  public function getAge()
  {
    return $this->age;
  }

  public function getTel()
  {
    return $this->tel;
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

  public function equals($compareTo)
  {
    return $this == $compareTo;
  }

  public function delete()
  {
    $this->schedules = array();
  }

}
?>