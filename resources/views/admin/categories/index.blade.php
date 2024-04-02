@extends("admin.layouts.template")

@section('contenu')

<div class="card">
    <div class="card-header">
      <h3 class="card-title">DataTable with default features</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <!-- afficher le message de succès-->
        @if(Session::has("message"))
        <div class="alert alert-success">{{Session::get("message")}}</div>

        @endif
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
          <th>Name</th>
          <th>Action</th>

        </tr>
        </thead>
        <tbody>

@forelse ($categories as $category )
    <tr>
        <td>{{$category->name}}</td>
        <td>
            <a href="{{ route('categories.edit', $category->id) }}"><button class="btn btn-success">Modifier</button></a>
            <form class="d-inline" action="{{route('categories.destroy', $category->id)}}" method="post">
            @csrf
            @method("DELETE")
            <button type="submit" onclick="return confirm('Etes vous sur de supprimer ?')" class="btn btn-success">Delete</button>
            </form>
       </td>

    </tr>
@empty
  <tr><td colspan="2"> </td></tr>
@endforelse



        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
</div>

@endsection
