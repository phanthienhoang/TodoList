<?php
class taskController extends Controller
{
    public $modelFashionModel;

    public function __construct()
    {
        // $this->modelFashionModel = $this->model('modelFashion');
    }

    public function index()
    {
        $this->view('task\index', [
            // 'data' => $this->modelFashionModel->getHostModel(),
            // 'model' => $this->modelFashionModel->getModels()
        ]);
        $this->view->render();
    }

    public function modelSingle($id)
    {
        $this->view('model-single\index', [
            'data' => $this->modelFashionModel->getModelSingle($id),
            'albums' => $this->modelFashionModel->getImageAlbum($id),
        ]);
        $this->view->render();
    }
}
