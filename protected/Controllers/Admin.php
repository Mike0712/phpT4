<?php

namespace App\Controllers;

use App\AdminDataTable;
use App\Models\Article;
use App\Models\Albums;
use App\Models\Artists;
use App\Models\Biography;
use App\Models\Category;
use App\Models\Songs;
use App\Models\Status;
use T4\Core\MultiException;
use T4\Mvc\Controller;

class Admin extends
    Controller
{
    public function actionDefault()
    {

    }

    public function actionPosts($act = null)
    {
        $this->data->th = ['id' => '', 'Название' => '', 'Содержание' => '', 'Id категории' => '' ]; // Задаём названия
                                                    // по умолчанию названия как в базе
        $this->data->table = Article::findAll();
        $this->data->action = Article::class;
    }

    public function actionAlbums()
    {
        $this->data->th = ['id' =>'', 'title' => '', 'year' => ''];
        $this->data->table = Albums::findAll();
        $this->data->action = Albums::class;
    }

    public function actionArtists()
    {
        $this->data->th = ['id' => '', 'Имя' => '', 'Биография №' => '', 'Статус' => '' ];
        $this->data->table = Artists::findAll();
        $this->data->action = Artists::class;
    }

    public function actionStatus()
    {
        $this->data->th = ['id' => '', 'Значение' => '' ];
        $this->data->table = Status::findAll();
        $this->data->action = Status::class;
    }

    public function actionCategory()
    {
        $this->data->th = ['id' => '', 'Значение' => '' ];
        $this->data->table = Category::findAll();
        $this->data->action = Category::class;
    }

    public function actionSongs()
    {
        $this->data->th = ['id' => '', 'Название' => '', 'Ссылка' => '' , 'id_альбома' => '' ];
        $this->data->table = Songs::findAll();
        $this->data->action = Songs::class;
    }

    public function actionBiography()
    {
        $this->data->th = ['id' => '', 'Текст биографии' => ''];
        $this->data->table = Biography::findAll();
        $this->data->action = Biography::class;
    }

    public function actionInsert($action = null)
    {
        $this->data->items = $action::findByPK(1);
        $this->data->action = $action;
    }

    public function actionUpdate($id = null, $action = null)
    {
        $this->data->items = $action::findByPK($id);
        $this->data->action = $action;
    }

    public function actionSave($action = null)
    {
        try {
            $article = new $action();
            if (!empty($_POST['__id'])) {
                $article->setNew(false);
            }
            $article->fill($_POST);

            $article->save();
            $this->redirect('/admin/');
        } catch (MultiException $e){
            $this->data->errors = $e;
        }
    }

    public function actionDelete($action)
    {
        $article = $action::findByPK($_GET['id']);
        $article->delete();
        $this->redirect('/admin/');
    }
}