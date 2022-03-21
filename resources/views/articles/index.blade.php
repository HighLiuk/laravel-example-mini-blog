@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Newest articles</div>

                <div class="card-body">

                    @forelse ($articles as $article)
                    <div class="row">
                        <div class="col-md-4">
                            <img src="{{ $article->getFirstMediaUrl('main_images', 'thumb') }}" />
                        </div>
                        <div class="col-md-8">
                            <a class="text-decoration-none" href="{{ route('articles.show', $article->id) }}">
                                <h2>{{ $article->title }}</h2>
                            </a>
                            <p>
                                <b>Author:</b> {{ $article->author->name }}
                            </p>
                            <p>
                                <b>Categories:</b> {!! $article->categories_links !!}
                            </p>
                            <p>
                                <b>Tags:</b> {!! $article->tags_links !!}
                            </p>
                            <p>{{ substr($article->text, 0, 200) }}...
                                <a class="text-decoration-none" href="{{ route('articles.show', $article->id) }}">Read
                                    full article</a>
                            </p>
                        </div>
                    </div>
                    @if(!$loop->last)
                    <hr style="height: 1px; border: none; background: rgba(0, 0, 0, 0.3)" />
                    @endif
                    @empty
                    No articles yet.
                    @endforelse

                    {{ $articles->links() }}

                </div>
            </div>
        </div>
        <div class="col-md-4">
            @include('articles.sidebar')
        </div>
    </div>
</div>
@endsection