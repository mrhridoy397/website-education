<?php
require_once(__dir__ . '/Db.php');
class GalaryModels extends Db
{
       /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function indexGalary()
    {
        $this->query("SELECT * FROM `table_galary`");
        $this->execute();

        $galary = $this->fetchAll();
        if (!empty($galary)) {
            $Response = array(
               $galary
            );
            return $Response;
        }
        return array(
          
        );
    }
    public function getgalary()
    {
        $this->query("SELECT * FROM `table_galarycategoris` ");
        $this->execute();
        $galary = $this->fetchAll();
        if (!empty($galary)) {
            return $galary;
        }
        return array();
    }
    /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function GalaryCreate(array $data)
    {
        $this->query("INSERT INTO `table_galary`(`categorisId`, `name`, `image`, `isActive`) VALUES (?,?,?,?)");
        $this->bind(1, $data['categorisId']);
        $this->bind(2, $data['name']);
        $this->bind(3, $data['image']);
        $this->bind(4, $data['isActive']);
        

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
    public function editGalary($id)
    {
        $this->query("SELECT * FROM `table_galary` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $galary = $this->fetch();
        if (!empty($galary)) {
              return  $galary; 
        }
    }


      /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function UpdateGalary(array $data): array
    {
        $this->query("UPDATE `table_galary` SET `categorisId`=?,`name`=?,`image`=?,`isActive`=? WHERE `id`=?");
        $this->bind(1, $data['categorisId']);
        $this->bind(2, $data['name']);
        $this->bind(3, $data['image']);
        $this->bind(4, $data['isActive']);
        $this->bind(5, $data['id']);

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


    public function deleteGalaryImage($id){
        $this->query("SELECT `image`FROM `table_galary` WHERE `id` = :id");
        $this->bind('id', $id);
        $this->execute();
        $image = $this->fetch();
        if ($image) {
            return $image;
        } else {
            return false;
        }
    }
        /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function deleteGalary($id): array
    {
        $this->query("DELETE FROM `table_galary` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' =>'Galary Delete successfully'
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
