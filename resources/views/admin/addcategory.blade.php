@extends('admin.maindesign')

@section('addcategory')

@if(session('category_message'))
<div style="border:1px solid blue; color:white; border-radius:4px rounded; padding: 10px;
    background-color:blue: margin-bottom:10px;">
    {{session('category_updated_message')}}

    </div>
@endif
<div class="container-fluid">
    <form action="{{route('admin.postaddcategory')}}" method="POST">
        @csrf
        <input type="text" name="category" placeholder="Enter Category Name">
        <input type="submit" name="submit" value="Add Category">
    </form>
</div>
@endsection