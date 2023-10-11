<?php
require_once(__dir__ . '/Db.php');

class SettingModel extends Db
{



    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function edit()
    {
        $this->query("SELECT * FROM `settings`");
        $this->execute();

        $settings = $this->fetchAll();
        if (!empty($settings)) {

            return $settings;
        }
        return array();
    }


    /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function Update(array $data)
    {
        foreach ($data as $key => $value) {
            $this->query("UPDATE `settings` SET `description`=?  WHERE `title`= ?");
            $this->bind(1, $value);
            $this->bind(2, $key);
            $this->execute();
        }

            return true;
       
    }
}
