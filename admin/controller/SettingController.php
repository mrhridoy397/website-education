<?php
require_once(__dir__ . '/controller.php');
require_once('./model/SettingModel.php');
require_once('./controller/newUploadsFile.php');
class Settings extends Controller
{

    public $active = 'Settings'; //for highlighting the active link...
    private $Model;

    /**
     * @param null|void
     * @return null|void
     * @desc Checks if the user session is set and creates a new instance of the DashboardModel...
     **/
    public function __construct()
    {
        if (!isset($_SESSION['auth_status'])) header("Location: index.php");
        $this->Model = new SettingModel();
    }
  

    /**
     * @param null|void
     * @return array
     * @desc Returns an array of news by calling the  BatchModel fetchNews method...
     **/
    public function edit(): array
    {
        return $this->Model->edit();
    }

    public function Update($data, $file)
    {
        if ($file['siteLogo']['name'] == "") {
            $siteLogo = $data['oldsiteLogo'];
        } 
        else {
            if ($data['oldsiteLogo'] != "") {
                unlink($_SERVER['DOCUMENT_ROOT'] . "/education/" . $data['oldsiteLogo']);
            }
            $files = $file['siteLogo'];
            $fileName = new upload();
            $fileName->startupload($files);
            $fileName->uploadfile();
            $siteLogo  =  $fileName->dbupload;
        }
        if ($file['FaviconIcon']['name'] == "") {
            $FaviconIcon = $data['oldFaviconIcon'];
        } 
        else {
            if ($data['oldFaviconIcon'] != "") {
                unlink($_SERVER['DOCUMENT_ROOT'] . "/education/" . $data['oldFaviconIcon']);
            }
            $files = $file['FaviconIcon'];
            $fileName = new upload();
            $fileName->startupload($files);
            $fileName->uploadfile();
            $FaviconIcon  =  $fileName->dbupload;
        }
        if ($file['footerLogo']['name'] == "") {
            $footerLogo = $data['oldfooterLogo'];
        } 
        else {
            if ($data['oldfooterLogo'] != "") {
                unlink($_SERVER['DOCUMENT_ROOT'] . "/education/" . $data['oldfooterLogo']);
            }
            $files = $file['footerLogo'];
            $fileName = new upload();
            $fileName->startupload($files);
            $fileName->uploadfile();
            $footerLogo  =  $fileName->dbupload;
        }
        if ($file['principleImage']['name'] == "") {
            $principleImage = $data['oldprincipleImage'];
        } 
        else {
            if ($data['oldprincipleImage'] != "") {
                unlink($_SERVER['DOCUMENT_ROOT'] . "/education/" . $data['oldprincipleImage']);
            }
            $files = $file['principleImage'];
            $fileName = new upload();
            $fileName->startupload($files);
            $fileName->uploadfile();
            $principleImage  =  $fileName->dbupload;
        }
        if ($file['principleSign']['name'] == "") {
            $principleSign = $data['oldprincipleSign'];
        } 
        else {
            if ($data['oldprincipleSign'] != "") {
                unlink($_SERVER['DOCUMENT_ROOT'] . "/education/" . $data['oldprincipleSign']);
            }
            $files = $file['principleSign'];
            $fileName = new upload();
            $fileName->startupload($files);
            $fileName->uploadfile();
            $principleSign  =  $fileName->dbupload;
        }
        

        $Payload = array(
           'siteTitle' => $data['siteTitle'],
           'siteLogo' => $siteLogo,
           'FaviconIcon' => $FaviconIcon,
           'PhoneNumber' => $data['PhoneNumber'],
           'email' => $data['email'],
           'openingHours' => $data['openingHours'],
           'fb' => $data['fb'],
           'twitter' => $data['twitter'],
           'googleplus' => $data['googleplus'],
           'instagram' => $data['instagram'],
           'Linkdin' => $data['Linkdin'],
           'footertxt' => $data['footertxt'],
           'footerdev' => $data['footerdev'],
           'footerLogo' => $footerLogo,
           'footerAbout' => $data['footerAbout'],
           'principleImage' => $principleImage,
           'principleTxt' => $data['principleTxt'],
           'principleSign' => $principleSign,
           'Factstext' => $data['Factstext'],
           'coursetext' => $data['coursetext'],
           'newstxt' => $data['newstxt'],
           'testimonialtxt' => $data['testimonialtxt'],






        );
        $Response = $this->Model->Update($Payload);

        if (!$Response = true) {
            $Response = 'Sorry, An unexpected error occurred and your request could not be completed.';
            return $Response;
        } else {
            $Response  = 'Congress! you data Update successfully';
            header("location:SettingEdit.php");
            return $Response;
        }
    }


    
}
