@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')
    @isset($cData->place[5][0])
        @include('inc.bannerBox', ['place'=> $cData->place[5][0]])
    @endisset
    <section id="page-content" class="background-grey" style="padding: 40px 0;">
        <div class="container">
            <div class="row">
                <div class="content col-md-12">
                    <div id="portfolio" class="grid-layout portfolio-3-columns" data-margin="20">
                        @foreach($cData->posts as $key=>$val)
                            @isset($val->files[0]->file)
                                <div class="portfolio-item img-zoom ct-photography ct-marketing ct-media">
                                    <div class="portfolio-item-wrap">
                                        <div class="portfolio-image">
                                            <a href="#"><img
                                                    src="{{Storage::url("images/userfiles/" . $val->files[0]->file)}}"
                                                    alt=""></a>
                                        </div>
                                        <div class="portfolio-description">
                                            <a title="{{$val->title}}" data-lightbox="image"
                                               href="{{Storage::url("images/userfiles/" . $val->files[0]->file)}}"><i
                                                    class="fa fa-expand"></i></a>
                                            <a href=""><i
                                                    class="fa fa-link"></i></a>
                                        </div>
                                    </div>
                                </div>

                            @endisset
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
