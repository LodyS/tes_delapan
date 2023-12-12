<div class="container">
    <h3 align="center">Pinjaman Berjalan</h3>

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Jatuh Tempo</th>
            <th>Angsuran Per Bulan</th>
        </tr>

        @php $date = new dateTime($pinjaman->tanggal_disetujui); @endphp
        @for ($i=1; $i<=$pinjaman->tenor; $i++)
        @php $date = getCutoffDate($date); @endphp
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $date->format('d-m-Y') }}</td>
            <td>Rp. {{ number_format($angsuran_per_bulan) }}</td>
        </tr>
        @endfor
    </table>
</div>

<link href="{{ asset('css/app.css') }}" rel="stylesheet">

