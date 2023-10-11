<?php
require_once(__dir__ . '/Db.php');
class CMSModel extends Db
{


    // Slider index page
    public function indexSlider()
    {
        $this->query("SELECT * FROM `slider` where `status` = 1");
        $this->execute();

        $slider = $this->fetchAll();
        if (!empty($slider)) {
            $Response = array(
                $slider
            );
            return $Response;
        }
        return array();
    }


    // Testmonial index page
    public function indexTestmonial()
    {
        $this->query("SELECT * FROM `testmonial` where `status` = 1");
        $this->execute();

        $slider = $this->fetchAll();
        if (!empty($slider)) {
            $Response = array(
                $slider
            );
            return $Response;
        }
        return array();
    }

    // News One 
    public function indexNews()
    {
        $this->query("SELECT * FROM `recent_news` where `status` = 1 ORDER BY `id` DESC LIMIT 1");
        $this->execute();

        $slider = $this->fetch();
        if (!empty($slider)) {
            $Response = array(
                $slider
            );
            return $Response;
        }
        return array();
    }

     // News Two 
    public function indexNewsTwo()
    {
        $this->query("SELECT * FROM `recent_news` where `status` = 1 ORDER BY `id` DESC LIMIT 2 OFFSET 1;");
        $this->execute();

        $slider = $this->fetchAll();
        if (!empty($slider)) {
            $Response = array(
                $slider
            );
            return $Response;
        }
        return array();
    }


    // All News
    public function AllNews()
    {
        $this->query("SELECT * FROM `recent_news` where `status` = 1 ORDER BY `id` DESC");
        $this->execute();

        $slider = $this->fetchAll();
        if (!empty($slider)) {
            return  $slider;
        }

        return False;
    }


    // Single News blogread 
    public function singleBlog($id)
    {
        $this->query("SELECT * FROM `recent_news` where `status` = 1 AND `id` = :id");
        $this->bind(':id', $id);
        $this->execute();

        $slider = $this->fetch();
        if (!empty($slider)) {
            return  $slider;
        }
        return False;
    }
    

    // index page courses
    public function indexCourses()
    {
        $this->query("SELECT * FROM `courses` where `isFeatured` = 1 AND `status` = 1");
        $this->execute();

        $courses = $this->fetchAll();
        if (!empty($courses)) {
            $Response = array(
                $courses
            );
            return $Response;
        }
        return array();
    }


    // Selected teacher
    public function getselectTeacher($id)
    {
        $this->query("SELECT `name` FROM `stuff` where `id` = :id");
        $this->bind(':id', $id);
        $this->execute();
        $stuff = $this->fetch();
        if (!empty($stuff)) {
            return $stuff;
        }
        return array(
            'data' => []
        );
    }


    // Selected TeacherAll 
    public function getselectTeacherAll($id)
    {
        $this->query("SELECT * FROM `stuff` where `id` = :id");
        $this->bind(':id', $id);
        $this->execute();
        $stuff = $this->fetch();
        if (!empty($stuff)) {
            return $stuff;
        }
        return array(
            'data' => []
        );
    }

    // TeacherAll
    public function allTeacher()
    {
        $this->query("SELECT * FROM `stuff` where desigmation = 'Professor' AND `status` = 1");
        $this->execute();
        $stuff = $this->fetchAll();
        if (!empty($stuff)) {
            return $stuff;
        }
        return array(
            'data' => []
        );
    }


    // Selected Batch
    public function getselectBatch($id)
    {
        $this->query("SELECT * FROM `batch` where `id` = :id");
        $this->bind(':id', $id);
        $this->execute();
        $batch = $this->fetch();
        if (!empty($batch)) {
            return $batch;
        }
        return array(
            'data' => []
        );
    }


    // Settings
    public function settings()
    {
        $this->query("SELECT * FROM `settings` ");
        $this->execute();
        $settings = $this->fetchAll();
        return $settings;
    }
   


    //  Teacher About page
    public function indexTeacher()
    {
        $this->query("SELECT * FROM `stuff` WHERE `status` = 1");
        $this->execute();

        $teacher = $this->fetchAll();
        if (!empty($teacher)) {
            $Response = array(
                $teacher
            );
            return $Response;
        }
        return array();
    }



    // Course page courses
    public function Courses()
    {
        $this->query("SELECT * FROM `courses` where  `status` = 1");
        $this->execute();

        $courses = $this->fetchAll();

        return $courses;
    }


    // get single course
    public function singleCourse($id)
    {
        $this->query("SELECT * FROM `courses` where  `id` = :id");
        $this->bind(':id', $id);
        $this->execute();

        $course = $this->fetch();

        return $course;
    }



    // countStudent index page
    public function countStudent($id)
    {
        $this->query("SELECT COUNT(id) as `total`  FROM `student` WHERE `batchs` = :id group by `batchs`");
        $this->bind(':id', $id);
        $this->execute();

        $countStudent = $this->fetch();

        return $countStudent;
    }


    //  AllCourse Courses Page 
    public function AllCourse()
    {
        $this->query("SELECT * FROM `courses` WHERE `status` = 1");
        // $this->bind('id', $id);
        $this->execute();

        $course = $this->fetchAll();
        if (!empty($course)) {
            return $course;
        }
    }

    // selectCourse CourseDetails Page
    public function selectCourse($id)
    {
        $this->query("SELECT * FROM `courses` WHERE `id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $course = $this->fetchAll();
        if (!empty($course)) {
            return $course;
        }
    }


    // CreateAdmission CourseDetails Page
    public function CreateAdmission(array $data)
    {


        $this->query("INSERT INTO `online_admission`( `courseId`, `sname`, `phone`, `email`, `type`, `status`) VALUES (?,?,?,?,?,?)");
        $this->bind(1, $data['courseId']);
        $this->bind(2, $data['sname']);
        $this->bind(3, $data['phone']);
        $this->bind(4, $data['email']);
        $this->bind(5, $data['type']);
        $this->bind(6, $data['status']);

        if ($this->execute()) {
            $data = [
                "statusCode" => 200,
                "Msg" => "Admission Successfully"
            ];
            return json_encode($data);
        }
        else{
            $data = [
                "statusCode" => 402,
                "Msg" => "internal server error"
            ];
            return json_encode($data);
        }
    }


    // CreateComment CourseDetails Page
    public function CreateComment(array $data)
    {


        $this->query("INSERT INTO `comment`( `courseid`,`name`, `email`, `comment`, `status`, `image`) VALUES (?,?,?,?,?,?)");
        $this->bind(1, $data['courseid']);
        $this->bind(2, $data['name']);
        $this->bind(3, $data['email']);
        $this->bind(4, $data['comment']);
        $this->bind(5, $data['status']);
        $this->bind(6, $data['image']);

        if ($this->execute()) {
            $data = [
                "statusCode" => 200,
                "Msg" => "Comment Successfully"
            ];
            return json_encode($data);
        }
        else{
            $data = [
                "statusCode" => 402,
                "Msg" => "internal server error"
            ];
            return json_encode($data);
        }
    }


    //  CreateNewsComment blog page
    public function CreateNewsComment(array $data)
    {


        $this->query("INSERT INTO `news_comment`( `blogid`,`name`, `email`, `comment`, `status`, `image`) VALUES (?,?,?,?,?,?)");
        $this->bind(1, $data['blogid']);
        $this->bind(2, $data['name']);
        $this->bind(3, $data['email']);
        $this->bind(4, $data['comment']);
        $this->bind(5, $data['status']);
        $this->bind(6, $data['image']);

        if ($this->execute()) {
            $data = [
                "statusCode" => 200,
                "Msg" => "Comment Successfully"
            ];
            return json_encode($data);
        }
        else{
            $data = [
                "statusCode" => 402,
                "Msg" => "internal server error"
            ];
            return json_encode($data);
        }
    }


    // getComments courseDetails page
    public function getComments($id)
    {   $status = 1;
        $this->query("SELECT * FROM `comment` WHERE `courseid` = :id AND `status` = :status");
        $this->bind('id', $id);
        $this->bind('status', $status);
        $this->execute();

        $comments = $this->fetchAll();
        if (!empty($comments)) {
            return $comments;
        }
    }


    // getNewsComments blogread page
    public function getNewsComments($id)
    {   $status = 1;
        $this->query("SELECT * FROM `news_comment` WHERE `blogid` = :id AND `status` = :status");
        $this->bind('id', $id);
        $this->bind('status', $status);
        $this->execute();

        $comments = $this->fetchAll();
        if (!empty($comments)) {
            return $comments;
        }
    }


    // CreateMassege Contact page
    public function CreateMassege(array $data)
    {


        $this->query("INSERT INTO `massage`( `name`, `email`, `subject`, `massage`, `status`, `image`) VALUES (?,?,?,?,?,?)");
        $this->bind(1, $data['name']);
        $this->bind(2, $data['email']);
        $this->bind(3, $data['subject']);
        $this->bind(4, $data['massage']);
        $this->bind(5, $data['status']);
        $this->bind(6, $data['image']);

        if ($this->execute()) {
            $data = [
                "statusCode" => 200,
                "Msg" => "Massage Successfully"
            ];
            return json_encode($data);
        }
        else{
            $data = [
                "statusCode" => 402,
                "Msg" => "internal server error"
            ];
            return json_encode($data);
        }
    
    }


    // CreateSubscribe
    public function CreateSubscribe(array $data)
    {
        $this->query("SELECT `email` FROM `subscribe` WHERE `email` = :email");
        $this->bind('email', $data['email']);
        $this->execute();
        $email = $this->fetch();
        if (!empty($email)) {
            $data = [
                "statusCode" => 409,
                "Msg" => "Email Already Exist"
            ];
            return json_encode($data);
        } else {

            $this->query("INSERT INTO `subscribe`( `email`, `status`) VALUES (?,?)");
            $this->bind(1, $data['email']);
            $this->bind(2, $data['status']);
            if ($this->execute()) {

                $data = [
                    "statusCode" => 200,
                    "Msg" => "Subscrib Successfully"
                ];
                return json_encode($data);
            }
        }
    }


    // courseCount index page
    public function courseCount(){
        $this->query("SELECT count(`id`) as `Course` FROM `courses`");
        $this->execute();
        $course = $this->fetch();
        if($course){
             return $course;
             die("SQL Problem");
        }
    }

    // StudentCount index page
    public function StudentCount(){
        $this->query("SELECT count(`id`) as `Student` FROM `student`");
        $this->execute();
        $student = $this->fetch();
        return $student;
        die("SQL Problem");
    }  

    // TeacherCount index page
    public function TeacherCount() {
        $this->query("SELECT count(`id`) as `Teacher` FROM `stuff` WHERE `desigmation` = 'Professor'");
        $this->execute();
        $teacher = $this->fetch();
        return $teacher;
        die("SQL Problem");
    }


    // blogCommentCount 
    public function blogCommentCount($id){
        $this->query("SELECT COUNT(`id`) as `totalComment` FROM `news_comment` WHERE `blogid` = :id");
        $this->bind('id', $id);
        $this->execute();
        $TotalComment = $this->fetch();
        if(isset($TotalComment) && $TotalComment != ""){
            return $TotalComment;
        }
        else{
            return 0;
        }
    }


    //  All Event event page
    public function AllEvent()
    {
        $this->query("SELECT * FROM `table_event` where `isActive` = 1 ORDER BY `id` DESC");
        $this->execute();

        $slider = $this->fetchAll();
        if (!empty($slider)) {
            return  $slider;
        }

        return False;
    }


   //  SingleEvent  Eventread page
    public function singleEvent($id)
    {
        $this->query("SELECT * FROM `table_event` where `isActive` = 1 AND `id` = :id");
        $this->bind(':id', $id);
        $this->execute();

        $slider = $this->fetch();
        if (!empty($slider)) {
            return  $slider;
        }
        return False;
    }


    // galarycategoris galary page
    public function galarycategoris(){
        $this->query("SELECT * FROM `table_galarycategoris` WHERE `isActive` = 1 LIMIT 6");
        $this->execute();

        $slider = $this->fetchAll();
        if (!empty($slider)) {
            return  $slider;
        }
        return False;
    }



    // getGalaryImage galaryDetails page
    public function getGalaryImage($id)
    {
        $this->query("SELECT * FROM `table_galary` WHERE `categorisId` = :id AND `isActive` = 1");
        $this->bind(':id', $id);
        $this->execute();

        $slider = $this->fetchAll();
        if (!empty($slider)) {
            return  $slider;
        }
        return False;
    }



    // recentNewses Sidebar  blogread page
    public function recentNewses()
    {
        $this->query("SELECT * FROM `recent_news` WHERE `status` = 1 ORDER BY `id` DESC LIMIT 4");
        $this->execute();

        $slider = $this->fetchAll();
        if (!empty($slider)) {
            return  $slider;
        }
        return False;
    }


    // eventSidebar Eventread page
    public function eventSidebar()
    {
        $this->query("SELECT * FROM `table_event` WHERE `isActive` = 1 ORDER BY `id` DESC LIMIT 2");
        $this->execute();

        $slider = $this->fetchAll();
        if (!empty($slider)) {
            return  $slider;
        }
        return False;
    }
    
    
    
    
}
