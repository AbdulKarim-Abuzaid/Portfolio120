@extends('layout.Master')

@section('content')

<div class="container main-cotent mt-5">

    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
        Trashed Posts
           {{-- <div>
            <a class="btn btn-success" href="{{route("posts.create")}}">Create</a>
            <a class="btn btn-warning" href="">Trashed</a>
           </div> --}}
        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <thead>
                  <tr>
                    <th scope="col"  style="width: 2% " >#</th>
                    <th scope="col" style="width: 10% " >Image</th>
                    <th scope="col" style="width: 20% " >Title</th>
                    <th scope="col" style="width: 30% " >Description</th>
                    <th scope="col" style="width: 10% " >Category</th>
                    <th scope="col" style="width: 10% " >Publish Date</th>
                    <th scope="col" style="width: 13% " >Action</th>
                  </tr>
                </thead>

                <tbody>

                    @foreach ($posts as $post )

                    <tr>
                        <th scope="row">{{$post->id}}</th>
                        <td><img src="{{asset('storage/'.$post->image)}}" width="90px" alt=""></td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->description}}</td>
                        <td>{{$post->category->name}}</td>
                        <td>{{date('d-m-y',strtotime($post->created_at))}}</td>
                        <td>

                          <div class="d-flex">
                            <a href="{{route('posts.restore', $post->id)}}" class="btn btn-sm btn-success  equal-width-btn">Restore</a>

                          <form action="{{route('posts.force_destroy',$post->id)}}" method="POST">

                           @csrf
                           @method('DELETE')
                           <button  class="btn btn-sm btn-danger equal-width-btn "> Delete</button>

                          </form>
                          </div>


                        </td>

                    </tr>

                    @endforeach


                </tbody>
              </table>

        </div>
     </div>
</div>

