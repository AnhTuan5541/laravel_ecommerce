@extends('layouts.frontend_layouts.index')
@section('content')
<div class="container text-center">
    <div class="content-404">
        <h1><b>Congratulation!</b> You buy this product successfully</h1>
        <h2>Go Home and continue shopping</h2>
        <h2><a href="{{url('/home')}}">Go Home</a></h2>
        <br>
    </div>
</div>
@endsection