<?php
require_once(__dir__ . '/Db.php');
class CustomPageModel extends Db
{
       /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function indexCustomPage()
    {
        $this->query("SELECT * FROM `custompage`");
        $this->execute();

        $custompage = $this->fetchAll();
        if (!empty($custompage)) {
            $Response = array(
               $custompage
            );
            return $Response;
        }
        return array(
          
        );
    }

    public function getCustomPage()
    {
        $this->query("SELECT * FROM `table_custommenu`");
        $this->execute();
        $custompage = $this->fetchAll();
        if (!empty($custompage)) {
            return $custompage;
        }
        return array();
    }
    /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function CustomPageCreate(array $data)
    {
        $this->query("INSERT INTO `custompage`(`menuid`, `title`, `description`, `image`, `status`, `meta_key`, `meta_description`) VALUES (?,?,?,?,?,?,?)");
        $this->bind(1, $data['menuid']);
        $this->bind(2, $data['title']);
        $this->bind(3, $data['description']);
        $this->bind(4, $data['image']);
        $this->bind(5, $data['status']);
        $this->bind(6, $data['meta_key']);
        $this->bind(7, $data['meta_description']);
        

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
    public function editCustomPage($id)
    {
        $this->query("SELECT * FROM `custompage` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $custompage = $this->fetch();
        if (!empty($custompage)) {
              return  $custompage; 
        }
    }


      /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function UpdateCustomPage(array $data): array
    {
        $this->query("UPDATE `custompage` SET `menuid`=?,`title`=?,`description`=?,`image`=?,`status`=?,`meta_key`=?,`meta_description`=?  WHERE `id`=?");
        $this->bind(1, $data['menuid']);
        $this->bind(2, $data['title']);
        $this->bind(3, $data['description']);
        $this->bind(4, $data['image']);
        $this->bind(5, $data['status']);
        $this->bind(6, $data['meta_key']);
        $this->bind(7, $data['meta_description']);
        $this->bind(8, $data['id']);

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


    public function deleteCustomPageImage($id){
        $this->query("SELECT `image`FROM `custompage` WHERE `id` = :id");
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
    public function deleteCustomPage($id): array
    {
        $this->query("DELETE FROM `custompage` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' =>'CustomPage Delete successfully'
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
