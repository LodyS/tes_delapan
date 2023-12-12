<head>
    <title>Laravel 8 - Multiple delete records with checkbox example</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>

    <link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>
    <div class="container">
        <h3>Laravel 8 - Update data multiple checkbox</h3>
        <button style="margin-bottom: 10px" class="btn btn-primary update_all" data-url="{{ url('update-produk') }}" data-id="Y">Update Data Terpilih</button>
        <button style="margin-bottom: 10px" class="btn btn-danger update_all" data-url="{{ url('update-produk') }}" data-id="N">Bikin Ga Lunas</button>

        <table class="table table" id="table">
            <thead>
                <tr>
                    <th width="50px"><input type="checkbox" id="master"></th>
                    <th width="80px">No</th>
                    <th>Nama</th>
                    <th>Detail</th>
                    <th width="100px">Status</th>
                </tr>
            </thead>
        </table>
    </div>
</body>

<script type="text/javascript">
$(document).ready(function () {

    $('#table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ url('produk-cekbok') }}",
        columns: [
            { data: 'action', name: 'action', orderable: false},
            { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
            { data: 'nama', name: 'nama'},
            { data: 'detail', name:'detail' },
            { data: 'status', name:'status' },
        ],
        order: [[0, 'asc']]
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

            if(check == true)
            {
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
                        var oTable = $('#table').dataTable();
                        oTable.fnDraw(false);
                    },
                });
            }
        }
    });
});
</script>
