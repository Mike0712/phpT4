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

    public function actionPosts()
    {
        $this->data->table = Article::findAll();
    }

    public function actionAlbums()
    {
        $this->data->table = Albums::findAll();
    }

    public function actionArtists()
    {
        $this->data->table = Artists::findAll();
    }

    public function actionStatus()
    {
        $this->data->table = Status::findAll();
    }

    public function actionCategory()
    {
        $this->data->table = Category::findAll();
    }

    public function actionSongs()
    {
        $this->data->table = Songs::findAll();
    }

    public function actionBiography()
    {
        $this->data->table = Biography::findAll();
    }

    public function actionInsert()
    {
        // Добавить нечего
    }

    public function actionUpdate()
    {
        $this->data->article = Article::findByPK($_GET['id']);
    }

    public function actionSave()
    {
        try {
            $article = new Article();
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

    public function actionDelete()
    {
        $article = Article::findByPK($_GET['id']);
        $article->delete();
        $this->redirect('/admin/');
    }
}