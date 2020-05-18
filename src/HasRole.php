<?php
namespace HasRoles;

trait HasRole
{
  public function getRoleData()
  {
    if (isset($this->roleFieldName)) {
      return $this->roleFieldName;
    }

    return 'roles';
  }

  public function hasRole($rolename)
  {
    if (isset($this->getRoleFieldAttribute()['is'][$rolename])) {
      return true;
    }

    return false;
  }

  public function getRoleFieldAttribute()
  {
    $data = $this->{$this->getRoleData()};

    if (is_array($data)) {
      return $data;
    }
    
    return json_decode($data, true);
  }
}