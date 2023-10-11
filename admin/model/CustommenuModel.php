<?php
require_once(__dir__ . '/Db.php');
class CastommenuModel extends Db
{
       /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function indexCastommenu()
    {
        $this->query("SELECT * FROM `table_custommenu`");
        $this->execute();

        $castommenu = $this->fetchAll();
        if (!empty($castommenu)) {
            $Response = array(
               $castommenu
            );
            return $Response;
        }
        return array(
          
        );
    }

    /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function CastommenuCreate(array $data)
    {
        $this->query("INSERT INTO `table_custommenu`( `ManuName`, `Url`, `Target`, `position`,`status`) VALUES (?,?,?,?,?)");
        $this->bind(1, $data['ManuName']);
        $this->bind(2, $data['Url']);
        $this->bind(3, $data['Target']);
        $this->bind(4, $data['position']);
        $this->bind(5, $data['status']);
        

        if ($this->execute()) {
            $Response = array(
                'status' => true,
            );
            return $Response;
        } else {
            $Response = array(
                'status' => false
            );
            return $Response;
        }
    }

 


      /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function editCastommenu($id)
    {
        $this->query("SELECT * FROM `table_custommenu` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $custommenu = $this->fetch();
        if (!empty($custommenu)) {
              return  $custommenu; 
        }
    }


      /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function UpdateCastommenu(array $data): array
    {
        $this->query("UPDATE `table_custommenu` SET `ManuName`=?,`Url`=?,`Target`=?,`position`=?,`status`=?  WHERE `id`=?");
        $this->bind(1, $data['ManuName']);
        $this->bind(2, $data['Url']);
        $this->bind(3, $data['Target']);
        $this->bind(4, $data['position']);
        $this->bind(5, $data['status']);
        $this->bind(6, $data['id']);

        if ($this->execute()) {
            $Response = array(
                'status' => true,
            );
            return $Response;
        } else {
            $Response = array(
                'status' => false
            );
            return $Response;
        }
    }


   
        /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function deleteCustommenu($id): array
    {
        $this->query("DELETE FROM `table_custommenu` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' =>'Custommenu Delete successfully'
            );
            return $Response;
        } else {
            $Response = array(
                'status' => false
            );
            return $Response;
        }
    }
}
