<head>
    <title>Transisi</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body>

<div align="right">
    <button type="button" class="btn btn-primary btn-sm" id="tambah" align="right">Perusahaan</button>
</div>

<div class="container">
    <h3>Perusahaan</h3>

        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Logo</th>
                <th>Webiste</th>
                <th>Aksi</th>
            </tr>
            @foreach($companiet as $key => $p)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->email }}</td>
                    <td><img src="{{ url('storage/'. $p->logo )}}" width="100" heigth="100"></td>
                    <td>{{ $p->website }}</td>
                    <td><a class="btn btn-sm btn-danger edit" href="{{ URL::to('transisi/'.$p->id.'/edit') }}">Edit</a></td>
                </tr>
            @endforeach
        </table>
    </div>
</body>

<div class="modal inmodal fade" id="modal-create" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <form name="frm_edit" id="frm_edit" class="form-horizontal" action="{{route('transisi.store')}}" method="POST" enctype="multipart/form-data">@csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Perusahaan</h4></div>

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Nama</label>
                                <div class="col-sm-12">
                                <input type="text" class="form-control" id="nama" name="nama" maxlength="50" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-12">
                                <input type="email" class="form-control" id="email" name="email" maxlength="50" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Logo</label>
                                <div class="col-sm-12">
                                <input type="file" class="form-control" id="logo" name="logo" accept="image/png" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Website</label>
                                <div class="col-sm-12">
                                <input type="text" class="form-control" id="website" name="website" maxlength="50" required>
                            </div>
                        </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script type="text/javascript">
$('#tambah').on("click",function() {
    $('#modal-create').modal('show');
});
</script>
