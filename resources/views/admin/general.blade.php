@extends('admin.layout')

@section('content')

    <div  class="col-md-9 ml-sm-auto col-lg-9 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    This week
                </button>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>Your requests  </h3>
                <ul>
                @foreach ($requests as $request)

                        <li><a href="{{route('messages', $request['id'])}}">request </a></li>
                    <li>{{$request['request_status']}}</li>
                @endforeach
                </ul>
              </div>
                <div class="col">
                    <h3>Requests received </h3>

                    <ul>
                        @foreach ($courserequests_received as $request_received)

                            <li><a href="{{route('messages', $request_received['id'])}}">request </a></li>
                            <li>{{$request_received['request_status']}}</li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>

    </div>
@endsection