@extends('admin.maindesign')

@section('view_category')

@if(session('deletecategory.message'))
<div style="margin bottom: 10px; color: black: background-color:oragered,">
    {{session('deletecategory_message')}}
</div>
@endif

<html>
<head>
    <title>view category</title>
    <style>
        table {
            width: 60%;
            border-collapse: collapse;
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<table border="1" cellpadding="12" cellspacing="0">
    <tr>
        <th>Category ID</th>
        <th>Category Name</th>
        <th>Action</th>
        
    </tr>

    @foreach ($categories as $category)
        <tr>
            <td style="padding:12px;">{{ $category->id }}</td>
            <td style="padding:12px;">{{ $category->category }}</td>
            <td style="padding:12px;">
                <a href="{{route('admin.categorydelete',$category->id)}}" onclick= "return confirm ('Are you  sure?')">Delete</a>
                <a href="{{route('admin.updatecategory',$category->id)}}" style="color:green">Update</a>
            </td>
        </tr>
    @endforeach
</table>

</body>
</html>    </tr>
</table>

</body>
</html>

@endsection