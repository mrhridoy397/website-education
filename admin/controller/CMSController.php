<?php
require_once(__dir__ . '/controller.php');
require_once('./model/CMSModel.php');
require_once('./controller/UploadFile.php');
class CMSController extends Controller
{

    public $active = 'CMS'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new CMSModel();
    }
    
    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function getSlider(): array
    {
        return $this->Model->indexSlider();
    }
    /**
     * @param array
     * @return array|boolean
     * @desc Creates, and returns a user by calling the create method on the BatchModel...\
     **/
    public function createSlider($data, $file)
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
            'title' => $data['title'],
            'shortDescription' => $data['shortDescription'],
            'btnOne' => $data['btnOne'],
            'btnOneLink' => $data['btnOneLink'],
            'btnTwo' => $data['btnTwo'],
            'btnTwoLink' => $data['btnTwoLink'],
            'status' => $data['status'],
            'image' => $image,
        );
        $Response = $this->Model->SliderCreate($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data added successfully';
            header("location: ./SliderIndex.php");
            return $Response;
        }
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function Slideredit($id): array
    {
        return $this->Model->editSlider($id);
    }

    public function SliderUpdate(array $data, $file)
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
            'title' => $data['title'],
            'shortDescription' => $data['shortDescription'],
            'btnOne' => $data['btnOne'],
            'btnOneLink' => $data['btnOneLink'],
            'btnTwo' => $data['btnTwo'],
            'btnTwoLink' => $data['btnTwoLink'],
            'status' => $data['status'],
            'image' => $image
        );
        $Response = $this->Model->UpdateSlider($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: ./SliderIndex.php");
            return $Response;
        }
    }


    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function SliderDelete($id)
    {
        $image = $this->Model->deleteSliderImage($id);
        if($image['image'] != false){
            unlink($_SERVER['DOCUMENT_ROOT']."/education/".$image['image']);
        }

        $response = $this->Model->deleteSlider($id);
        if(!$response){
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location: ./SliderIndex.php");
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: ./SliderIndex.php");
            return $Response;
        }
    }

}
