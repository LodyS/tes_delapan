<head>
    <title>Transisi</title>
 </head>


<body>
    <div class="container">
        <h3>Perusahaan</h3>

            <form action="{{route('transisi.update', $data->id )}}" method="PUT" enctype="multipart/form-data">@csrf


            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control" value="{{ optional($data)->nama }}" name="nama" maxlength="50" required>
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-12">
                    <input type="email" class="form-control" value="{{ optional($data)->email }}" name="email" maxlength="50" required>
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Logo</label>
                    <div class="col-sm-12">
                    <input type="file" class="form-control" id="logo" name="logo" accept="image/png">
                    <input type="hidden" name="cek_logo" value="{{ optional($data)->logo }}">
                </div>
            </div>

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Website</label>
                    <div class="col-sm-12">
                    <input type="text" class="form-control" value="{{ optional($data)->email }}" name="website" maxlength="50" required>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Simpan</button>
            </div>
        </div>
    </div>
</form>


<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


