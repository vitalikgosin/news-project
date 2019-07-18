@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

    @if(!empty($categories_id))

    <ul class="list-inline">

        @foreach ($categories_id  as $key => $cat)
            @foreach ($cat  as $id => $cat_name)

            <li class="list-inline-item"><a class="social-icon text-xs-center" target="_blank" href="category/{{$id}}">{{$cat_name}}</a></li>

        @endforeach
        @endforeach

    </ul>
    @endif
    <div class="card">
        <div class="card-header">News</div>
        <ul class="posts-list">

            @foreach ($category_posts as $post)
                <li>
                <h2>
                    <a href="{{ @route('post', $post->post_slug)  }}">
                    {{$post->post_title}}
                    </a>
                </h2>

                    @if ($post->post_img)
                        <a href="{{ @route('post', $post->post_slug)  }}">
                            <img src="{{Storage::url($post->post_img ) }}" style="max-width: 200px;">
                        </a>
                    @endif

                    <p>
                        {!! nl2br(e($post->post_content)) !!}
                    </p>
                </li>
            @endforeach
        </ul>
        {{ $category_posts->onEachSide(1)->links() }}
    </div>
</div>
</div>
</div>
@endsection

