<?php
require_once(__dir__ . './Controller.php');
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
        $this->Model = new CMSModel();
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the BatchModel fetchNews method...
     **/
    
    
     // Slider index page
    public function getSlider()
    {
        return $this->Model->indexSlider();
    }


    // Testmonial index page
    public function getSliders()
    {
        return $this->Model->indexTestmonial();
    }


    // News One index page
    public function getsSlider()
    {
        return $this->Model->indexNews();
    }


    // News Two index page
    public function getTwoNews()
    {
        return $this->Model->indexNewsTwo();
    }


    // All News blog page
    public function AllBlog()
    {
        return $this->Model->AllNews();
    }


    // All Event events page 
    public function AllEvents()
    {
        return $this->Model->AllEvent();
    }


    // // Single News blogread page
    public function BlogDetails($id)
    {
        return $this->Model->singleBlog($id);
    }


    //  SingleEvent  Eventread page
    public function EventDetails($id)
    {
        return $this->Model->singleEvent($id);
    }
    

    /**
     * @param null|void 
     * @return array
     * @desc Returns an array of news by calling the BatchModel fetchNews method...
     **/


    // index page courses
    public function getCourses()
    {
        return $this->Model->indexCourses();
    }


    // Course page courses
    public function Courses()
    {
        return $this->Model->Courses();
    }

    // get single course courseDetails page
    public function CourseDetails($id)
    {
        return $this->Model->singleCourse($id);
    }


    //  Teacher About page
    public function getTeacher()
    {
        return $this->Model->indexTeacher();
    }

    // Selected Batch
    public function getSelectBatch($id)
    {
        return $this->Model->getselectBatch($id);
    }

    // countStudent index page
    public function countStudents($id)
    {
        return $this->Model->countStudent($id);
    }


    // countTeacher index page
    public function getSelectTeacher($id)
    {
        return $this->Model->getselectTeacher($id);
    }



    // Selected TeacherAll 
    public function getSelectTeacherAll($id)
    {
        return $this->Model->getselectTeacherAll($id);
    }

    // TeacherAll
    public function allTeacher()
    {
        return $this->Model->allTeacher();
    }



    // TeacherCount index page
    public function TeacherCount()
    {
        $teacher = $this->Model->TeacherCount();
        return $teacher;
    }


    // courseCount index page
    public function courseCount()
    {
        $course = $this->Model->courseCount();
        return $course;
    }

    // StudentCount index page
    public function studentCount()
    {
        $student = $this->Model->StudentCount();
        return $student;
    }
    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the BatchModel fetchNews method...
     **/

     // Settings
    public function getSetting()
    {
        return $this->Model->settings();
    }
    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the BatchModel fetchNews method...
     **/


     //  AllCourse Courses Page 
    public function AllCourses()
    {
        return $this->Model->AllCourse();
    }
    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the BatchModel fetchNews method...
     **/

     // selectCourse CourseDetails Page
    public function selectCourses($id)
    {
        return $this->Model->selectCourse($id);
    }
    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the BatchModel fetchNews method...
     **/



     // createAdmission CourseDetails Page
    public function createAdmission($data)
    {

        $Payload = array(
            'courseId' => $data['courseId'],
            'sname' => $data['sname'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'type' => $data['type'],
            'status' => 1,
        );
        $data = $this->Model->CreateAdmission($Payload);

        echo $data;
    }


     // CreateComment CourseDetails Page
    public function CreateComment($data, $file)
    {
        if ($file['image'] != "") {
            $fileName = new upload();
            $fileName->startupload($file);
            $fileName->uploadfile();
            $image  =  $fileName->dbupload;
        } else {
            $image = "";
        }

        $Payload = array(
            'courseid' => $data['courseid'],
            'name' => $data['name'],
            'email' => $data['email'],
            'comment' => $data['comment'],
            'image' => $image,
            'status' => 0,
        );
        $data = $this->Model->CreateComment($Payload);
        echo $data;
    }


    // CreateNewsComments  blogread page
    public function CreateNewsComments($data, $file)
    {
        if ($file['image'] != "") {
            $fileName = new upload();
            $fileName->startupload($file);
            $fileName->uploadfile();
            $image  =  $fileName->dbupload;
        } else {
            $image = "";
        }

        $Payload = array(
            'blogid' => $data['blogid'],
            'name' => $data['name'],
            'email' => $data['email'],
            'comment' => $data['comment'],
            'image' => $image,
            'status' => 0,
        );
        $data = $this->Model->CreateNewsComment($Payload);
        echo $data;
    }


    // getComments courseDetails page
    public function CourseComments($id)
    {
        return $this->Model->getComments($id);
    }


    // getNewsComments blogread page
    public function NewsComments($id)
    {
        return $this->Model->getNewsComments($id);
    }


    // CreateMassege contact page
    public function CreateMassege($data, $file)
    {
        if ($file['image'] != "") {
            $fileName = new upload();
            $fileName->startupload($file);
            $fileName->uploadfile();
            $image  =  $fileName->dbupload;
        } else {
            $image = "";
        }

        $Payload = array(
            'name' => $data['name'],
            'email' => $data['email'],
            'subject' => $data['subject'],
            'massage' => $data['massage'],
            'image' => $image,
            'status' => 1,
        );
        $data = $this->Model->CreateMassege($Payload);
        echo $data;
    }


    // CreateSubscribe
    public function CreateSubscribe($data)
    {
        $Payload = array(
            'email' => $data['email'],
            'status' => 1,
        );
        $data = $this->Model->CreateSubscribe($Payload);
        if ($data) {
            echo $data;
        }
    }


    // blogCommentCount 
    public function totalBlogComment($id){
        return $this->Model->blogCommentCount($id);
    }


    // galarycategoris galary page
    public function getGalaryCategoris(){
        return $this->Model->galarycategoris();
    }


    // getGalaryImage galaryDetails page
    public function getGalary($id){
        return $this->Model->getGalaryImage($id);
    }

     // recentNewses Sidebar  blogread page
    public function recentNews(){
        return $this->Model->recentNewses();
    }


    // eventSidebar Eventread page
    public function EventSidebars(){
        return $this->Model->eventSidebar();
    }
    
}
