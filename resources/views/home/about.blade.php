@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')
    @isset($cData->place[3][0])
        @include('inc.bannerBox', ['place'=> $cData->place[3][0]])
    @endisset
    @isset($cData->category)
        <section id="section2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div data-animate="fadeInLeft" data-animate-delay="800">
                            <img src="{{Storage::url('/images/userfiles/'. $cData->category->files[0]->file)}}" alt=""
                                 height="auto" width="100%">
                        </div>
                    </div>
                    <div class="col-lg-6 offset-1" data-animate="fadeInUp" data-animate-delay="1000">
                        <div class="m-b-40">
                            <h1 class="text-medium">{{$cData->category->title}}</h1>
                            <span class="lead">
                                {{$cData->category->shortdescription}}
                            </span>
                        </div>
                        <a href="/contact" class="btn btn-outline btn-dark"><span>Contact</span></a>
                    </div>

                </div>
            </div>
        </section>
    @endisset
    @isset($cData->place[4])
        <section id="section3" class="box-fancy section-fullwidth text-light no-padding">
            <div class="row">
                @foreach($cData->place[4] as $key=>$val)
                    @if($loop->iteration % 2 == 1)
                        <div class="col-lg-3 text-center" style="background-color: rgb(241, 183, 50);">
                            @isset($val->buttontext) <i class="{{$val->buttontext}} fa-5x m-b-10"></i> @endisset
                            @isset($val->title)<h3>{{$val->title}}</h3>@endisset
                            @isset($val->shortdescription)<span>{{$val->shortdescription}}</span>@endisset
                        </div>
                    @else
                        <div class="col-lg-3 text-center" style="background-color: rgb(252, 196, 63);">
                            @isset($val->buttontext) <i class="{{$val->buttontext}} fa-5x m-b-10"></i> @endisset
                            @isset($val->title)<h3>{{$val->title}}</h3>@endisset
                            @isset($val->shortdescription)<span>{{$val->shortdescription}}</span>@endisset
                        </div>
                    @endif
                @endforeach
            </div>
        </section>
    @endisset
    <section id="section4" class="no-padding">
        <div id="portfolio" class="grid-layout portfolio-4-columns" data-margin="0" data-lightbox="gallery">
            @foreach($cData->posts as $key=>$val)
                @foreach($val->files as $fKey=>$fVal)
                    <div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-marketing ct-webdesign">
                        <div class="portfolio-item-wrap">
                            <div class="portfolio-image">
                                <a href="#"><img src="{{Storage::url('/images/userfiles/'. $fVal->file)}}" alt=""></a>
                            </div>
                            <div class="portfolio-description">
                                <a title="Paper Pouch!" data-lightbox="gallery-image"
                                   href="homepages/taxi/images/gallery/1.jpg"
                                   class="btn btn-light btn-rounded">Zoom</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </section>
@endsection
