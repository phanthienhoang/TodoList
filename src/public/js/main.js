$(document).ready(function()
{
    getDataTask()
    $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
    });
    $('#datetimepicker2').datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
    });
    $('#datetimepicker3').datetimepicker({
    format: 'YYYY-MM-DD HH:mm',
    });
    $('#datetimepicker4').datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
    });
    init();
});

function init() {
    $( ".droppable-area1, .droppable-area2, .droppable-area3" ).sortable({
    connectWith: ".connected-sortable",
    stack: '.connected-sortable ul'
    }).disableSelection();
}

function getDataTask()
{
    $.ajax({
        type: "get",
        url: "api/task/data",
        success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
            var arrPlanning = dataResult.filter(function(item){
                return item.status == "planning";
            });
            var arrDoing = dataResult.filter(function(item){
                return item.status == "doing";
            });
            var arrComplete = dataResult.filter(function(item){
                return item.status == "complete";
            });

            $("#planning").html("");
            $("#doing").html("");
            $("#complete").html("");
            loadData($("#planning"), arrPlanning);
            loadData($("#doing"), arrDoing);
            loadData($("#complete"), arrComplete);

            droppableTask();


        }
    });
}

function droppableTask(){
    $( ".list-items" ).droppable({
        drop: function( event, ui ) {
            console.log(ui.draggable.attr("id"))
            var taskId = ui.draggable.attr("id");
            var newStatus =$(this).attr("id");
            $.ajax({
                data: {
                    id: taskId,
                    status: newStatus
                },
                type: "post",
                url: "api/task/droppable" ,
                success: function(dataResult){
                }
            });
        }
      });
}

function loadData(container, data)
{
    for(let i = 0; i < data.length; i++){
        const task = data[i]
        container.append(`<li class="draggable-item" id="draggable-${task.id}">
                            <div class="row">
                                <div class="col-sm-8" onclick=modalHide(${task.id})>
                                    <p >${task.work_name}</p>
                                </div>
                                <div class="col-sm-2" onclick="delTask(${task.id})">
                                    <p><button><i class="fa fa-trash" aria-hidden="true"></i></button></p>
                                </div>
                            </div>
                        </li>`)
    }
}
function delTask(id){
    var confirm = window.confirm("Do you really want to delete it?")
    if(confirm){
        $.ajax({
            type: "post",
            url: "api/task/delete/" +id ,
            success: function(dataResult){
                $.notify("Data delete successfully !", "success");
                getDataTask()
            }
        });
    }

}
function modalHide(id){
    resetFormModal();
    $('#exampleModal').modal('show');
    if(id != ""){
        $("#id").val(id);
        $.ajax({
            type:"get",
            url: "api/task/edit/" + id,
            success: function(dataResult){
                var dataResult = JSON.parse(dataResult);
                $("#work_name").val(dataResult[0].work_name);
                $("#start_date").val(dataResult[0].start_date);
                $("#end_date").val(dataResult[0].end_date);
                $("#status").val(dataResult[0].status).change();
            }
        });
    }
}
function addStatus(val)
{
    resetFormModal();
    $("#status").val(val).change();
}

function addAndUpdateTask(id)
{
    var data = $("#task_form").serialize();
    if(id == ""){
        $.ajax({
            data: data,
            type: "post",
            url: "api/task/add",
            success: function(dataResult){
                var dataResult = JSON.parse(dataResult);
                if(dataResult.statusCode==200){
                    $('#exampleModal').modal('hide');
                    resetFormModal();
                    $.notify("Data added successfully !", "success");
                    getDataTask();
                }
                else {
                    displayMesErr(dataResult.statusCode)
                }
            }
        });
    }else{
        $.ajax({
            data: data,
            type: "post",
            url: "api/task/update" ,
            success: function(dataResult){
                var dataResult = JSON.parse(dataResult);
                if(dataResult.statusCode==200){
                    $('#exampleModal').modal('hide');
                    resetFormModal();
                    $.notify("Data edit successfully !", "success");
                    getDataTask();
                }
                else {
                    displayMesErr(dataResult.statusCode)
                }
            }
        });
    }
}

function filterTaskByData(event)
{
    event.preventDefault();
    var data = $("#form_search").serialize();
    $.ajax({
        data: data,
        type: "post",
        url: "api/task/data",
        success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
            var arrPlanning = dataResult.filter(function(item){
                return item.status == "planning";
            });
            var arrDoing = dataResult.filter(function(item){
                return item.status == "doing";
            });
            var arrComplete = dataResult.filter(function(item){
                return item.status == "complete";
            });

            $("#planning").html("");
            $("#doing").html("");
            $("#complete").html("");
            loadData($("#planning"), arrPlanning);
            loadData($("#doing"), arrDoing);
            loadData($("#complete"), arrComplete);
        }
    });
}
function displayMesErr(mesErr){
    $("#err_work_name").html("");
    $("#err_start_date").html("");
    $("#err_end_date").html("");
    $("#err_status").html("");
    $("#err_work_name").html(mesErr.work_name);
    $("#err_start_date").html(mesErr.start_date);
    $("#err_end_date").html(mesErr.end_date);
    $("#err_status").html(mesErr.status);
}

function resetFormModal(){
    $("#work_name").val("");
    $("#start_date").val("");
    $("#end_date").val("");
    $("#err_work_name").html("");
    $("#err_start_date").html("");
    $("#err_end_date").html("");
    $("#err_status").html("");
}