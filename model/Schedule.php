<?php
/*PLEASE DO NOT EDIT THIS CODE*/
/*This code was generated using the UMPLE 1.24.0-edef018 modeling language!*/

class Schedule
{

  //------------------------
  // MEMBER VARIABLES
  //------------------------

  //Schedule Attributes
  private $id;
  private $uid;
  private $start;
  private $end;

  //------------------------
  // CONSTRUCTOR
  //------------------------

  public function __construct($aId, $aUid, $aStart, $aEnd)
  {
    $this->id = $aId;
    $this->uid = $aUid;
    $this->start = $aStart;
    $this->end = $aEnd;
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

  public function setUid($aUid)
  {
    $wasSet = false;
    $this->uid = $aUid;
    $wasSet = true;
    return $wasSet;
  }

  public function setStart($aStart)
  {
    $wasSet = false;
    $this->start = $aStart;
    $wasSet = true;
    return $wasSet;
  }

  public function setEnd($aEnd)
  {
    $wasSet = false;
    $this->end = $aEnd;
    $wasSet = true;
    return $wasSet;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getUid()
  {
    return $this->uid;
  }

  public function getStart()
  {
    return $this->start;
  }

  public function getEnd()
  {
    return $this->end;
  }

  public function equals($compareTo)
  {
    return $this == $compareTo;
  }

  public function delete()
  {}

}
?>