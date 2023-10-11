<?php
require_once(__dir__ . '/controller.php');
require_once('./model/TestmonialModel.php');
require_once('./controller/UploadFile.php');
class TestmonialController extends Controller
{

    public $active = 'Testmonial'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new TestmonialModel();
    }
    
    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function getTestmonial(): array
    {
        return $this->Model->indexTestmonial();
    }
    /**
     * @param array
     * @return array|boolean
     * @desc Creates, and returns a user by calling the create method on the BatchModel...\
     **/
    public function createTestmonial($data, $file)
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
            'massage' => $data['massage'],
            'name' => $data['name'],
            'class' => $data['class'],
            'image' => $image,
            'status' => $data['status'],

            
        );
        $Response = $this->Model->TestmonialCreate($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data added successfully';
            header("location: ./TestmonialIndex.php");
            return $Response;
        }
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function Testmonialedit($id): array
    {
        return $this->Model->editTestmonial($id);
    }

    public function TestmonialUpdate(array $data, $file)
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
            'massage' => $data['massage'],
            'name' => $data['name'],
            'class' => $data['class'],
            'image' => $image,
            'status' => $data['status'],
        );
        $Response = $this->Model->UpdateTestmonial($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: ./TestmonialIndex.php");
            return $Response;
        }
    }


    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function TestmonialDelete($id)
    {
        $image = $this->Model->deleteTestmonialImage($id);
        if($image['image'] != false){
            unlink($_SERVER['DOCUMENT_ROOT']."/education/".$image['image']);
        }

        $response = $this->Model->deleteTestmonial($id);
        if(!$response){
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location: ./TestmonialIndex.php");
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: ./TestmonialIndex.php");
            return $Response;
        }
    }

}
