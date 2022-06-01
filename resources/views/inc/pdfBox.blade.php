@foreach($cData->posts as $key=>$val)
    <div class="col-lg-3 col-sm-12 sm-text-center">
        <div class="icon-box effect medium center process mb-sm-4">
            <div class="icon m-b-0"><a href="#"><i style="font-size:45px;  color:#d00"
                                                   class="fa fa-file-pdf"></i></a></div>
            {!! $val->description !!}
        </div>
    </div>
@endforeach
