@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')
    @isset($cData->place[9][0])
        @include('inc.bannerBox', ['place'=> $cData->place[9][0]])
    @endisset
    <section>
        <div class="container">
            <div class="row">
                @include('inc.pdfBox')
            </div>
        </div>
    </section>

@endsection
