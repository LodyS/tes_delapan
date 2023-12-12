<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
.txtedit{
    display: none;
    width: 99%;
    height: 30px;
}

.edit{
    width: 100%;
    height: 25px;
}

.table__header {
    background-color: transparent;
    border: none;
    cursor: pointer;
}
</style>


<title>Task</title>

<div class="container" >
    <div class="row justify-content-center" >
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-task" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5zM3 3H2v1h1z"/>
                        <path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5M5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1z"/>
                        <path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5zM2 7h1v1H2zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm1 .5H2v1h1z"/>
                    </svg>

                    {{ __('Taks List') }}
                </div>

                <div style="height:10px"></div>

                <div>
                    <a class="btn btn-primary btn-sm" onClick="add()" href="javascript:void(0)" style="float:right"> Create Task</a>
                </div>

                <div style="height:30px"></div>

                <p style="color:red;">
                    * Klik baris tabel untuk edit kolom description<br/>
                    * Klik header tabel untuk ganti urutan list berdasarkan kolom
                </p>

                <div>
                    <button style="margin-bottom: 10px; float:left" class="btn btn-secondary btn-sm update_all" data-url="{{ url('task-done') }}">Complete Status</button>
                </div>

                <table class="table" id="sort">
                    <thead>
                        <tr>
                            <th width="50px"><input type="checkbox" id="master"></th>
                            <th style="width:10%">No</th>
                            <th><button class="table__header"><b>Title</b></button></th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Actions</th> 
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($data as $key=> $d)
                            <tr>
                                <td><input type="checkbox" class="sub_chk" data-id="{{ $d->id }}"></td>
                                <td>{{ ++$key }}</td> 
                                <td>
                                    <div class="edit"><?php echo $d->title;?></div>
                                    <input type="text" class="txtedit" id="title_<?php echo $d->id; ?>" value="{{ $d->title }}">
                                </td> 

                                <td>
                                    <div class="edit"><?php echo $d->description;?></div>
                                    <input type="text" class="txtedit"  id="description_<?php echo $d->id; ?>" value="{{ $d->description }}">
                                </td> 

                                <td><span class="badge bg-{{ ($d->status == 'Completed') ? 'success' : 'secondary' }}">{{ $d->status }}</span></td>
                                <td>
                                    <a href="javascript:void(0);"  onClick="hapus({{ $d->id }})" class="hapus btn btn-danger btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                        </svg>
                                    </a>
                                </td> 
                            </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- modal -->
<div class="modal fade" id="task-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="TaskModal"></h4>
        </div>

        <div class="modal-body">
            <form action="javascript:void(0)" id="TaskForm" name="TaskForm" class="form-horizontal" method="POST">
                <input type="hidden" name="id" id="id">
                        
                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-12">
                        <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                    </div>
                </div>

                <div style="height:30px"></div>

                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" id="btn-save">Save changes</button>
                </div>
            </form>
        </div>
                
    </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">

function add(){
    $('#TaskForm').trigger("reset");
    $('#TaskModal').html("Add Task");
    $('#task-modal').modal('show');
    $('#id').val('');
}

$('#TaskForm').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        type:'POST',
        url: "{{ url('store-task')}}",
        data: formData,
        cache : false,
        contentType : false,
        processData : false,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: (data) => {
            $("#task-modal").modal('hide');
            $("#btn-save").html('Submit');
            $("#btn-save"). attr("disabled", false);
            location.reload();
        },

        error: function(data){
            console.log(data);
        }
    });
});

$('#master').on('click', function(e) {
    if($(this).is(':checked',true)){
        $(".sub_chk").prop('checked', true);
    } else {
        $(".sub_chk").prop('checked',false);
    }
}); //untuk centang semua data yang akan di update

$('.update_all').on('click', function(e) {

    var allVals = []; // menampung nilai isi array yang dipilih

    $(".sub_chk:checked").each(function() {
        allVals.push($(this).attr('data-id'));
    });

    if(allVals.length <=0){
        alert("Silahkan pilih data yang akan di update.");
    } else {
        var check = confirm("Anda yakin akan update data ini?");

        if(check == true){
            var join_selected_values = allVals.join(",");
            var status = $(this).data('id');

            $.ajax({
                url: $(this).data('url'),   
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data : {
                    ids : join_selected_values,
                    status : status
                },
                success: function (data) {   
                    location.reload();
                },
            });
        }
    }
});

// edit column
// Show Input element
$('.edit').click(function(){
    $('.txtedit').hide();
    $(this).next('.txtedit').show().focus();
    $(this).hide();
});

// Save data
$(".txtedit").on('focusout',function(){        
    // Get edit id, field name and value
    var id = this.id;
    var split_id = id.split("_");
    var field_name = split_id[0];
    var edit_id = split_id[1];
    var value = $(this).val();
        
    // Hide Input element
    $(this).hide();
    // Hide and Change Text of the container with input elmeent
    $(this).prev('.edit').show();
    $(this).prev('.edit').text(value);

    // Sending AJAX request
    $.ajax({
        url: "{{ url('update-task') }}",
        type: "POST",
        data: { 
            field:field_name, 
            value:value, 
            id:edit_id,
            _token : "{{ csrf_token() }}",
        },
        success:function(response){
            if(response == 1){ 
                console.log('Save successfully');     
            }else{ 
                console.log("Not saved.");     
            }  
        }
    });
});

function hapus(id){
    if (confirm("Are you sure want to delete this data ?") == true) {
    
        $.ajax({
            type:"POST",
            url: "{{ url('delete-task') }}",
            data: {
                id : id,
                _token : "{{ csrf_token() }}",
            },
            dataType: 'json',
            success: function(res){
                location.reload();
            }
        });
    }
}

// sort table 
document.addEventListener('DOMContentLoaded', function () {
    const table = document.getElementById('sort');
    const headers = table.querySelectorAll('th');
    const tableBody = table.querySelector('tbody');
    const rows = tableBody.querySelectorAll('tr');

    // Track sort directions
    const directions = Array.from(headers).map(function (header) {
        return '';
    });

    // Transform the content of given cell in given column
    const transform = function (index, content) {
        // Get the data type of column
        const type = headers[index].getAttribute('data-type');
        switch (type) {
            case 'number':
                return parseFloat(content);
            case 'string':
            default:
                return content;
        }
    };

    const sortColumn = function (index) {
        // Get the current direction
        const direction = directions[index] || 'asc';
        // A factor based on the direction
        const multiplier = direction === 'asc' ? 1 : -1;
        const newRows = Array.from(rows);

        newRows.sort(function (rowA, rowB) {
            const cellA = rowA.querySelectorAll('td')[index].innerHTML;
            const cellB = rowB.querySelectorAll('td')[index].innerHTML;

            const a = transform(index, cellA);
            const b = transform(index, cellB);

            switch (true) {
                case a > b:
                    return 1 * multiplier;
                case a < b:
                    return -1 * multiplier;
                case a === b:
                    return 0;
            }
        });
        // Remove old rows
        [].forEach.call(rows, function (row) {
            tableBody.removeChild(row);
        });
        // Reverse the direction
        directions[index] = direction === 'asc' ? 'desc' : 'asc';
        // Append new row
        newRows.forEach(function (newRow) {
            tableBody.appendChild(newRow);
        });
    };

    [].forEach.call(headers, function (header, index) {
        header.addEventListener('click', function () {
            sortColumn(index);
        });
    });
});
</script>