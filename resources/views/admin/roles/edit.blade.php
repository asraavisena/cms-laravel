<x-admin-master>
    @section('content')
    <div class="col-sm-6">
        <h1 class="h3 mb-4 text-gray-800">Edit Role {{$role->name}}</h1>
        @if(session('role-updated'))
        <div class="alert alert-danger">{{session('role-updated')}}</div>
        @endif
        <form method="POST" action="{{route('roles.update', $role->id)}}" enctype="multipart/form-data">
        
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" value="{{$role->name}}" >
            </div>
            <button class="btn btn-primary">Update</button>
        </form>
    </div>
    @endsection
</x-admin-master>