@extends('layouts.app')

@section('title', $user->name . ' profile')

@section('content')

<div class="row">

  <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
    <div class="card ">
      	<img class="card-img-top" src="{{ $user->avatar }}" alt="{{ $user->name }}">
       <div class="card-body">
            <h5><strong>Personnal info</strong></h5>
             <p>{{ $user->introduction }}</p>
            <hr>
            <h5><strong>Registered in</strong></h5>
            <p>{{ $user->created_at->diffForHumans() }}</p>
      </div>
    </div>
  </div>
  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
    <div class="card ">
      <div class="card-body">
          <h1 class="mb-0" style="font-size:22px;">{{ $user->name }} <small>{{ $user->email }}</small></h1>
      </div>
    </div>
    <hr>

    {{-- Submitted Content --}}
    <div class="card ">
      <div class="card-body">
         <ul class="nav nav-tabs">
          <li class="nav-item"><a class="nav-link active bg-transparent" href="#">The topic</a></li>
          <li class="nav-item"><a class="nav-link" href="#">The reply</a></li>
        </ul>
        @include('users._topics', ['topics' => $user->topics()->recent()->paginate(5)])
      </div>
    </div>

  </div>
</div>
@stop