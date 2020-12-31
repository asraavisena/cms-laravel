<x-admin-master>
    @section('content')
       <h1 class="h3 mb-4 text-gray-800">User Profile for <strong>{{$user->name}}</strong></h1> 
       <div class="row">
           <div class="col-sm-6">
               <form method="POST" action="{{route('user.profile.update', $user)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <img height="100px" class="img-profile rounded-circle" src="{{$user->avatar}}" >
                    </div>
                    <div class="form-group">
                        <input type="file" name="avatar" class="form-control-file">
                    </div>
                    <div class="form-group">
                        <label for="username">Userame</label>
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{$user->username}}">
                        @error('username')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{$user->name}}">
                        @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{$user->email}}">
                        @error('email')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="form-group">
                        <label for="password-confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password-confirmation">
                    </div>
                    <input type="submit" name="submit">
                </form>
           </div>
       </div>
    @endsection
</x-admin-master>