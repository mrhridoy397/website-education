<?php
require_once(__dir__ . '/Db.php');

class onlineAdmissionModel extends Db
{
    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function index()
    {
        $this->query("SELECT * FROM `online_admission`");
        $this->execute();
        $student = $this->fetchAll();
        if (!empty($student)) {
        
            return $student;
        }
        return array();
    }


    public function getCourse()
    {
        $this->query("SELECT * FROM `courses`");
        $this->execute();
        $teacher = $this->fetchAll();
        if (!empty($teacher)) {
            return $teacher;
        }
        return array(
            'data' => []
        );
    }

    public function getSelectCourse($id){
        $this->query("SELECT `courseName` FROM `courses` where `id` = :id");
        $this->bind(':id', $id);
        $this->execute();
        $courseName = $this->fetch();
        if (!empty($courseName)) {
            return $courseName;
        }
        return array(
            'data' => []
        );
    }

    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function edit($id): array
    {
        $this->query("SELECT * FROM `online_admission` WHERE`id` = :id");
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
       
        $this->query("UPDATE `online_admission` SET `courseId`=?,`sname`=?,`phone`=?,`email`=?,`type`=?,`status`=? WHERE `id`=?");
        $this->bind(1, $data['courseId']);
        $this->bind(2, $data['sname']);
        $this->bind(3, $data['phone']);
        $this->bind(4, $data['email']);
        $this->bind(5, $data['type']);
        $this->bind(6, $data['status']);
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
    public function delete($id): array
    {
        
        $this->query("DELETE FROM `online_admission` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' => 'student Delete successfully'
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
}
