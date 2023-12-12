<head>
    <title>Nasabah</title>
</head>

<body>
    <div class="container">
        <h3 align="center">Nasabah</h3>

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nama Nasabah</th>
                    <th>Pekerjaan Nasabah</th>
                    <th>Penghasilan Nasabah</th>
                    <th>Maksimal Angsuran Pinjaman/bulan</th>
                    <th>Aksi</th>
                </tr>

                @foreach($data as $key => $p)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $p['nama_nasabah'] }}</td>
                    <td>{{ $p['pekerjaan_nasabah'] }}</td>
                    <td>{{ $p['penghasilan_nasabah'] }}</td>
                    <td>{{ $p['maksimal_angsuran_pinjaman'] }}</td>
                    <td><a href="{{ url('pinjaman/pinjaman-berjalan', $p['id']) }}" class="btn btn-success">Anuitas</a></td>
                </tr>
            @endforeach
        </table>
    </div>
</body>


<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<script src="{{ asset('js/jquery.js') }}"></script>



