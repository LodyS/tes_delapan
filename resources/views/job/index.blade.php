<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>Laravel Traits Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<form method="post" action="{{ url('/simpan-update-karyawan') }}">  {{ @csrf_field() }}
<body>
    <div class="container mt-5">
        <table class="table table-inverse">

                <tr>
                    <th>Transcation Number</th>

                </tr>
                <!--@foreach($pekerjaan->chunk(30) as $data)-->
                @foreach ($pekerjaan as $j)
                <tr>
                <td>{{ $j->job_title }}</td>
                <td><input type="text" name="first_name[{{$j->id}}]" value="{{ isset($karyawan[$j->id]) ? $karyawan->first_name : '' }}"></td>
                </tr>
                @endforeach
                <!--@endforeach-->

        </table>
        <button type="submit" class="btn btn-primary" id="btn-save">Simpan</button>
    </div>
</body>

</html>
