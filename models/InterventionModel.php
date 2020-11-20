<?php
class InterventionModel extends Model
{

    public function __construct()
    {
        $this->table = "intervention";
        $this->getConnection();
    }
}
