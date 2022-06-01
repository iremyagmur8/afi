<section id="section1" class="half-screen p-t-100 p-b-100"
         data-bg-image="{{Storage::url('/images/userfiles/'. $place->files[0]->file)}}">
    <div class="bg-overlay"></div>
    <div class="container">
        <div class="container-fullscreen">
            <div class="text-middle">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="text-light p-t-40">
                            <span class="text-medium">{{$place->title}}</span>
                            <p class="p-t-20">{{$place->shortdescription}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@isset($place->files[1]->file)
    <div
        style="width:100%; height:44px; background-image:url({{Storage::url('/images/userfiles/'. $place->files[1]->file)}});
            background-repeat:repeat-x;"></div>
@endisset
