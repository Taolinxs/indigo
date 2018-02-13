@extends('layouts.base')

@section('title')
{{ $page->title }} | @parent
@endsection

@section('keywords'){{ $page->title }}@endsection
@section('description'){{ $page->description ?: $page->title }}@endsection

@section('content')
    @component('components.header')
        <div class="center white-text">
            <div class="row">
                <h2>{{ $page->title }}</h2>
            </div>
        </div>
    @endcomponent

    <div class="container post-main">
        <div class="row">

            @if($page->description)
                <div class="col s12 post-desc">
                    <div class="card-panel teal">
                        <blockquote class="white-text flow-text">
                            {{ $page->description }}
                        </blockquote>
                    </div>
                </div>
            @endif

            <div class="col s12 post-body">
                <div class="card-panel page-panel">

                    {{-- TODO when use api, content should be parse first, use transformer or parse markdown before store--}}
                    <div id="post-content" class="flow-text post-content">
                        {!! $page->content !!}
                    </div>

                </div>

            </div>

            <div class="col s12 post-comment">
                @include('partials.comment')
            </div>

        </div>
    </div>
@endsection
