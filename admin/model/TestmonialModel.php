<?php
require_once(__dir__ . '/Db.php');
class TestmonialModel extends Db
{
       /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function indexTestmonial()
    {
        $this->query("SELECT * FROM `testmonial`");
        $this->execute();

        $testmonial = $this->fetchAll();
        if (!empty($testmonial)) {
            $Response = array(
               $testmonial
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
    public function TestmonialCreate(array $data)
    {
        $this->query("INSERT INTO `testmonial`( `massage`, `name`, `class`, `image`, `status`) VALUES (?,?,?,?,?)");
        $this->bind(1, $data['massage']);
        $this->bind(2, $data['name']);
        $this->bind(3, $data['class']);
        $this->bind(4, $data['image']);
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
    public function editTestmonial($id)
    {
        $this->query("SELECT * FROM `testmonial` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $testmonial = $this->fetch();
        if (!empty($testmonial)) {
              return  $testmonial; 
        }
    }


      /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function UpdateTestmonial(array $data): array
    {
        $this->query("UPDATE `testmonial` SET `massage`=?,`name`=?,`class`=?,`image`=?,`status`=? WHERE `id`=?");
        $this->bind(1, $data['massage']);
        $this->bind(2, $data['name']);
        $this->bind(3, $data['class']);
        $this->bind(4, $data['image']);
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


    public function deleteTestmonialImage($id){
        $this->query("SELECT `image`FROM `testmonial` WHERE `id` = :id");
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
    public function deleteTestmonial($id): array
    {
        $this->query("DELETE FROM `testmonial` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' =>'News Delete successfully'
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
