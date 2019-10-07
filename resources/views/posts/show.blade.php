@extends('layouts.app')

@section('title', '| Create New Post')

@section('content')
<div class="conteiner">
    <div class="conteiner">
        <div class="row justify-content-center">
            <img style="max-width: 800px" src="/{{$post->image}}" />
        </div>
    </div>
    <br />
    <div class="conteiner justify-content-center">
        <div class="row justify-content-center">
            <h4>{{$post->name}}</h4>
        </div>
    </div>
    <br />

    <div class="conteiner justify-content-center">
        <div class="row justify-content-center">
            კატეგორიები:&nbsp;
            {{ implode(", ",$post->categories->pluck('title')->toArray()) }}
        </div>
    </div>
</div>

@endsection
