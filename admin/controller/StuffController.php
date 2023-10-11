<?php
require_once(__dir__ . '/controller.php');
require_once('./model/StuffModel.php');
require_once('./controller/UploadFile.php');
class stuff extends Controller
{

    public $active = 'stuff'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new StuffModel();
    }
    // public function batch(){
    //     return $this->Model->getBatch();
    // }
    // public function teacher(){
    //     return $this->Model->getTeacher();
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
     * @param array
     * @return array|boolean
     * @desc Creates, and returns a user by calling the create method on the BatchModel...\
     **/
    public function create($data, $file)
    {
        if ($file['image'] != "") {
            $fileName = new upload();
            $fileName->startupload($file);
            $fileName->uploadfile();
            $image  =  $fileName->dbupload;
        } else {
            $image = "";
        }

        // $teacherId = stripcslashes(strip_tags($data['teacherId']));



        $Payload = array(
            'stuffId' =>  $data['stuffId'],
            'name' =>  $data['name'],
            'fname' =>  $data['fname'],
            'mname' =>  $data['mname'],
            'gender' =>  $data['gender'],
            'dob' =>  $data['dob'],
            'blood' =>  $data['blood'],
            'relagion' =>  $data['relagion'],
            'isMarrid' =>  $data['isMarrid'],
            'phone' =>  $data['phone'],
            'nid' =>  $data['nid'],
            'education' =>  $data['education'],
            'subject' =>  $data['subject'],
            'desigmation' =>  $data['desigmation'],
            'department' =>  $data['department'],
            'salary' =>  $data['salary'],
            'contactType' =>  $data['contactType'],
            'workShift' =>  $data['workShift'],
            'expriance' =>  $data['expriance'],
            'joiningDate' =>  $data['joiningDate'],
            'link1' =>  $data['link1'],
            'link2' =>  $data['link2'],
            'link3' =>  $data['link3'],
            'link4' =>  $data['link4'],
            'address' =>  $data['address'],
            'status' =>  $data['status'],
            'image' =>  $image
        );
        $Response = $this->Model->create($Payload);

        if (!$Response) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data added successfully';
            header("location:StuffIndex.php");
            return $Response;
        }
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
            'id'     => $data['id'],
            'stuffId' =>  $data['stuffId'],
            'name' =>  $data['name'],
            'fname' =>  $data['fname'],
            'mname' =>  $data['mname'],
            'gender' =>  $data['gender'],
            'dob' =>  $data['dob'],
            'blood' =>  $data['blood'],
            'relagion' =>  $data['relagion'],
            'isMarrid' =>  $data['isMarrid'],
            'phone' =>  $data['phone'],
            'nid' =>  $data['nid'],
            'education' =>  $data['education'],
            'subject' =>  $data['subject'],
            'desigmation' =>  $data['desigmation'],
            'department' =>  $data['department'],
            'salary' =>  $data['salary'],
            'contactType' =>  $data['contactType'],
            'workShift' =>  $data['workShift'],
            'expriance' =>  $data['expriance'],
            'joiningDate' =>  $data['joiningDate'],
            'link1' =>  $data['link1'],
            'link2' =>  $data['link2'],
            'link3' =>  $data['link3'],
            'link4' =>  $data['link4'],
            'address' =>  $data['address'],
            'status' =>  $data['status'],
            'image' =>  $image,
        );
        $Response = $this->Model->Update($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data Update successfully';
            header("location:StuffIndex.php");
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
        $image = $this->Model->deleteImage($id);
        if ($image['image'] != false) {
            unlink($_SERVER['DOCUMENT_ROOT'] . "/education/" . $image['image']);
        }

        $response = $this->Model->delete($id);
        if (!$response) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location:StuffIndex.php");
            return $Response;
        } else {
            $Response['status'] = 'Congress! you data Update successfully';
            header("location:StuffIndex.php");
            return $Response;
        }
    }
}
