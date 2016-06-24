<?php

namespace App\Controllers;

use App\Models\Article;
use T4\Mvc\Controller;

class Index
    extends Controller
{

    public function actionDefault()
    {
        $this->app->assets->publishCssFile('/Layouts/css/bootstrap.min.css');
        $this->app->assets->publishCssFile('/Layouts/css/blog.css');
        $this->data->items = Article::findAll();
    }

    public function actionVasya()
    {
        $this->data->foo = 42;
    }

    public function actionPetya()
    {
        $this->data->foo = 41;
    }

}