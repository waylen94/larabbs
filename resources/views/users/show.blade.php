@extends('layouts.app')

@section('title', $user->name . ' profile')

@section('content')

<div class="row">

  <div class="col-lg-3 col-md-3 hidden-sm hidden-xs user-info">
    <div class="card ">
      <img class="card-img-top" src="https://iocaffcdn.phphub.org/uploads/images/201709/20/1/PtDKbASVcz.png?imageView2/1/w/600/h/600" alt="{{ $user->name }}">
      <div class="card-body">
            <h5><strong>Personnal info</strong></h5>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
            <hr>
            <h5><strong>Registered in</strong></h5>
            <p>January 01 1901</p>
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
        There is no extra data
      </div>
    </div>

  </div>
</div>
@stop