<?php
require_once(__dir__ . '/Db.php');
class EventModels extends Db
{
       /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function indexEvent()
    {
        $this->query("SELECT * FROM `table_event`");
        $this->execute();

        $event = $this->fetchAll();
        if (!empty($event)) {
            $Response = array(
               $event
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
    public function EventCreate(array $data)
    {
        $this->query("INSERT INTO `table_event`( `eventName`, `eventStartDate`, `eventEndDate`, `vanue`, `organizer`, `sponser`, `eventDetails`, `image`, `isActive`) VALUES (?,?,?,?,?,?,?,?,?)");
        $this->bind(1, $data['eventName']);
        $this->bind(2, $data['eventStartDate']);
        $this->bind(3, $data['eventEndDate']);
        $this->bind(4, $data['vanue']);
        $this->bind(5, $data['organizer']);
        $this->bind(6, $data['sponser']);
        $this->bind(7, $data['eventDetails']);
        $this->bind(8, $data['image']);
        $this->bind(9, $data['isActive']);
        

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
    public function editEvent($id)
    {
        $this->query("SELECT * FROM `table_event` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $event = $this->fetch();
        if (!empty($event)) {
              return  $event; 
        }
    }


      /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function UpdateEvent(array $data): array
    {
        $this->query("UPDATE `table_event` SET`eventName`=?,`eventStartDate`=?,`eventEndDate`=?,`vanue`=?,`organizer`=?,`sponser`=?,`eventDetails`=?,`image`=?,`isActive`=? WHERE `id`=?");
        $this->bind(1, $data['eventName']);
        $this->bind(2, $data['eventStartDate']);
        $this->bind(3, $data['eventEndDate']);
        $this->bind(4, $data['vanue']);
        $this->bind(5, $data['organizer']);
        $this->bind(6, $data['sponser']);
        $this->bind(7, $data['eventDetails']);
        $this->bind(8, $data['image']);
        $this->bind(9, $data['isActive']);
        $this->bind(10, $data['id']);

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


    public function deleteEventImage($id){
        $this->query("SELECT `image`FROM `table_event` WHERE `id` = :id");
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
    public function deleteEvent($id): array
    {
        $this->query("DELETE FROM `table_event` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' =>'Event Delete successfully'
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
