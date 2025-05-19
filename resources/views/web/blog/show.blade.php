@extends('web.layout')

@section('content')
    <x-web.blog.post.show :post="$post" class="bg-red-100"/>
@endsection
