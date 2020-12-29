<x-admin-master>
    @section('content')
        <h1>Edit a post</h1>
    <form method="POST" action="{{route('post.update', $post->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter title" value="{{$post->title}}">
        </div>
        <div class="form-group">
        <div><img width="150px" src="{{$post->post_image}}" alt=""></div>
            <label for="title">File</label>
            <input type="file" name="post_image" class="form-control-file" id="post_image" placeholder="Enter title">
        </div>
        <dif class="form group">
            <label for="">Body</label>
            <textarea name="body" class="form-control" id="body" cols="30" rows="10">{{$post->body}}</textarea>
        </dif>
        <input type="submit" name="submit">
    </form>
    @endsection
</x-admin-master>