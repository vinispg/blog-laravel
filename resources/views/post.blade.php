@extends('master')


@section('main')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Excluir publicação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Deseja excluir este artigo permanentemente?
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
                    <a class="btn btn-danger" href="{{ route('post.destroy', $post->id) }}">Excluir</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim Modal -->

    <div class="container">

        <h1>{{ ucfirst($post->title) }}</h1>

            <div class="autor-data mb-2 d-flex justify-content-between">
                <div class="post-dados">
                    <b>{{ $post->user->fullName }}</b> - {{ date('d/m/y', strtotime($post->created_at)) }} às {{ date('H:i', strtotime($post->created_at)) }} | {{ $post->comments->count() }} <i class="fa-regular fa-comment"></i>
                </div>

                @if(auth()->check() && auth()->user()->admin == 1)
                    <div class="opcoes-post-adm">
                        <a class="editar" href="{{ route('editar.post', $post->id) }}"><i class="fa-solid fa-pen-to-square"></i></a>

                        <button class="excluir" type="button" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>

                    </div>
                @endif

            </div>

        <div class="post-completo">

            <div class="thumb-post-completo">
                <img src="/images/posts/{{ $post->thumb }}">
            </div>

            <div class="subtitulo mt-3">
                <p>{{ $post->slug }}</p>
            </div>

            <div class="content-post">

                <p class=" mt-2">
                    {{ $post->content }}
                </p>

            </div>

        </div>

        <hr>

        <h4>Comentários ({{$post->comments->count()}})</h4>


        @if(auth()->check())

            @if(session()->has('error_create_comment'))
                <span>{{ session()->get('error_create_comment') }}</span>
            @endif

            {{ $errors->first('comment') }}
            <form action="{{ route('comment', $post->id) }}" method="post">
                @csrf
                <div class="form-outline">
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                    <textarea name="comment" rows="3" class="md-textarea form-control mt-3"></textarea>
                    <label class="form-label" for="form2Example1">Faça um comentário</label>
                </div>
                <button class="btn btn-primary mt-1 mb-4" type="submit">Comentar</button>
            </form>

        @else
            <div class="login-comment mb-4">
                <b>Para fazer um comentário faça</b> <a class="btn btn-primary btn-sm" href="{{ route('login') }}">LOGIN</a>
            </div>
        @endif




            @forelse($post->comments as $comments)

            <!-- Modal -->
            <div class="modal fade" id="modalComentario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Excluir publicação</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Deseja excluir este comentário permanentemente?
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
                            <a class="btn btn-danger" href="{{ route('comment.destroy', $comments->id) }}">Excluir</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fim Modal -->

                <div class="campo-comentario d-flex justify-content-start">
                    <div class="comentario">
                        <div class="dados-user d-flex align-items-center">
                            <div class="foto-user">
                                <img src="https://scontent.fxap2-1.fna.fbcdn.net/v/t1.6435-9/136944591_3305537212885991_237481790535507991_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=09cbfe&_nc_eui2=AeHMwonuSNTIS3zESBWorL0xW6slGWtBnDRbqyUZa0GcNKEemzzat950OmDyDgg2t1nWSf_J1YLg4a2PIqgcA_-v&_nc_ohc=aCFowu33XFoAX-poFWu&_nc_oc=AQlHBNfm57GTSMdxstwteGqTmk0y7-xARBBXaCkrDXW6k6t0VewEH7muKBtvnxk7UBo&_nc_ht=scontent.fxap2-1.fna&oh=00_AfAbA7HPo2zyArokNmdB5m7RtrwdcLEIXho9M1ltWFEIDA&oe=63C48B20">
                            </div>
                            <div class="dados-user-comment">
                                <b> {{ $comments->user->fullName }} </b>
                                {{ $comments->created_at }}
                                @if(auth()->check() && auth()->user()->id == $comments->user->id)

                                    <a class="exluir" href=""><i class="fa-solid fa-pen-to-square"></i></a>

                                    <button class="excluir" type="button" data-toggle="modal" data-target="#modalComentario">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>

                                @elseif(auth()->check())
                                    <a href=""><i class="fa-solid fa-thumbs-up"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="comentario-text">
                            {{ $comments->comment }}
                        </div>
                    </div>
                </div>

            @empty
                <li>Nenhum comentário para este port.</li>
            @endforelse


    </div>

@endsection
