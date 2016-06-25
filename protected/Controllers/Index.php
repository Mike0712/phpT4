<?php

namespace App\Controllers;

use App\Models\Albums;
use App\Models\Article;
use App\Models\Artists;
use App\Models\Biography;
use App\Models\Category;
use App\Models\Status;
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
        $status = Status::findByPK(2);
        var_dump($status->members);
        die;
    }

    public function actionPetya()
    {
        $this->data->foo = 41;
    }

}