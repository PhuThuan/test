@extends('trangchu')
@section('content')
@foreach ($product as $products)
    {{$products->name}}
    <br>
    {{$products->description}}
    <br>
   <img src="{{ asset('img/'.$products->image) }}" alt="">
   <br>
    <a href="{{route('deteteProduct',['id'=>$products->id])}}" >xóa</a>
    <br>
@endforeach
@endsection
