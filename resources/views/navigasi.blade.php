@extends('layout.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Navigasi</div>
 
                <div class="card-body">
                    <navigasi-component></navigasi-component>
                    <router-view></router-view>
                </div>
                 
            </div>
        </div>
    </div>
</div>
@endsection