@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')
    @isset($cData->place[7][0])
        @include('inc.bannerBox', ['place'=> $cData->place[7][0]])
    @endisset
    <section id="page-content">
        <div class="container">
            <div class="row">
                <div class="content col-lg-12">
                    <div>
                        <ul class="grid grid-5-columns">
                            @isset($cData->posts)
                                @foreach($cData->posts as $key=>$val)
                                    <li>
                                        <a href="#"><img alt=""
                                                         src="{{Storage::url("images/userfiles/" . $val->files[0]->file)}}"></a>
                                        <div class="p-20">{{$val->title}}</div>
                                    </li>
                                @endforeach
                            @endisset
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
