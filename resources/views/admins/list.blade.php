@extends('layout')
@section('content')
@include('sweetalert::alert')

<div class="container mt-4">
    <div class="row">
    <div class="col-md-12">
<h1> Basic CRUD  Admin  
<a  href="/admins/adding" class="btn btn-primary mb-2"> + Admin </a>
</h1>

<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr class="table-info">
            <th width="5%" class="text-center">No.</th>
            <th width="30%">Admin Name</th>
            <th width="30%">Email/Username</th>
            <th width="10%">Phone</th>
            <th width="5%">edit</th>
            <th width="5%">delete</th>
            <th width="5%">PWD</th>
        </tr>
    </thead>

    <tbody>
        @foreach($admins as $row)
        <tr>
            <td align="center">{{ $row->id }} </td>
            <td>{{ $row->name }} </td>
            <td>{{ $row->username }} </td>
            <td>{{ $row->phone }} </td>
            <td>
                    <a href="/admins/{{ $row->id }}" class="btn btn-warning btn-sm">edit</a>
            </td>
            <td>
                <form action="/admins/remove/{{$row->id}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm">delete</button>
                </form>
            </td>
            <td>
                <a href="/admins/reset/{{ $row->id }}" class="btn btn-info btn-sm">reset</a>
        </td>
        </tr>
        @endforeach
    </tbody>

</table>
</div>
</div>
</div>
@endsection

{{-- devbanban.com  --}}