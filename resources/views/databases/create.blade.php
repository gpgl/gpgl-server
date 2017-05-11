@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Databases</div>

    <div class="panel-body">
        <form
            class="form-horizontal"
            role="form"
            method="POST"
            action="{{ route('databases.store') }}"
        >
        {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-2 control-label">Name</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="name" required>
                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('fingerprint') ? ' has-error' : '' }}">
                <label for="fingerprint" class="col-md-2 control-label">Fingerprint</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="fingerprint" required>
                    @if ($errors->has('fingerprint'))
                        <span class="help-block">
                            <strong>{{ $errors->first('fingerprint') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
