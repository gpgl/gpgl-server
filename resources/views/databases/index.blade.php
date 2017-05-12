@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Databases</div>

    <div class="panel-body">
        <ul>
        @forelse ($databases as $database)
            <li>{{ $database->name }}</li>
        @empty
            <p>No databases.</p>
        @endforelse
        </ul>

        <a href="{{ route('databases.create') }}" class="btn btn-success">Create</a>
    </div>
</div>

@endsection
