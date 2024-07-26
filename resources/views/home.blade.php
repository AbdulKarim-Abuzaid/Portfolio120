@extends("layout.Master")

@section('content')

<main role="main" class="container">
    <h1 class="mt-5 text-danger">Blogs</h1>
    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum pariatur ratione quaerat vero a, ullam reiciendis earum distinctio nihil exercitationem quidem neque odit aliquid quasi esse, repudiandae, adipisci non placeat.

  <div class="row mt-5">

     @foreach ($blogs as $blog )

      <div class="col-md-4">

        <div class="card">

             <div class="card-body">
                <h1>{{$blog['title'] }}</h1>
                <p>{{$blog['body']}}</p>
             </div>
        </div>
      </div>
     @endforeach
  </div>
</main>

@endsection
