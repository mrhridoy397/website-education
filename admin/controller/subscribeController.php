<?php
require_once(__dir__ . '/controller.php');
require_once('./model/subscribeModel.php');
class subscribeModels extends Controller
{

    public $active = 'subscribe'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new subscribeModel();
    }
    
    
    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function get(): array
    {
        return $this->Model->index();
    }

}
