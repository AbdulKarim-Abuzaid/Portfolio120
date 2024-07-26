@extends('layout.Master')

@section('content')

<div class="container main-cotent mt-5">

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
           Show Post Detail
           <div>
            <a class="btn btn-success" href="{{route("posts.create")}}">Create</a>
            <a class="btn btn-warning" href="">Trashed</a>
           </div>
        </div>

        <div class="card-body">

            <table class="table table-bordered">



                <tbody>


                    <tr>
                        <th>Id</th>
                        <td>{{$post->id}}</td>

                    </tr>
                    <tr>
                        <th>Image</th>
                        <th><img src="{{asset('storage/'.$post->image)}}" width="90px" alt=""></td>
                    </tr>
                    <tr>
                        <th>Title</th>
                        <td>{{$post->title}}</td>

                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{{$post->description}}</td>

                    </tr>

                    <tr>
                        <th>Category</th>
                        <td>{{$post->category_id}}</td>
                    </tr>

                </tbody>
              </table>

        </div>
     </div>
</div>



@endsection
