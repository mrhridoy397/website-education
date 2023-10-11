<?php
require_once(__dir__ . '/Db.php');

class subscribeModel extends Db
{


    public function index()
    {
        $this->query("SELECT * FROM `subscribe`");
        $this->execute();
        $subscribe = $this->fetchAll();
        if (!empty($subscribe)) {
        
            return $subscribe;
        }
        return array();
    }
   
}
