@extends('layout.Master')

@section('content')

<div class="container main-cotent mt-5">

  {{-- define the error section --}}

  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif

    <div class="card">

        <div class="card-header ">

            <div class="row">

                 <div class="col-md-6">
                    <h4>Edit Post</h4>
                 </div>

                 <div class="col-md-6 d-flex justify-content-end">
                   <a href="{{route('posts.index')}}" class="btn btn-success" href="">Back</a>

                 </div>


            </div>
        </div>

        <div class="card-body">

          <form action="{{route('posts.update', $post->id)}}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
                <div>
                    <img src="{{asset('storage/'.$post->image)}}" alt="">

                </div>
                 <div class="form-group">
                    <label for="" class="form-lable">Image</label>
                    <input type="file" name="image" id="" class="form-control">
                 </div>

                 <div class="form-group">
                    <label for="" class="form-lable">Title</label>
                    <input type="text" name="title" id="" class="form-control"
                    value="{{$post->title}}">
                 </div>

                 <div class="form-group">
                    <label for="" class="form-lable">Category</label>
                    <select name="category" id="" class="form-control">

                        <option> select </option>

                        @foreach ($categories as $category )

                          <option {{$category->id == $post->category_id ? 'selected':''}} value="{{$category->id}}"> {{$category->name}}  </option>
                        @endforeach

                    </select>
                 </div>

                 <div class="form-group">
                    <label for="" class="form-lable">Description</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control">{{$post->description}}</textarea>
                 </div>

                 <div class="form-group mt-4">

                     <button class="btn btn-primary">Submit</button>
                 </div>

             </form>

        </div>
     </div>
</div>



@endsection
