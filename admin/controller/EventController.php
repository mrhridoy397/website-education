<?php
require_once(__dir__ . '/controller.php');
require_once('./model/EventModel.php');
require_once('./controller/UploadFile.php');
class EventController extends Controller
{

    public $active = 'Event'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new EventModels();
    }
    
    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function getEvent(): array
    {
        return $this->Model->indexEvent();
    }
    /**
     * @param array
     * @return array|boolean
     * @desc Creates, and returns a user by calling the create method on the BatchModel...\
     **/
    public function createEvent($data, $file)
    {
       if($file['image'] != ""){
         $fileName = new upload();
        $fileName->startupload($file);
        $fileName->uploadfile();
        $image  =  $fileName->dbupload;
       }
       else{
        $image = "";
       }

      
        $Payload = array(
            'eventName' => $data['eventName'],
            'eventStartDate' => $data['eventStartDate'],
            'eventEndDate' => $data['eventEndDate'],
            'vanue' => $data['vanue'],
            'organizer' => $data['organizer'],
            'sponser' => $data['sponser'],
            'eventDetails' => $data['eventDetails'],
            'image' => $image,
            'isActive' => $data['isActive'],

            
        );
        $Response = $this->Model->EventCreate($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data added successfully';
            header("location: ./EventIndex.php");
            return $Response;
        }
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function Eventedit($id): array
    {
        return $this->Model->editEvent($id);
    }

    public function EventUpdate(array $data, $file)
    {
        if ($file['image']['name'] == "") {
            $image = $data['oldImage'];
        } 
        else {
            if ($data['oldImage'] != "") {
                unlink($_SERVER['DOCUMENT_ROOT'] . "/education/" . $data['oldImage']);
            }
            $fileName = new upload();
            $fileName->startupload($file);
            $fileName->uploadfile();
            $image  =  $fileName->dbupload;
        }

       
        $Payload = array(
            'id' => $data['id'],
            'eventName' => $data['eventName'],
            'eventStartDate' => $data['eventStartDate'],
            'eventEndDate' => $data['eventEndDate'],
            'vanue' => $data['vanue'],
            'organizer' => $data['organizer'],
            'sponser' => $data['sponser'],
            'eventDetails' => $data['eventDetails'],
            'image' => $image,
            'isActive' => $data['isActive'],
        );
        $Response = $this->Model->UpdateEvent($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: ./EventIndex.php");
            return $Response;
        }
    }


    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function EventDelete($id)
    {
        $image = $this->Model->deleteEventImage($id);
        if($image['image'] != false){
            unlink($_SERVER['DOCUMENT_ROOT']."/education/".$image['image']);
        }

        $response = $this->Model->deleteEvent($id);
        if(!$response){
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location: ./EventIndex.php");
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: ./EventIndex.php");
            return $Response;
        }
    }

}
