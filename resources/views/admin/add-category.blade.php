@extends('admin.layout')

@section('content')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1> Add New Category</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group mr-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Draft</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Delete post</button>
                </div>

            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-9 mr-sm-auto col-lg-10 px-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('admin.create-category')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" name="category_name" class="form-control" id="posttitle" aria-describedby="emailHelp" placeholder="Enter title" value="{{old('title')}}">

                            @if ($errors->get('category_name'))
                                <ol>
                                    @foreach ($errors->get('title') as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ol>
                            @endif
                        </div>

                        <br>
                        <div class="custom-file">
                            <input type="file" name="add_img" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </main>
@endsection
