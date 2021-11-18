<?php
class TaskController extends Controller
{
    public $taskModel;

    public function __construct()
    {
        $this->taskModel = $this->model('Task');
    }

    /*
     Page index
    */
    public function index()
    {
        $this->view('task\index', []);
        $this->view->render();
    }

    /*
     Function get data task
    */
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

    /*
     Function add task
    */
    public function add()
    {
        $atribute = [
            'work_name' => $_POST['work_name'],
            'start_date' => $_POST['start_date'],
            'end_date' => $_POST['end_date'],
            'status' => $_POST['status']
        ];

        //check data input
        $err_msg =$this->validateForm($atribute);
        if(empty($err_msg)){
            $this->taskModel->createTask($atribute);
            echo json_encode(array("statusCode"=>200));
        }else{
            echo json_encode(array("error"=>$err_msg));
        }
    }

    /*
     Function show detail task
    */
    public function edit($id)
    {
        $atribute = [
            'id' => $id
        ];

        $data = $this->taskModel->editTask($atribute);
        echo json_encode($data);
    }

    /*
     Function update task
    */
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
        $err_msg =$this->validateForm($atribute);

        if(empty($err_msg)){
            $this->taskModel->updateTask($atribute);
            echo json_encode(array("statusCode"=>200));
        }else{
            echo json_encode(array("error"=>$err_msg));
        }
    }

    /*
     Function update status by droppable
    */
    public function droppable()
    {
        $atribute = [
            'status' => $_POST['status'],
            'id' => str_replace("draggable-","",$_POST['id'])
        ];

        $this->taskModel->droppableTask($atribute);
        echo json_encode(array("statusCode"=>200));
    }

    /*
     Function delete Task
    */
    public function delete($id)
    {
        $atribute = [
            'id' =>  $id
        ];

        //check data input
        $data = $this->taskModel->deleteTask($atribute);
        echo json_encode($data);
    }

    /*
     Validate data input
    */
    public function validateForm($atribute)
    {
        // trim data input
        $atribute = array_filter(array_map('trim', $atribute));
        $error = null;
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
