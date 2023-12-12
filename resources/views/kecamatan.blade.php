@extends('layouts.app')

@section('content')
<!DOCTYPE html>
    <html lang="en">
        <head>
        </head>

    <body>
        <div class="container mt-2">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                    <h2>Eager Loading</h2>
                </div>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Kecamatan</th>
                    <th>Kabupaten</th>
                </tr>
                @foreach($kecamatan as $k)
                <tr>
                    <td>{{ $k->kode }}</td>
                    <td>{{ $k->kecamatan }}</td>
                    <td>{{ $k->kabupaten->kabupaten }}</td>
                </tr>
                @endforeach
            </thead>
        </table>
    </div>
</div>
@endsection


