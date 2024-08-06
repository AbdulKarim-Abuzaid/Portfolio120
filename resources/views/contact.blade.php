
@extends('layout.Master')

@section('content')

<div class="container">

    <div class="row">

        <x-button>

            <x-slot name="title">
                <h1>Page Title</h1>
            </x-slot>
            <x-slot name="description">
                <h1>Description</h1>
            </x-slot>

        </x-button>


   </div>

</div>

@endsection
