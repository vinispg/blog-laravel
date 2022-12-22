@extends('master')

@section('header-intro')
    <h2>Nova postagem</h2>
@endsection

@section('main')

    <div class="container">

        <form action="{{ route('atualizar.post', $post->id) }}" method="POST"  enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">

            {{ $errors->first('title') }}
            <div class="form-group">
                <label for="exampleFormControlInput1">Título</label>
                <input type="text" value="{{ $post->title }}" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Título da postagem">
            </div>

            {{ $errors->first('slug') }}
            <div class="form-group">
                <label for="exampleFormControlInput1">Subtítulo</label>
                <input type="text" value="{{ $post->slug }}" name="slug" class="form-control" id="exampleFormControlInput1" placeholder="Subtítulo">
            </div>

            {{ $errors->first('content') }}
            <div class="form-group mt-2">
                <label for="exampleFormControlTextarea1">Escreva seu artigo</label>
                <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="5">{{ $post->content }}</textarea>
            </div>

            {{ $errors->first('thumb') }}
            <div class="form-group mt-2">
                <label class="btn btn-primary" value="{{ $post->thumb }}" for="exampleFormControlFile1">Imagem do artigo (obrigatório)</label>
                <input type="file" value="{{ $post->thumb }}" name="thumb" class="form-control-file" id="exampleFormControlFile1">
            </div>

            <div class="form-group row mt-2">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Postar</button>
                </div>
            </div>
        </form>

    </div>

@endsection
