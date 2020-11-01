@extends('admin.layouts.app')

@section('content')
<div id="app">
    @foreach (Cart::getContent() as $item)
        {{$item->name}} - {{$item->price}} - {{$item->quantity}}
    @endforeach
</div>  
@endsection