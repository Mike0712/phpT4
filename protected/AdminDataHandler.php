<?php

namespace App;


use T4\Mvc\Controller;

class AdminDataHandler

{
    protected $insert;

    protected $table;

    protected $thead;

    protected $model;

    public function __construct(array $fields, string $model)
    {
        $insert = array_merge(['id' => '__id'], $fields, [$model]); // Сливаем в массив то, что собираемся передавать

        $this->insert = base64_encode(serialize($insert)); // Упаковываем для передачи методом post

        $this->table = $model::findAll();

        $this->thead = array_merge(['id' => '__id'] , $fields);

        $this->model = $model;
    }

    public function getData()
    { // Сливаем всё в массив
        $data['insert'] = $this->insert;
        $data['table'] = $this->table;
        $data['thead'] = $this->thead;
        $data['model'] = $this->model;
        return $data;
    }
}