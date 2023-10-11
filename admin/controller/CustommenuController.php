<?php
require_once(__dir__ . '/controller.php');
require_once('./model/CustommenuModel.php');
class CastommenuController extends Controller
{

    public $active = 'Castommenu'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new CastommenuModel();
    }
    
    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function getCastommenu(): array
    {
        return $this->Model->indexCastommenu();
    }
    /**
     * @param array
     * @return array|boolean
     * @desc Creates, and returns a user by calling the create method on the BatchModel...\
     **/
    public function createCastommenu($data, $file)
    {
        $Payload = array(
            'ManuName' => $data['ManuName'],
            'Url' => $data['Url'],
            'Target' => $data['Target'],
            'position' => $data['position'],
            'status' => $data['status'],

            
        );
        $Response = $this->Model->CastommenuCreate($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data added successfully';
            header("location: ./CustommenuIndex.php");
            return $Response;
        }
    }

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function Castommenuedit($id): array
    {
        return $this->Model->editCastommenu($id);
    }

    public function CastommenuUpdate(array $data)
    {
        
       
        $Payload = array(
            'id' => $data['id'],
            'ManuName' => $data['ManuName'],
            'Url' => $data['Url'],
            'Target' => $data['Target'],
            'position' => $data['position'],
            'status' => $data['status'],
        );
        $Response = $this->Model->UpdateCastommenu($Payload);

        if (!$Response['status']) {
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: ./CustommenuIndex.php");
            return $Response;
        }
    }


    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function CastommenuDelete($id)
    {
        $response = $this->Model->deleteCustommenu($id);
        if(!$response){
            $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.';
            header("location: ./CustommenuIndex.php");
            return $Response;
        }
        else{
            $Response['status'] = 'Congress! you data Update successfully';
            header("location: ./CustommenuIndex.php");
            return $Response;
        }
    }

}
