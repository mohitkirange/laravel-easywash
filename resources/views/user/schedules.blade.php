@extends('layouts.app')

@section('content')

  @if($schedule->count()>0)
        @foreach( $services as $service )
        <table class="table table-hovern table-bordered">
          <thead>
              <th>image</th>
              <th>Business name</th>
              <th>Business Address</th>
              <th>Sp_id</th>
              <th>View</th>

          </thead>
          <tbody>
        <tr>
          <td><img src="{{$service->featured}}" alt="Logo" width="100px" height="100px">
            </td>
          <td>{{$service->name}}</td>
            <td>{{$service->address}} {{$service->city}}<br> {{$service->state}}.{{$service->zipcode}}.</td>
            <td>{{$service->sp_id}}</td>
            <td>
                <a href="{{ route('user.home.details', ['id' => $service->sp_id , 'service_id' => $service->id] )}}" class="btn btn-xs btn-info">View</a>
            </td>

        </tr>
      </tbody>

    </table>
        @endforeach
<table>
  <tbody>
        @else
          <tr>
            <th colspan="5" class="text-center">No Published Services</th>
          </tr>
        @endif

      </tbody>

    </table>


  </div>

  @endsection
