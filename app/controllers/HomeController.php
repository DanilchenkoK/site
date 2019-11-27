<?php

namespace app\controllers;

use app\components\Controller;
use app\libs\Pagination;

class HomeController extends Controller
{
   public function indexAction()
   {
     $pagination = new Pagination($this->route,$this->model->booksCount());
     $params = [
       'pagination'=> $pagination->get(),
       'books'=> $this->model->getBooks($this->route)
     ];
     $this->view->render('Главная', $params);
   }
}
