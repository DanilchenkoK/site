<?php

namespace app\controllers;

use app\components\Controller;
use app\libs\Pagination;


class AdminController extends Controller
{

   public function __construct($route)
   {
      parent::__construct($route);
      $this->view->layout = 'admin';
   }

   public function loginAction()
   {
      isset($_SESSION['admin']) ? $this->view->redirect('admin/books') : null;
      if (!empty($_POST)) {
         $validateTags = ['login', 'password'];
         if (!$this->model->validation($validateTags, $_POST)) {
            $validateTags[] = 'account';
            $this->view->validationMessage($validateTags, $this->model->rules);
         }
         $_SESSION['admin'] = $this->model->getUserId();
         $this->view->location('/admin/books');
      }
      $this->view->render('Вход', $this->model->rules);
   }

   public function addAction()
   {
      if (!empty($_POST)) {
         $validateTags = ['bookName', 'author'];
         if (!$this->model->bookImgValidation($validateTags, $_POST, $_FILES)) {
            $validateTags[] = 'image';
            $this->view->validationMessage($validateTags, $this->model->rules);
         }
         if (!$this->model->bookAdd($_POST, $_FILES['image']['tmp_name'])) {
            $this->view->validationMessage(['errorAdd'], $this->model->rules);
         }
         $this->view->message('Success', 'Книга успешно добавлена!', '/admin/books');
      }
      $this->view->render('Новая книга', $this->model->rules);
   }
   public function editAction()
   {
      $book = $this->model->getBook($this->route['id']);
      if (!$book) {
         $this->view->errorCode(404);
      }
      if (!empty($_POST)) {
         $validateTags = ['bookName', 'author'];
         if (!$this->model->validation($validateTags, $_POST, false)) {
            $this->view->validationMessage($validateTags, $this->model->rules);
         }
         if ($_FILES['image']['tmp_name']) {
            if (!$this->model->bookImgValidation(null, $_POST, $_FILES)) {
               $this->view->validationMessage(['image'], $this->model->rules);
            }
            $this->model->uploadFileImage($_FILES['image']['tmp_name'], $this->route['id']);
         }
         $this->model->bookEdit($_POST, $this->route['id']);
         $this->view->message('Success', 'Книга успешно отредактирована!', '/admin/books');
      }
      $params = ['rules' => $this->model->rules, 'book' => $book];
      $this->view->render('Редактировать книгу', $params);
   }
   public function booksAction()
   {

      $pagination = new Pagination($this->route, $this->model->booksCount());
      $params = [
         'pagination' => $pagination->get(),
         'books' => $this->model->getBooks($this->route)
      ];
      $this->view->render('Список книг', $params);
   }

   public function deleteAction()
   {
      if (!$this->model->isBookExists($this->route['id'])) {
         $this->view->errorCode(404);
      }
      $this->model->bookDelete($this->route['id']);
      $this->view->redirect('admin/books');
   }
   public function logoutAction()
   {
      unset($_SESSION['admin']);
      $this->view->redirect('admin/login');
   }
}
