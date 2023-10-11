<?php
require_once(__dir__ . '/Db.php');
class NewsModel extends Db
{
       /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function indexNews()
    {
        $this->query("SELECT * FROM `recent_news`");
        $this->execute();

        $news = $this->fetchAll();
        if (!empty($news)) {
            $Response = array(
               $news
            );
            return $Response;
        }
        return array(
          
        );
    }

    /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function NewsCreate(array $data)
    {
        $this->query("INSERT INTO `recent_news`( `title`, `author`, `shortDescription`, `LongDescription`, `image`, `status`) VALUES (?,?,?,?,?,?)");
        $this->bind(1, $data['title']);
        $this->bind(2, $data['author']);
        $this->bind(3, $data['shortDescription']);
        $this->bind(4, $data['LongDescription']);
        $this->bind(5, $data['image']);
        $this->bind(6, $data['status']);
        

        if ($this->execute()) {
            $Response = array(
                'status' => true,
            );
            return $Response;
        } else {
            $Response = array(
                'status' => false
            );
            return $Response;
        }
    }

 


      /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function editNews($id)
    {
        $this->query("SELECT * FROM `recent_news` WHERE`id` = :id");
        $this->bind('id', $id);
        $this->execute();

        $news = $this->fetch();
        if (!empty($news)) {
              return  $news; 
        }
    }


      /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function UpdateNews(array $data): array
    {
        $this->query("UPDATE `recent_news` SET `title`=?,`author`=?,`shortDescription`=?,`LongDescription`=?,`image`=?,`status`=? WHERE `id`=?");
        $this->bind(1, $data['title']);
        $this->bind(2, $data['author']);
        $this->bind(3, $data['shortDescription']);
        $this->bind(4, $data['LongDescription']);
        $this->bind(5, $data['image']);
        $this->bind(6, $data['status']);
        $this->bind(7, $data['id']);

        if ($this->execute()) {
            $Response = array(
                'status' => true,
            );
            return $Response;
        } else {
            $Response = array(
                'status' => false
            );
            return $Response;
        }
    }


    public function deleteNewsImage($id){
        $this->query("SELECT `image`FROM `recent_news` WHERE `id` = :id");
        $this->bind('id', $id);
        $this->execute();
        $image = $this->fetch();
        if ($image) {
            return $image;
        } else {
            return false;
        }
    }
        /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function deleteNews($id): array
    {
        $this->query("DELETE FROM `recent_news` WHERE `id` = :id");
        $this->bind('id', $id);
        if ($this->execute()) {
            $Response = array(
                'status' => true,
                'msg' =>'News Delete successfully'
            );
            return $Response;
        } else {
            $Response = array(
                'status' => false
            );
            return $Response;
        }
    }
}
