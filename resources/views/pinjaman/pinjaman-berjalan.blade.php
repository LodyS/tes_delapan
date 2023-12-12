<head>
    <title>Pinjaman Berjalan</title>
</head>

<body>
    <div class="container">
        <h3 align="center">Pinjaman Berjalan</h3>

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nama Nasabah</th>
                    <th>Total Pinjaman</th>
                    <th>Bunga/bulan</th>
                    <th>Tenor</th>
                    <th>Aksi</th>
                </tr>

                @foreach($pinjaman as $key => $p)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $p->nama_nasabah }}</td>
                    <td>Rp.{{ number_format($p->total_pinjaman) }}</td>
                    <td>{{ $p->suku_bunga_per_bulan }}</td>
                    <td>{{ $p->tenor }}</td>
                    <td><a href="{{ url('pinjaman/anuitas', $p->id) }}" class="btn btn-success">Anuitas</a></td>
                </tr>
            @endforeach
        </table>
    </div>
</body>


<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
