@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">News</div>
                    <ul class="posts-list">

                        @foreach ($category_posts as $post)
                            <li>
                                <h2>
                                    {{$post->post_title}}
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

