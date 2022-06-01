@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')
    <section id="page-content" class="sidebar-left">
        <div class="container">
            <div class="row">

                <div class="content col-lg-9">
                    <div class="row align-items-center">
                        <div class="col-2">
                            <div class="product-image">
                                <img src="{{Storage::url('/images/userfiles/'. $cData->products->files[0]->file)}}" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="product-title">
                                <h3><a href="#">{{$cData->products->title}}</a></h3>
                                <a class="btn" href="#"><i class="icon-shopping-cart"></i> Add to basket</a>
                            </div>
                        </div>
                    </div>
                    <div class="seperator"></div>
                    <div class="product-description">
                        <p>{!! $cData->products->description !!}</p>
                    </div>
                    <a class="btn" href="https://www.afielektrik.com/images/userfiles/EMT%20CONDUIT.pdf"><i class="fa fa-file-pdf fa-fw"></i>&nbsp;PDF Katalog</a>

                </div>


                <div class="sidebar col-lg-3">
                    <div class="widget clearfix widget-archive">
                        <h3 class="widget-title">Product Lines</h3>
                        <ul class="list list-lines">
                            <li><a href="#">Electrical Metalling Tubing (EMT)</a></li>
                            <li><a href="#">EMT Conduits Elbow / Bends</a></li>
                            <li><a href="#">Rigid Steel Conduits (RSC)</a></li>
                            <li><a href="#">Rigid Steel Conduit Elbows / Bends</a></li>
                            <li><a href="#">Rigid Conduit Nipples</a></li>
                            <li><a href="#">Rigid Conduit Couplings</a></li>
                            <li><a href="#">COLOR EMT</a></li>
                            <li><a href="#">Aluminum EMT Conduit</a></li>
                            <li><a href="#">Intermediate Metal Conduit (IMC)</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
