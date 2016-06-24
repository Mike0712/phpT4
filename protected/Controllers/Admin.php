<?php

namespace App\Controllers;

use App\AdminDataTable;
use App\Models\Article;
use App\Models\Albums;
use App\Models\Artists;
use T4\Mvc\Controller;

class Admin extends
    Controller
{
    public function actionDefault()
    {

    }

    public function actionPosts()
    {
        $this->data->table = (new AdminDataTable(Article::findAll(),
            [
                'Id Новости' => function ($u) {
                    return $u->__id;
                },
                'Заголовок' => function ($u) {
                    return 'Тема: ' . $u->title;
                },
                'Содержание' => function ($u) {
                    return $u->lead;
                },
            ]))->render();
    }

    public function actionAlbums()
    {

        $this->data->table = (new AdminDataTable(Albums::findAll(),
            [
                'Id альбома' => function ($u) {
                    return $u->__id;
                },
                'Название альбома' => function ($u) {
                    return 'Название: ' . $u->title;
                },

                'Год выхода' => function ($u) {
                    return 'Текст: ' . $u->year;
                },
            ]))->render();
    }

    public function actionArtists()
    {
        $this->data->table = (new AdminDataTable(Artists::findAll(),
            [
                'Id музыканта' => function ($u) {
                    return $u->__id;
                },
                'Имя' => function ($u) {
                    return $u->name;
                },

                'Биография' => function ($u) {
                    return $u->biography;
                },
            ]))->render();
    }

    public function actionInsert()
    {

    }

    public function actionUpdate()
    {
        $this->data->article = Article::findByPK($_GET['id']);
    }

    public function actionSave()
    {
        $article = new Article();
        if(!empty($_POST['__id'])){
            $article->setNew(false);
        }
        $article->fill($_POST);

        $article->save();
        header('Location: /admin/');
    }

    public function actionDelete()
    {
        $article = Article::findByPK($_GET['id']);
        $article->delete();
        header('Location: /admin/');
    }
}