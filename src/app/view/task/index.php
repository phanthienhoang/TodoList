<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js" integrity="sha512-efUTj3HdSPwWJ9gjfGR71X9cvsrthIA78/Fvd/IN+fttQVy7XWkOAXb295j8B3cmm/kFKVxjiNYzKw9IQJHIuQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <section class="board-info-bar container">
        <div class="">
            <h2>Work space</h2>
        </div>
    </section>
    <br>

    <div class="container-fluid">
        <div class="">
            <h2>Filter Task</h2>
        </div>
        <table class="table">
            <tbody>
                <tr>
                    <form id="form_search">
                        <td>
                            <div class='input-group date' id='datetimepicker3'>
                                <input type='text' class="form-control" name="start_date_filter" id="start_date_filter" value="" placeholder="start date" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </td>
                        </th>
                        <td>
                            <div class='input-group date' id='datetimepicker4'>
                                <input type='text' class="form-control" name="end_date_filter" id="end_date_filter" value="" placeholder="end date" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </td>
                        <td>
                            <div class='input-group'><button onclick="filterTaskByData(event)" class="form-control">search</button></div>
                        </td>
                    </form>
                </tr>
            </tbody>
        </table>

    </div>

    <div class="container">
        <section class="lists-container">
            <div class="list">
                <h3 class="list-title">Planning</h3>
                <ul class="connected-sortable droppable-area1 list-items" id="planning">

                </ul>
                <br>
                <button type="button" class="add-card-btn btn-cus" data-toggle="modal" data-target="#exampleModal" onclick="addStatus('planning')">
                    Add a card
                </button>
            </div>

            <div class="list">
                <h3 class="list-title">Doing</h3>
                <ul class="connected-sortable droppable-area2 list-items" id="doing">

                </ul>
                <br>
                <button type="button" class="add-card-btn btn-cus" data-toggle="modal" data-target="#exampleModal" onclick="addStatus('doing')">
                    Add a card
                </button>
            </div>
            <div class="list">
                <h3 class="list-title">Complete</h3>
                <ul class="connected-sortable droppable-area3 list-items" id="complete">

                </ul>
                <br>
                <button type="button" class="add-card-btn btn-cus" data-toggle="modal" data-target="#exampleModal" onclick="addStatus('complete')">
                    Add a card
                </button>
            </div>


            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="task_form">

                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">work name</label>
                                    <input class="form-control" id="work_name" name="work_name" value="">
                                    <label for="error" style="color:red">
                                        <p id="err_work_name"></p>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">start date</label>
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" name="start_date" id="start_date" value="" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                    <label for="error" style="color:red">
                                        <p id="err_start_date"></p>
                                    </label>

                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">end date</label>
                                    <div class='input-group date' id='datetimepicker2'>
                                        <input type='text' class="form-control" name="end_date" id="end_date" value="" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>

                                    <label for="error" style="color:red">
                                        <p id="err_end_date"></p>
                                    </label>

                                </div>
                                <div class="form-group">
                                    <label for="status">status</label>
                                    <select class="form-control" id="status" name="status" id="status">
                                        <option value="planning">planning</option>
                                        <option value="doing">doing</option>
                                        <option value="complete">complete</option>
                                    </select>
                                    <label for="error" style="color:red">
                                        <p id="err_status"></p>
                                    </label>

                                </div>
                                <input id="id" name="id" value="" hidden>

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                <button type="button" class="btn btn-primary" onclick="addAndUpdateTask($('#id').val())">Save changes</button>

                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
 <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js" integrity="sha512-uE2UhqPZkcKyOjeXjPCmYsW9Sudy5Vbv0XwAVnKBamQeasAVAmH6HR9j5Qpy6Itk1cxk+ypFRPeAZwNnEwNuzQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="/js/main.js"></script>

</html>