@extends('master')

<title>Posts</title>

@section('header-intro')

    <h2 class=""><strong>Listando os {{ $posts->total() }} Posts</strong></h2>

@endsection

@section('main')
    <div class="container">
        <section class="text-center">


            <div class="posts">

                @forelse($posts as $post)

                    <div class="col-lg-4 col-md-12 mb-4 post">
                        <div class="card">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img src="/images/posts/{{ $post->thumb }}" class="img-fluid" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">
                                    {{ Str::limit($post->slug, 50, '...')  }}
                                </p>
                                <p>
                                    Autor: {{ $post->user->fullName }} - {{ $post->comments->count() }} <i class="fa-regular fa-comment"></i>
                                </p>
                                <a href="{{ route('post', $post->slug) }}" class="btn btn-primary">Leia mais</a>
                            </div>
                        </div>
                    </div>

                @empty
                    <h2>Nenhum registro encontrado no banco de dados</h2>
                @endforelse

            </div>

        </section>

        <div class="paginator d-flex justify-content-center">
        {{ $posts->links() }}
        </div>
        <!--Section: Content-->
    </div>


@endsection


