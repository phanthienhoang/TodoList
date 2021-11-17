<?php
class taskController extends Controller
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

    public function get_task()
    {
        echo "json";
    }

    public function add()
    {
        $atribute = [
            'word_name' => $_POST['word_name'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'status' => $_POST['status']
        ];

        $data = $this->taskModel->createTask($atribute);
        return $data;
    }
}
