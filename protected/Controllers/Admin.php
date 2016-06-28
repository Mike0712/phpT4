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
        $fields = ['id' => '__id', 'Название' => 'title', 'Содержание' => 'lead', 'Id категории' =>
            '__category_id', Article::class];
        // В ключах задаём названия для полей, в значениях данные как
        // в базе (требуется если таблица пустая). Последним элементом передаём название модели

        $this->data->insert = base64_encode(serialize($fields)); // То что передаём через форму в Insert, Update, Delete
        unset($fields[0]); // Удаляем значение модели (в шаблоне это не нужно)
        $this->data->th = $fields; // Заголовки таблицы (для вывода в шаблон)
        $this->data->table = Article::findAll(); // Данные таблицы для вывода в шаблон
    }

    public function actionAlbums()
    {
        $fields = ['id' => '__id', 'Название' => 'title', 'Год' => 'year', Albums::class];

        $this->data->insert = base64_encode(serialize($fields)); unset($fields[0]);
        $this->data->th = $fields;
        $this->data->table = Albums::findAll();
    }

    public function actionArtists()
    {
        $fields = ['id' => '__id', 'Имя' => 'name', 'Биография №' => '__biography_id', 'Статус' => '__status_id',
        Artists::class];

        $this->data->insert = base64_encode(serialize($fields)); unset($fields[0]);
        $this->data->th = $fields;
        $this->data->table = Artists::findAll();
    }

    public function actionStatus()
    {
        $fields = ['id' => '__id', 'Значение' => 'status', Status::class];

        $this->data->insert = base64_encode(serialize($fields)); unset($fields[0]);
        $this->data->th = $fields;
        $this->data->table = Status::findAll();
    }

    public function actionCategory()
    {
        $fields = ['id' => '', 'Значение' => 'title', Category::class];

        $this->data->insert = base64_encode(serialize($fields)); unset($fields[0]);
        $this->data->th = $fields;
        $this->data->table = Category::findAll();
    }

    public function actionSongs()
    {
        $fields = ['id' => '__id', 'Название' => 'song', 'Ссылка' => 'link', 'id_альбома' => '__albums_id',
            Songs::class ];

        $this->data->insert = base64_encode(serialize($fields)); unset($fields[0]);
        $this->data->th = $fields;
        $this->data->table = Songs::findAll();
    }

    public function actionBiography()
    {
        $fields = ['id' => '__id', 'Текст биографии' => 'biography', Biography::class];

        $this->data->insert = base64_encode(serialize($fields)); unset($fields[0]);
        $this->data->th = $fields;
        $this->data->table = Biography::findAll();
    }

    public function actionInsert($fields = [])
    {
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

    public function actionDelete($id = null, $fields = [])
    {
        $action = array_pop(unserialize(base64_decode($fields)));
        $item = $action::findByPK($id);
        $item->delete();
        $this->redirect('/admin/');
    }

    public function actionVasya()
    {
        foreach ($this as $k => $v){
            var_dump($k);
        } die;
    }
}