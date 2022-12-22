@extends('master')

@section('header-intro')

    @if(request()->input('s'))
        <h2 class="mb-5"><strong>Listando resultados para: {{ request()->input('s') }} ({{ $posts->total() }})</strong></h2>
    @else
        <h2 class="mb-5"><strong>Últimos Posts</strong></h2>
    @endif

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
                    <h3>Nenhum registro encontrado no banco de dados</h3>
                @endforelse

            </div>

            @if(request()->input('s'))
                <div class="paginator d-flex justify-content-center">
                    {{ $posts->appends(['s' => request()->input('s')])->links() }}
                </div>
            @endif

        </section>
        <!--Section: Content-->
    </div>


@endsection


