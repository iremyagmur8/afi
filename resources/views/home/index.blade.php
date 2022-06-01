@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')

    @isset($cData->place[1])
        <div id="slider" class="inspiro-slider slider-fullscreen dots-creative" data-height-xs="360">
            @foreach($cData->place[1] as $key=>$val)
                <div class="slide kenburns"
                     @isset($val->files[0]->file) data-bg-parallax="{{Storage::url("images/userfiles/". $val->files[0]->file)}}" @endisset>
                    <div class="bg-overlay"></div>
                    <div class="container">
                        <div class="slide-captions text-light">
                            @isset($val->shortdescription)
                                <span data-animate="fadeInUp" data-animate-delay="300" class="strong">
                                <a href="#" class="business">
                                    <span class="business">{{$val->shortdescription}}</span>
                                </a>
                            </span>
                            @endisset
                            @isset($val->title) <h1 data-animate="fadeInUp"
                                                    data-animate-delay="600">{{$val->title}}</h1> @endisset
                            <div data-animate="fadeInUp" data-animate-delay="900">
                                @isset($val->buttontext)
                                    <a href="{{$val->link}}">
                                        <button type="button" class="btn btn-rounded btn-reveal btn-reveal-left"
                                                style="padding: 12px 34px;"><span>{{$val->buttontext}}</span><i
                                                class="fa fa-arrow-right"></i></button>
                                    </a>
                                @endisset
                            </div>
                            <div class="row">
                                @isset( $cData->custom)
                                    @foreach( $cData->custom as $key=>$val)
                                        <div class="col-lg-4 m-t-50" data-animate="fadeInUp" data-animate-delay="1200">
                                            <h4>{{$val->title}}</h4>
                                            <p>{!! $val->description !!}</p>
                                        </div>
                                    @endforeach
                                @endisset
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endisset

    <!--@isset($cData->place[1])
        <div id="slider" class="inspiro-slider">
            @foreach($cData->place[1] as $key=>$val)
            <div class="slide"
@isset($val->files[0]->file) style="background-image:url('{{Storage::url("images/userfiles/". $val->files[0]->file)}}');background-repeat: no-repeat;background-size: cover;background-position: center center" @endisset>
                    <div class="container">
                        <div class="slide-captions text-left text-light">
                            <div class="col-lg-7 right text-light">
                                <div class="hero-heading-2 background-colored text-light">
                                    @isset($val->title)<h3 class="m-b-0">{{$val->title}}</h3>@endisset
            @isset($val->description)<p class="lead">{!! $val->description !!}</p>@endisset
            @isset($val->buttontext) <a @isset($val->link) href="{{$val->link}}"
                                                                @endisset class="btn btn-light"
                                                                href="#">{{$val->buttontext}}</a> @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
            </div>
@endisset
        -->
    @isset($cData->place[2][0])
        <div class="call-to-action call-to-action-colored">
            <div class="container">
                <div class="row">
                    @isset($cData->place[2][0]->files[0]->file)
                        <div class="col-md-2">
                            <img src="{{Storage::url("images/userfiles/". $cData->place[2][0]->files[0]->file)}}"
                                 width="140" alt="">
                        </div>
                    @endisset

                    <div class="col-lg-8">
                        @isset($cData->place[2][0]->title)<h3
                            class="text-light ">{{$cData->place[2][0]->title}}</h3> @endisset
                        @isset($cData->place[2][0]->description)<p>{!! $cData->place[2][0]->description !!}</p>@endisset
                    </div>
                    @isset($cData->place[2][0]->buttontext)
                        <div class="col-lg-2">
                            <a @isset($cData->place[2][0]->link) href="{{$cData->place[2][0]->link}}"
                               @endisset class="btn btn-light btn-outline">{{$cData->place[2][0]->buttontext}}</a>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    @endisset

    <section>
        <div class="container">
            @isset($cData->subcategory)
                <div class="row">
                    <div class="col-lg-4">
                        <div class="row">
                            @foreach($cData->subcategory as $key=>$val)
                                @isset($val->title)
                                    <div class="col-lg-12 categoryCol"
                                         onclick="location.href='/{{str_slug($val->title,"-")}}/{{$val->id}}.htm'">
                                        <button type="button" class="btn btn-rounded btn-outline btn-reveal"
                                                style="width: 100%">
                                            <div class="text-left mt-4" style="width: 90%">
                                                <span>{{$val->title}}</span></div>
                                            <i class="icon-chevron-right fa-2x"></i></button>
                                        <div class="seperator m-0"></div>
                                    </div>
                                @endisset
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="carousel" data-items="2" data-dots="false" data-lightbox="gallery">
                            <!-- portfolio item -->
                            <div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-Media">
                                <div class="portfolio-item-wrap">
                                    <div class="portfolio-image">
                                        <a href="#"><img
                                                src="https://afielektrik.com/images/userfiles/%7FEMT%20Set%20Screw%20Type%20Connectors,%20Die%20Cast%20Zinc.png"
                                                alt=""></a>
                                    </div>
                                    <div class="portfolio-description">
                                        <a title="Paper Pouch!" data-lightbox="gallery-image"
                                           href="https://afielektrik.com/images/userfiles/%7FEMT%20Set%20Screw%20Type%20Connectors,%20Die%20Cast%20Zinc.png"
                                           class="btn btn-light btn-rounded">Zoom</a>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio-item img-zoom ct-photography ct-media ct-branding ct-Media">
                                <div class="portfolio-item-wrap">
                                    <div class="portfolio-image">
                                        <a href="#"><img
                                                src="https://www.afielektrik.com/images/userfiles/EMT%20Compression%20Type%20Couplings,%20Die%20Cast%20Zinc.png"
                                                alt=""></a>
                                    </div>
                                    <div class="portfolio-description">
                                        <a title="Paper Pouch!" data-lightbox="gallery-image"
                                           href="https://www.afielektrik.com/images/userfiles/EMT%20Compression%20Type%20Couplings,%20Die%20Cast%20Zinc.png"
                                           class="btn btn-light btn-rounded">Zoom</a>
                                    </div>
                                </div>
                            </div>
                            <!-- end: portfolio item -->
                        </div>
                        <div class="text-desc m-t-50 mt-sm-0">
                            <h4>{{$cData->about->title}}</h4>
                            <p>{{$cData->about->shortdescription}}</p>
                        </div>
                    </div>
                </div>
            @endisset
        </div>
    </section>
    @isset($cData->references)
        <section>
            <div class="container">
                <div class="heading-text heading-line heading-section mb-0">
                    <h4 style="font-weight: normal;margin-bottom:0;">{{$cData->references[0]->category->title}}</h4>
                </div>
                <div class="carousel client-logos" data-items="5" data-items-sm="4" data-items-xs="3"
                     data-items-xxs="2" data-margin="20" data-arrows="true" data-autoplay="true"
                     data-autoplay="3000" data-loop="true" data-dots="false">
                    @foreach($cData->references as $key=>$val)
                        <div class="">
                            <a href="#"><img src="{{Storage::url("images/userfiles/". $val->files[0]->file)}}"
                                             class="py-2"
                                             alt="">{{$val->title}}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endisset
@endsection
