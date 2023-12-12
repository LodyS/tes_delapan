<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h3>Data Perusahaan</h3>
                </div>

        <form method="post" action="{{ url('/simpan-update') }}">  {{ @csrf_field() }}

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                </tr>
                @foreach ($data as $key => $d)
                <tr>
                    <td><input name="name[{{ $d->id }}]" value="{{ isset($d->id) ? $d->name : '' }}"></td>
                </tr>
                @endforeach
            </table>
        <button type="submit" class="btn btn-primary" id="btn-save">Simpan</button>
    </div>
</div>

<link href="{{ asset('css/app.css') }}" rel="stylesheet">
