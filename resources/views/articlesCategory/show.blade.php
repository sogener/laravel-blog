@extends('layouts.app')

@section('header')
    <h1>Categories</h1>
@endsection
@section('navigation')
    <li><a href="/articles">Articles</a></li>
    <li><a href="/">Home</a></li>
@endsection
@section('content')
    @foreach($articles as $article)
        <h2><a href="<?=url()->current() . '/' . $article->id?>">{{$article->name}}</a></h2>
        {{-- Str::limit – функция-хелпер, которая обрезает текст до указанной длины --}}
        {{-- Используется для очень длинных текстов, которые нужно сократить --}}
        <div>{{Str::limit($article->description, 200)}}</div>
        <div class="content__actions">
            <div><a href="/articles_categories/{{$article->id}}/edit">Редактировать категорию</a></div>
            <a href="/articles_categories/{{$article->id}}/delete" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Удалить категорию</a>
        </div>
    @endforeach
@endsection
