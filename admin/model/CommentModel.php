<?php
require_once(__dir__ . '/Db.php');

class CommentModel extends Db
{


    public function index()
    {
        $this->query("SELECT * FROM `comment`");
        $this->execute();
        $comments = $this->fetchAll();
        if (!empty($comments)) {
        
            return $comments;
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
        $this->query("SELECT * FROM `comment` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $comments = $this->fetch();
        if (!empty($comments)) {

            return $comments;
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
        
       
        $this->query("UPDATE `comment` SET`courseid`=?,`name`=?,`email`=?,`comment`=?,`status`=?,`image`=? WHERE `id`=?");
        $this->bind(1, $data['courseid']);
        $this->bind(2, $data['name']);
        $this->bind(3, $data['email']);
        $this->bind(4, $data['comment']);
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
        $this->query("SELECT `image`FROM `comment` WHERE `id` = :id");
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
        
        $this->query("DELETE FROM `comment` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' => 'Comment Delete successfully'
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

    public function changeStatus($data){
        $this->query("UPDATE `comment` SET `status` = :status WHERE `id` = :id");
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
