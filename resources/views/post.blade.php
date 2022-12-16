@extends('master')

@section('header-intro')
<h2>{{ $post->title }}</h2>
@endsection

@section('main')

    <div class="container">
        <div class="post-completo">

            <div class="thumb-post-completo">
                <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg">
            </div>

            <div class="infos-post d-flex mt-2 justify-content-end">
                <div class="autor-post">
                    Vinicios Spigiorin
                </div>
                <div class="data-post">
                    {{ $post->created_at }}
                </div>
            </div>

            <div class="content-post">

                <p class="text-center">
                    {{ $post->content }}
                </p>

            </div>

        </div>
    </div>

@endsection
