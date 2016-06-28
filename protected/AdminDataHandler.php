<?php

namespace App;


use T4\Mvc\Controller;

class AdminDataHandler

{
    protected $insert;

    protected $table;

    protected $thead;

    public function __construct(array $fields, string $model)
    {
        $insert = array_merge(['id' => '__id'], $fields, [$model]); // Сливаем в массив то, что собираемся передавать

        $this->insert = base64_encode(serialize($insert)); // Упаковываем для передачи методом post

        $this->table = $model::findAll();

        $this->thead = $fields;
    }

    public function getData()
    {
        $data['insert'] = $this->insert;
        $data['table'] = $this->table;
        $data['thead'] = $this->thead;
        return $data;
    }
}