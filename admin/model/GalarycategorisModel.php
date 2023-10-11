<?php
require_once(__dir__ . '/Db.php');
class GalarycategorisModel extends Db
{
       /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function indexGalarycategoris()
    {
        $this->query("SELECT * FROM `table_galarycategoris`");
        $this->execute();

        $galarycategoris = $this->fetchAll();
        if (!empty($galarycategoris)) {
            $Response = array(
               $galarycategoris
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
    public function GalarycategorisCreate(array $data)
    {
        $this->query("INSERT INTO `table_galarycategoris`( `categorisname`, `image`, `isActive`) VALUES (?,?,?)");
        $this->bind(1, $data['categorisname']);
        $this->bind(2, $data['image']);
        $this->bind(3, $data['isActive']);
        

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
    public function editGalarycategoris($id)
    {
        $this->query("SELECT * FROM `table_galarycategoris` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $galarycategoris = $this->fetch();
        if (!empty($galarycategoris)) {
              return  $galarycategoris; 
        }
    }


      /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function UpdateGalarycategoris(array $data): array
    {
        $this->query("UPDATE `table_galarycategoris` SET `categorisname`=?,`image`=?,`isActive`=? WHERE  `id`=?");
        $this->bind(1, $data['categorisname']);
        $this->bind(2, $data['image']);
        $this->bind(3, $data['isActive']);
        $this->bind(4, $data['id']);

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


    public function deleteGalarycategorisImage($id){
        $this->query("SELECT `image`FROM `table_galarycategoris` WHERE `id` = :id");
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
    public function deleteGalarycategoris($id): array
    {
        $this->query("DELETE FROM `table_galarycategoris` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' =>'Galarycategoris Delete successfully'
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
