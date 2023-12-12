<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel Ajax Crud Example with Image Upload Tutorial - Tuts Make</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <a href="javascript:void(0)" class="btn btn-info ml-3" id="create">Add New</a>

        <div style="height:30px"></div>

        <table class="table table-bordered table-striped" id="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>S. No</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>

    <div class="modal fade" id="ajax-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="crudModal"></h4>
                </div>

                <div class="modal-body">
                    <form id="form" name="form" class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="product_id" id="product_id">

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-12">
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Tilte" value="" maxlength="50" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Code</label>
                                <div class="col-sm-12">
                                <input type="text" class="form-control" id="code" name="code" placeholder="Enter Tilte" value="" maxlength="50" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-12">
                                <input type="text" class="form-control" id="description" name="description" placeholder="Enter Description" value="" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Image</label>
                                <div class="col-sm-12">
                                <input id="image" type="file" name="image" accept="image/*" onchange="readURL(this);">
                                <input type="hidden" name="hidden_image" id="hidden_image">
                            </div>
                        </div>

                        <img id="modal-preview" src="https://via.placeholder.com/150" alt="Preview" class="form-group hidden" width="100" height="100">

                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" id="btn-save" value="create">Save</button>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</body>

<script>
var SITEURL = '{{URL::to('')}}';

$(document).ready( function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('borak') }}",

        columns: [
            { data: 'id', name: 'id', 'visible': false },
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false,searchable: false },
            { data: 'image', name: 'image', orderable: false},
            { data: 'title', name: 'title' },
            { data: 'code', name: 'code' },
            { data: 'description', name: 'description' },
            { data: 'action', name: 'action', orderable: false },
        ],
        order: [[0, 'desc']]
    });

    /*  When user click add user button */
    $('#create').click(function () {
        $('#btn-save').val("create-product");
        $('#product_id').val('');
        $('#form').trigger("reset");
        $('#crudModal').html("Add New Borak");
        $('#ajax-modal').modal('show');
        $('#modal-preview').attr('src', 'https://via.placeholder.com/150');
    });
    /* When click edit user */
});

$('body').on('submit', '#form', function (e) {
    e.preventDefault();
    var actionType = $('#btn-save').val();
    $('#btn-save').html('Sending..');
    var formData = new FormData(this);

    $.ajax({
        type:'POST',
        url: "{{ url('borak-store') }}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
            $('#form').trigger("reset");
            $('#ajax-modal').modal('hide');
            $('#btn-save').html('Save Changes');
            var oTable = $('#table').dataTable();
            oTable.fnDraw(false);
        },

        error: function(data, error){
            console.log('Error:', data);
            $('#btn-save').html('Save Changes');
        }
    });
});

function hapus(id)
{
    if (confirm("Apakah Anda yakin hapus data ini ?") == true) {
    var id = id;

    $.ajax({
        type:"POST",
        url: "{{ url('borak-delete') }}",
        data: {
                id: id,
                _token : "{{ csrf_token() }}",
            },

        dataType: 'json',
        success: function(res){
            var oTable = $('#table').dataTable();
                oTable.fnDraw(false);
            }
        });
    }
}

function readURL(input, id)
{
    id = id || '#modal-preview';
    if (input.files && input.files[0]) {

        var reader = new FileReader();
        reader.onload = function (e) {
            $(id).attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
        $('#modal-preview').removeClass('hidden');
        $('#start').hide();
    }
}
</script>
