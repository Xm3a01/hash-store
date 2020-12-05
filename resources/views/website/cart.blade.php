@extends('layouts.app')

@section('content')
    <cart :item ="{{ json_encode($item) }}" />
@endsection