$(document).ready(function() 
{
    getDataTask()
    $('#datetimepicker1').datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
   });
    $('#datetimepicker2').datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
   });
});

function getDataTask()
{
    $.ajax({
        type: "get",
        url: "api/task/data",
        success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
            console.log(dataResult);
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


            $( function() {
                $( ".list-items" ).sortable();
                $( ".draggable" ).draggable();
                $( "#droppable" ).droppable({
                    drop: function( event, ui ) {
                      $( this )
                        .addClass( "ui-state-highlight" )
                        .find( "p" )
                          .html( "Dropped!" );
                    }
                  });
              } );
        }
    });
}

function loadData(container, data)
{
    for(let i = 0; i < data.length; i++){
        const task = data[i]
        container.append(`<li class="draggable ui-state-default" onclick=modalHide(${task.id})>${task.work_name}</li>`)
    }
}

function modalHide(id){
    $('#exampleModal').modal('show');
    $("#id").val(id);
    $.ajax({
        type:"get",
        url: "api/task/edit/" + id,
        success: function(dataResult){
            var dataResult = JSON.parse(dataResult);

            console.log(dataResult[0].work_name);

            $("#work_name").val(dataResult[0].work_name);
            $("#start_date").val(dataResult[0].start_date);
            $("#end_date").val(dataResult[0].end_date);
            $("#status").val(dataResult[0].status).change();
        }
    });

}
function addStatus(val)
{
    $("#status").val(val).change();
}

function addAndUpdateTask(id)
{
    console.log("id" + id)
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
                        alert('Data added successfully !');
                        getDataTask();				
                    }
                    else if(dataResult.statusCode==201){
                        alert(dataResult);
                }
            }
        });
    }else{
        $.ajax({
            data: data,
            type: "post",
            url: "api/task/update/" + id,
            success: function(dataResult){
                    var dataResult = JSON.parse(dataResult);
                    if(dataResult.statusCode==200){
                        $('#exampleModal').modal('hide');
                        alert('Data added successfully !');
                        getDataTask();							
                    }
                    else if(dataResult.statusCode==201){
                        alert(dataResult);
                }
            }
        });
    }
}