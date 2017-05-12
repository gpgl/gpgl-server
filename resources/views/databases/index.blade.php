@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Databases</div>

    <div class="panel-body">
        <ul>
        @forelse ($databases as $database)
            <li data-dbid="{{ $database->id }}">
                {{ $database->name }}
                <a class="delete-button" data-toggle="modal"
                    data-target="#modalDelete"
                    onclick="dbid = {{ $database->id }}"
                >
                    <i class="fa fa-trash" aria-hidden="true"></i>
                </a>
            </li>
        @empty
            <p>No databases.</p>
        @endforelse
        </ul>

        <a href="{{ route('databases.create') }}" class="btn btn-success">Create</a>
    </div>
</div>

<!-- Modal -->
<div id="modalDelete" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Delete Database</h4>
      </div>
      <div class="modal-body">
        <p>
            Are you sure you want to delete this database?
            This cannot be undone.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" onclick="deleteDatabase(dbid)">Delete</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
      </div>
    </div>

  </div>
</div>

@endsection

@section('scripts')
<script>
var dbid = 0;
function deleteDatabase(id) {
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        type: "DELETE",
        url: "/databases/" + id,
        success: function(data) {
            $("#modalDelete").modal("hide");
            $("li[data-dbid='"+id+"']").remove();
        }
    });
}
</script>
@endsection
