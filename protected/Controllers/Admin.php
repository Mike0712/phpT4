<?php

namespace App\Controllers;

use App\AdminDataTable;
use App\Models\Article;
use App\Models\Albums;
use App\Models\Artists;
use T4\Core\Config;
use T4\Mvc\Controller;

class Admin extends
    Controller
{
    public function actionDefault()
    {

    }

    public function actionPosts()
    {
        $table = new AdminDataTable(Article::findAll(),
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
            ]);
        $this->data->table = $table->render();
    }

    public function actionAlbums()
    {
        $table = new AdminDataTable(Albums::findAll(),
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
            ]);

        $this->data->table = $table->render();
    }

    public function actionArtists()
    {
        $table = new AdminDataTable(Artists::findAll(),
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
            ]);

        $this->data->table = $table->render();
    }
}