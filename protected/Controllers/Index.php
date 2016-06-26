<?php

namespace App\Controllers;

use App\Models\Albums;
use App\Models\Article;
use App\Models\Artists;
use App\Models\Biography;
use App\Models\Category;
use App\Models\Songs;
use App\Models\Status;
use T4\Mvc\Controller;

/**
 * Class Index
 * @package App\Controllers
 *
 * @property /App/Models/Article @all
 * @property /App/Models/Article @single
 * @property /App/Models/Category @category
 * @property /App/Models/Category @cats
 * @property /App/Models/Status @status
 * @property /App/Models/Biography @biography
 * @property /App/Models/Albums @albums
 * @property /App/Models/Songs @songs
 */
class Index
    extends Controller
{
    public function actionDefault($page = 1)
    {   // 2 переменные для менюшек, передаём в каждый экшн
        $this->data->category = Category::findAll();    // категории новостей
        $this->data->status = Status::findByPK(1);     // Во фронт выводим только действующих участников

        $this->data->all = Article::findAll();
        $this->data->page = $page; // Для пагинации на странице
    }

    public function actionNews($id = null, $cat = null)
    {
        $this->data->category = Category::findAll();
        $this->data->status = Status::findByPK(1);

        $this->data->single = Article::findByPk($id);
        $this->data->cats = Category::findByPk($cat)->news;
        $this->data->all = Article::findAll();
    }

    public function actionArtists($m = null)
    {
        $this->data->category = Category::findAll();
        $this->data->status = Status::findByPK(1);

        $this->data->artist = Artists::findByPK($m);
    }

    public function actionAlbums()
    {
        $this->data->category = Category::findAll();
        $this->data->status = Status::findByPK(1);

        $this->data->albums = Albums::findAll();
    }

    public function actionSongs($num = null)
    {
        $this->data->category = Category::findAll();
        $this->data->status = Status::findByPK(1);

        $this->data->songs = Songs::findAll();
        $this->data->albums = Albums::findByPK($num);
    }
}