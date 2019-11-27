<?php

namespace app\components;

use app\libs\Db;

abstract class Model
{
    public $db;
    public function __construct()
    {
        $this->db = new Db;
    }
    public function booksCount()
    {
        return $this->db->column('select count(Id) from books');
    }
    public function getBooks($route)
    {
        $max = 9;       
        $params = [
            'max' => $max,
            'start' => (($route['page']??1) - 1) * $max,
        ];
        return $this->db->row('select * from books order by Id desc limit :start, :max',$params);
    }
}
