<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css" />
</head>

<body>

<section class="board-info-bar container">
        <div class="">
            <h2>Work space</h2>
        </div>
    </section>
    <br>
    <div class="container">

        <!-- End of board info bar -->

        <!-- Lists container -->
        <section class="lists-container" id="droppable">

            <div class="list">

                <h3 class="list-title">Tasks to Do</h3>

                <ul class="list-items" id="planning" >
                    <!-- <li>Complete mock-up for client website</li>
                    <li>Email mock-up to client for feedback</li>
                    <li>Update personal website header background image</li>
                    <li>Update personal website heading fonts</li>
                    <li>Add google map to personal website</li>
                    <li>Begin draft of CSS Grid article</li>
                    <li>Read new CSS-Tricks articles</li>
                    <li>Read new Smashing Magazine articles</li>
                    <li>Read other bookmarked articles</li>
                    <li>Look through portfolios to gather inspiration</li>
                    <li>Create something cool for CodePen</li>
                    <li>Post latest CodePen work on Twitter</li>
                    <li>Listen to new Syntax.fm episode</li>
                    <li>Listen to new CodePen Radio episode</li> -->
                </ul>

                <button type="button" class="add-card-btn btn-cus" data-toggle="modal" data-target="#exampleModal" onclick="addStatus('planning')">
                    Add a card
                </button>

            </div>

            <div class="list" >

                <h3 class="list-title">Doing</h3>

                <ul class="list-items" id="doing">
                    <!-- <li>Clear email inbox</li>
                    <li>Finalise requirements for client web design</li>
                    <li>Begin work on mock-up for client website</li>
                    <li>Finalise requirements for client web design</li>
                    <li>Begin work on mock-up for client website</li>
                    <li>Finalise requirements for client web design</li>
                    <li>Begin work on mock-up for client website</li> -->
                </ul>

                <button type="button" class="add-card-btn btn-cus" data-toggle="modal" data-target="#exampleModal" onclick="addStatus('doing')">
                    Add a card
                </button>

            </div>
            <div class="list">

                <h3 class="list-title">Complete</h3>

                <ul class="list-items" id="complete">
                    <!-- <li>Clear email inbox</li>
                    <li>Finalise requirements for client web design</li>
                    <li>Begin work on mock-up for client website</li>
                    <li>Finalise requirements for client web design</li>
                    <li>Begin work on mock-up for client website</li>
                    <li>Finalise requirements for client web design</li>
                    <li>Begin work on mock-up for client website</li> -->
                </ul>
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
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">start date</label>
                                        <div class='input-group date' id='datetimepicker1'> 
                                                <input type='text' class="form-control" name="start_date" id="start_date" value=""/>
                                                <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">end date</label>
                                        <div class='input-group date' id='datetimepicker2'>
                                                <input type='text' class="form-control"  name="end_date" id="end_date" value=""/>
                                                <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                                </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">status</label>
                                        <select class="form-control" id="status" name="status" id="status" >
                                            <option value="planning">planning</option>
                                            <option value="doing">doing</option>
                                            <option value="complete">complete</option>
                                        </select>
                                    </div>
                                    <input id="id" name="id" value="" >

                            </div>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

  
                                <button type="button" class="btn btn-primary" onclick="addAndUpdateTask($('#id').val())">Save changes</button>

                                </div>
                            </div>

                            </form>

                        </div>
                    </div>
            </div>

        </section>
    </div>
</body>

<script src="/js/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>


<script src="/js/main.js"></script>

</html>



