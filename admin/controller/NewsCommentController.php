<?php
require_once(__dir__ . '/controller.php');
require_once('./model/NewsCommentModel.php');
require_once('./controller/UploadFile.php');
class NewsCommentModels extends Controller
{

    public $active = 'News Comment '; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new NewsCommentModel();
    }
    // public function StudentBatch(){
    //     return $this->Model->getBatch();
    // }
   
    
    
    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function get(): array
    {
        return $this->Model->index();
    }

    


    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function edit($id): array
    {
        return $this->Model->edit($id);
    }

    public function Update(array $data, $file)
    {
        if ($file['image']['name'] == "") {
            $image = $data['oldImage'];
        } else {
            if ($data['oldImage'] != "") {
                unlink($_SERVER['DOCUMENT_ROOT'] . "/education/" . $data['oldImage']);
            }
            $fileName = new upload();
            $fileName->startupload($file);
            $fileName->uploadfile();
            $image  =  $fileName->dbupload;
        }

        $Payload = array(
                'id'  => $data['id'],
              'blogid'=>$data['blogid'],
               'name'=>$data['name'],
                'email'=>$data['email'],
                'comment'=>$data['comment'],
                'status'=> $data['status'],
                'image'=> $image,
                
        );
        $Response = $this->Model->Update($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data Update successfully';
            header("location:NewsCommentIndex.php");
            return $Response;
        }
    }


    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function delete($id)
    {
       
        $response = $this->Model->delete($id);
        if (!$response) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location:NewsCommentIndex.php");
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data Update successfully';
            header("location:NewsCommentIndex.php");
            return $Response;
        }
    }

    public function statuschanges($data){
        $this->Model->StatusChanges($data);
        header("location:NewsCommentIndex.php");
    }
}
