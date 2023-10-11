<?php
require_once(__dir__ . '/Db.php');

class contactModel extends Db
{


    public function index()
    {
        $this->query("SELECT * FROM `massage`");
        $this->execute();
        $student = $this->fetchAll();
        if (!empty($student)) {
        
            return $student;
        }
        return array();
    }
    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function edit($id): array
    {
        $this->query("SELECT * FROM `massage` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $student = $this->fetch();
        if (!empty($student)) {

            return $student;
        }
        return array(
            'data' => []
        );
    }


    /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function Update(array $data): array
    {
        
       
        $this->query("UPDATE `massage` SET `name`=?,`email`=?,`subject`=?,`massage`=?,`status`=?,`image`=? WHERE `id`=?");
        $this->bind(1, $data['name']);
        $this->bind(2, $data['email']);
        $this->bind(3, $data['subject']);
        $this->bind(4, $data['massage']);
        $this->bind(5, $data['status']);
        $this->bind(6, $data['image']);
        $this->bind(7, $data['id']);

        
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
    public function deleteImage($id){
        $this->query("SELECT `image`FROM `massage` WHERE `id` = :id");
        $this->bind('id', $id);
        $this->execute();
        $image = $this->fetch();
        if ($image) {
            return $image;
        } else {
            return false;
        }
    }

    public function delete($id): array
    {
        
        $this->query("DELETE FROM `massage` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' => 'Massage Delete successfully'
            );
            return $Response;
        } else {
            $Response = array(
                'status' => false,
                'msg' => 'Oops! somthing Wrong, Place try again'
            );
            return $Response;
        }
    }

    public function StatusChange($data){
        $this->query("UPDATE `massage` SET `status` = :status WHERE `id` = :id");
        $this->bind(':status', $data['status']);
        $this->bind(':id', $data['id']);
        $this->execute();

        $slider = $this->fetchAll();
        if (!empty($slider)) {
            return  $slider;
        }
        return False;
    }
}
