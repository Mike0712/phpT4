<?php

namespace App\Controllers;

use App\AdminDataHandler;
use App\AdminFileManipulator;
use App\Models\Article;
use App\Models\Albums;
use App\Models\Artists;
use App\Models\Biography;
use App\Models\Category;
use App\Models\Songs;
use App\Models\Status;
use T4\Core\MultiException;
use T4\Mvc\Controller;

/**
 * Class Admin
 * @package App\Controllers
 *
 * @property \App\AdminBaseHandler $value
 * @property string $action
 * @property \App\AdminBaseHandler $items
 */
class Admin extends
    Controller
{
    public function actionDefault()
    {
    }

    public function actionPosts()
    {
        $fields = new AdminDataHandler(['Название' => 'title', 'Содержание' => 'lead', 'Id категории' =>
            '__category_id'], Article::class); // Передаём в качестве аргументов массив 'название полей' =>
        // 'название колонок в БД', модель которую хотим вызвать в этом контроллере
        $this->data->value = $fields->getData(); // Передаём данные в шаблон, обязательно в переменную value
    }

    public function actionAlbums()
    {
        $fields = new AdminDataHandler(['Название' => 'title', 'Год' => 'year'], Albums::class);
        $this->data->value = $fields->getData();
    }

    public function actionArtists()
    {
        $fields = new AdminDataHandler(['Имя' => 'name', 'Биография №' => '__biography_id', 'Статус' => '__status_id'],
            Artists::class);
        $this->data->value = $fields->getData();
    }

    public function actionStatus()
    {
        $fields = new AdminDataHandler(['Значение' => 'status'], Status::class);
        $this->data->value = $fields->getData();
    }

    public function actionCategory()
    {
        $fields = new AdminDataHandler(['Значение' => 'title'], Category::class);
        $this->data->value = $fields->getData();
    }

    public function actionSongs()
    {
        $fields = new AdminDataHandler(['Название' => 'song', 'Ссылка' => 'link', 'id_альбома' => '__albums_id'],
            Songs::class);
        $this->data->value = $fields->getData();
    }

    public function actionBiography()
    {
        $fields = new AdminDataHandler(['Текст биографии' => 'biography'], Biography::class);
        $this->data->value = $fields->getData();
    }

    public function actionInsert($fields = [])
    {
        if(empty($fields)){
            $this->redirect('/admin/');
        }
        $items = unserialize(base64_decode($fields));
        $this->data->action = array_pop($items);
        $this->data->items = $items;

    }

    public function actionUpdate($id = null, $fields = [])
    {
        $action = array_pop(unserialize(base64_decode($fields)));
        $this->data->items = $action::findByPK($id);
        $this->data->action = $action;
    }

    public function actionSave($action = null)
    {
        if (isset($_FILES['files'])) {
            (new AdminFileManipulator())->action();
        }die;
        try {
            $article = new $action();
            if (!empty($_POST['__id'])) {
                $article->setNew(false);
            }
            $article->fill($_POST);

            $article->save();
            $this->redirect('/admin/');
        } catch (MultiException $e) {
            $this->data->errors = $e;
        }
    }

    public function actionDelete($id = null, $action = [])
    {
        $item = $action::findByPK($id);
        $item->delete();
        $this->redirect('/admin/');
    }

    public function actionVasya()
    {
        foreach ($this as $k => $v) {
            var_dump($k);
        }
        die;
    }
}