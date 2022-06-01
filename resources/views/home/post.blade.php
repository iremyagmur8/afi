@extends('layouts.app')
@section('title', $cData->posts->title." - ")
@section('desc',$cData->posts->shortdescription)
@section('content')

    @isset($cData->place[8][0])
        @include('inc.bannerBox', ['place'=> $cData->place[8][0]])
    @endisset

    @isset($cData->posts->description)
        <section class="postPage">
        <div class="container">
            <div class="row">
                <div class=" @if(isset($cData->posts->files[1]->file))  col-lg-6 @else col-lg-12 @endif">
                    <p>{!! $cData->posts->description !!}</p>
                </div>
                @isset($cData->posts->files[1]->file)
                    <div class="col-lg-6 mt-4">
                        <a href="#"><img src="{{Storage::url("images/userfiles/". $cData->posts->files[1]->file)}}"
                                         alt="" class="img-fluid rounded"></a>
                    </div>
                @endisset
            </div>
        </div>
        </section>
    @endisset

@endsection
