@extends('layout')

@section('meta-title', $post->title)
@section('meta-description', $post->excerpt)

@section('content')
<article class="post container">

    @include($post->viewType())

    <div class="content-post">

        @include('posts.header')

        <h1>{{ $post->title }}</h1>
        <div class="divider"></div>
        <div class="image-w-text">
            <figure class="block-left">
                <img src="{{-- {{ asset('img/img-post-2.png')}} --}}" alt="">
            </figure>
            <div>
                {!! $post->body !!}
            </div>
        </div>

        <footer class="container-flex space-between">
            @include('partials.social-links', ['description' => $post->title])

            @include('posts.tags')

        </footer>
        <div class="comments">
            <div class="divider"></div>
            <div id="disqus_thread"></div>

            @include('partials.disqus-script')

        </div><!-- .comments -->
    </div>
</article>
@endsection

@push('styles')
<link rel="stylesheet" href="{{ asset('/css/twitter-bootstrap.css')}}">
@endpush

@push('scripts')
<script id="dsq-count-scr" src="//zendero.disqus.com/count.js" async></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="{{ asset('/js/twitter-bootstrap.js')}}"></script>
@endpush
