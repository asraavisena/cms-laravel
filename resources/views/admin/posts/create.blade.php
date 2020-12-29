<x-admin-master>
    @section('content')
        <h1>Create a post</h1>
        @if(session('post-create-fail-message'))
        <div class="alert alert-danger">{{session('post-create-fail-message')}}</div>
        @endif
    <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter title">
        </div>
        <div class="form-group">
            <label for="title">File</label>
            <input type="file" name="post_image" class="form-control-file" id="post_image" placeholder="Enter title">
        </div>
        <dif class="form group">
            <label for="">Body</label>
            <textarea name="body" class="form-control" id="body" cols="30" rows="10"></textarea>
        </dif>
        <input type="submit" name="submit">
    </form>
    @endsection
</x-admin-master>