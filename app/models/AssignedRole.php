<?php

class AssignedRole extends \Eloquent
{
    public function user()
    {
        return $this->belongsTo('User');
    }

    public function role()
    {
        return $this->belongsTo('Role');
    }
}
