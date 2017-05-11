@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Databases</div>

    <div class="panel-body">
        <a href="{{ route('databases.create') }}" class="btn btn-success">Create</a>
    </div>
</div>

@endsection
