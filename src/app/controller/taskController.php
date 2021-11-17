<?php
class TaskController extends Controller
{
    public $taskModel;

    public function __construct()
    {
        $this->taskModel = $this->model('Task');
    }

    public function index()
    {
        $this->view('task\index', []);
        $this->view->render();
    }

    public function data()
    {
        $data = $this->taskModel->getDataTask();
        echo json_encode($data);
    }

    public function add()
    {   
        $atribute = [
            'work_name' => $_POST['work_name'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'status' => $_POST['status']
        ];

        $data = $this->taskModel->createTask($atribute);
        return $data;
    }

    public function edit($id)
    {   
        $atribute = [
            'id' => $id
        ];

        $data = $this->taskModel->editTask($atribute);
        echo json_encode($data);
    }

    public function update($id)
    {   
        $atribute = [
            'work_name' => $_POST['work_name'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'status' => $_POST['status'],
            'id' => $_POST['id']
        ];

        $data = $this->taskModel->updateTask($atribute, $id);
        return $data;
    }
}
