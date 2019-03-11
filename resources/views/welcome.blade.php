@extends('layouts.app')

@section('content')
<style>
.center { 
    display:block;
    margin-left:auto;
    text-align:center;
 }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="center" >
                <img src="{{asset('img/ambulancia.png')}}" width="250px">
                <a href="licasoft" class="btn btn-danger">Central</a>
                <img src="{{asset('img/LOGOLICA.png')}}" width="250px">
                <br>
                
                
                
                
            </div>
        </div>
    </div>
</div>
@endsection
