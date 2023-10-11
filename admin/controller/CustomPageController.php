<?php
require_once(__dir__ . '/controller.php');
require_once('./model/CustomPageModel.php');
require_once('./controller/UploadFile.php');
class CustomPageController extends Controller
{

    public $active = 'CustomPage'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new CustomPageModel();
    }
    
    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function indexCustomPages(): array
    {
        return $this->Model->indexCustomPage();
    }

    public function CustomPage(){
        return $this->Model->getCustomPage();
    }
    /**
     * @param array
     * @return array|boolean
     * @desc Creates, and returns a user by calling the create method on the BatchModel...\
     **/
    public function CustomPagecreate($data, $file)
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
            'menuid' => $data['menuid'],
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $image,
            'status' => $data['status'],
            'meta_key' => $data['meta_key'],
            'meta_description' => $data['meta_description'],

            
        );
        $Response = $this->Model->CustomPageCreate($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data added successfully';
            header("location: ./CustomPageIndex.php");
            return $Response;
        }
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function CustomPageedit($id): array
    {
        return $this->Model->editCustomPage($id);
    }

    public function CustomPageUpdate(array $data, $file)
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
            'menuid' => $data['menuid'],
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $image,
            'status' => $data['status'],
            'meta_key' => $data['meta_key'],
            'meta_description' => $data['meta_description'],
        );
        $Response = $this->Model->UpdateCustomPage($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: ./CustomPageIndex.php");
            return $Response;
        }
    }


    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function CustomPageDelete($id)
    {
        $image = $this->Model->deleteCustomPageImage($id);
        if($image['image'] != false){
            unlink($_SERVER['DOCUMENT_ROOT']."/education/".$image['image']);
        }

        $response = $this->Model->deleteCustomPage($id);
        if(!$response){
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location: ./CustomPageIndex.php");
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: ./CustomPageIndex.php");
            return $Response;
        }
    }

}
