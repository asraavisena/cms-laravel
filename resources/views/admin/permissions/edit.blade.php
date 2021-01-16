<x-admin-master>
    @section('content')
    <div class="row mb-4">
        <div class="col-sm-6">
            <h1 class="h3 mb-4 text-gray-800">Edit Permission {{$permission->name}}</h1>
            @if(session('permission-updated'))
            <div class="alert alert-success">{{session('permission-updated')}}</div>
            @endif
            <form method="POST" action="{{route('permissions.update', $permission->id)}}" enctype="multipart/form-data">
            
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{$permission->name}}" >
                </div>
                <button class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

    @endsection
</x-admin-master>