@extends('master')

@section('header-intro')

        <h1 class="mb-3 h2">Learn Bootstrap 5 with MDB</h1>
        <p class="mb-3">Best & free guide of responsive web design</p>
        <a class="btn btn-primary m-2" href="https://www.youtube.com/watch?v=c9B4TPnak1A" role="button" rel="nofollow"
           target="_blank">Start tutorial</a>
        <a class="btn btn-primary m-2" href="https://mdbootstrap.com/docs/standard/" target="_blank"
           role="button">Download MDB UI KIT</a>

@endsection

@section('main')
    <div class="container">
        <section class="text-center">
            <h4 class="mb-5"><strong>Latest posts</strong></h4>

            <div class="posts">

                @forelse($posts as $post)

                    <div class="col-lg-4 col-md-12 mb-4 post">
                        <div class="card">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img src="https://mdbootstrap.com/img/new/standard/nature/184.jpg" class="img-fluid" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">
                                    {{ Str::limit($post->content, 70, '...')  }}
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
        <!--Section: Content-->
    </div>


@endsection


