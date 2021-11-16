<?php

class Controller
{
    protected $view;

    public function model($model)
    {
        require_once MODEL  . $model . '.php';
        return new $model;
    }

    public function view($viewName , $viewData=[])
    {
        $this->view = new View($viewName, $viewData);
        return $this->view;
    }
}