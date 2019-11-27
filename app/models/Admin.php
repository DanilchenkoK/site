<?php

namespace app\models;

use app\components\Model;
use Imagick;

class Admin extends Model
{
    public $rules;
    private $user;
    public function __construct()
    {
        parent::__construct();
        $this->rules = require_once 'app/config/admin.php';
    }
    public function getUserId()
    {
        return $this->user['Id'];
    }
    public function validation($input, $post, $isLogin = true)
    {
        $isValid = true;
        foreach ($input as $val) {
            if (!isset($post[$val]) or !preg_match($this->rules[$val]['pattern'], trim($post[$val]))) {
                $this->rules[$val]['error'] = true;
                $isValid = false;
            } else {
                $this->rules[$val]['error'] = false;
            }
        }
        return ($isLogin and $isValid) ? $this->accountVerification($post) : $isValid;
    }

    public function bookImgValidation($input, $post, $file)
    {
        $isValid =  $input ? $this->validation($input, $post, false) : true;
        
        if (!isset($file['image']) or !preg_match($this->rules['image']['pattern'], $file['image']['type'])) {
            $isValid =  !$this->rules['image']['error'] = true;
        }
        return $isValid;
    }
    private function accountVerification($post)
    {
        $params = [
            'login' => trim($post["login"]),
            'password' => trim($post['password'])
        ];
        $isValid = true;
        $user = $this->db->row("SELECT users.Id, Login, Password, Role FROM users join roles on users.RoleId = roles.Id WHERE Login = :login and Password = :password", $params);
        if (!isset($user[0]['Login'])) {
            $this->rules['account']['error'] = !$isValid = false;
        } else {
            $this->user = $user[0]['Role'] == 'admin' ? $user[0] : null;
            $this->rules['account']['error'] = !$isValid = !isset($this->user) ? false : true;
        }
        return $isValid;
    }
    public function isBookExists($id)
    {
        $params = [
            'id' => $id
        ];
        return  $this->db->column("select Id from books where Id = :id", $params);
    }
    public function getBook($id)
    {
        if(!$this->isBookExists($id)) {
            return false;
        }
        $params = [
            'id' => $id
        ];
        return  $this->db->row("select * from books where Id = :id", $params);
    }

    public function uploadFileImage($path, $id)
    {
        if ($id) {
            $img = new Imagick($path);
            $img->cropThumbnailImage('305', '406');
            $img->setImageCompressionQuality(100);
            $img->writeImage('public/images/' . $id . '.jpg');           
            //move_uploaded_file($path, 'public/images/' . $id . '.jpg');
            return  true;
        }
        return false;
    }
    public function bookAdd($post, $path)
    {
        $params = [
            'bookName' => trim($post["bookName"]),
            'author' => trim($post['author'])
        ];
        $this->db->row("insert into books set BookName=:bookName, Author =:author", $params);
        $id = $this->db->lastInsertId();
        if ($this->uploadFileImage($path, $id)) {
            return  true;
        }
        $this->rules['errorAdd']['error']  = true;
        return false;
    }
    public function bookEdit($post,$id)
    {
        $params = [
            'id'=> $id,
            'bookName' => $post['bookName'],
            'author' => $post['author']
        ];
        $this->db->query("update books set BookName = :bookName, Author = :author  where Id = :id", $params);      
    }
    public function bookDelete($id)
    {
        $params = [
            'id' => $id
        ];
        $this->db->query("delete from books where Id = :id", $params);
        unlink('public/images/' . $id . '.jpg');
    }
}
