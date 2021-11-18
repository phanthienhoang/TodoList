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
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $atribute = [
                'start_date' => $_POST['start_date_filter'],
                'end_date' => $_POST['end_date_filter'],
            ];

            $data = $this->taskModel->getDataTask($atribute);
        }else{
            $data = $this->taskModel->getDataTask(null);

        }
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

        //check data input
        $valid =$this->validate($atribute);
        if(empty($valid)){
            $this->taskModel->createTask($atribute);
            echo json_encode( array("statusCode"=>200));
        }else{
            echo json_encode(array("statusCode"=>$valid));
        }
    }

    public function edit($id)
    {
        $atribute = [
            'id' => $id
        ];

        $data = $this->taskModel->editTask($atribute);
        echo json_encode($data);
    }

    public function update()
    {
        $atribute = [
            'work_name' => $_POST['work_name'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'status' => $_POST['status'],
            'id' => $_POST['id']
        ];

        //check data input
        $valid =$this->validate($atribute);
        if(empty($valid)){
            $this->taskModel->updateTask($atribute);
            echo json_encode( array("statusCode"=>200));
        }else{
            echo json_encode(array("statusCode"=>$valid));
        }
    }

    public function droppable()
    {
        $atribute = [
            'status' => $_POST['status'],
            'id' => str_replace("draggable-","",$_POST['id'])
        ];

        $this->taskModel->droppableTask($atribute);
        echo json_encode( array("statusCode"=>200));
    }

    public function delete($id)
    {
        $atribute = [
            'id' =>  $id
        ];

        //check data input
        $data = $this->taskModel->deleteTask($atribute);
        echo json_encode($data);
    }

    public function validate($atribute)
    {
        $atribute = array_filter(array_map('trim', $atribute));
        if(empty($atribute['work_name'])){
            $error['work_name'] = "work_name is require";
        }
        if(empty($atribute['start_date'])){
            $error['start_date']= "start_date is require";
        }
        if(empty($atribute['end_date'])){
            $error['end_date'] = "end_date is require";
        } else if ($atribute['end_date'] < $atribute['start_date']) {
            $error['end_date'] = "end_date cannot be less than start_date";
        }
        if(empty($atribute['status'])){
            $error['status'] = "status is require";
        }
        return $error;
    }
}
