@extends('layouts.app')
@section('title','')
@section('desc','')
@section('content')

    <section class="no-padding">

        <iframe src="{{$vars->contact->googlemap}}" height="500" style="border:0;" allowfullscreen=""
                loading="lazy"></iframe>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="text-uppercase">{{$vars->contact->title}}</h3>
                    <p>{!! $vars->contact->description !!}</p>
                    <div class="row">
                        <div class="col-lg-12">
                            @if($vars->contact->phone)
                                <address>
                                    {{($vars->contact->address)}}
                                </address>
                            @endif
                            @if($vars->contact->phone) <a href="tel:{{$vars->contact->phone}}"
                                                          title="Phone"><strong>Phone1:</strong></h4> {{$vars->contact->phone}}
                            </a>
                            <br>
                            @endif
                            @if($vars->contact->fax) <a href="tel:{{$vars->contact->fax}}"
                                                        title="Phone"><strong>Phone2:</strong></h4> {{$vars->contact->fax}}
                            </a>
                            <br>
                            @endif
                            @if($vars->contact->mail)<a href="mailto:{{$vars->contact->mail}}"
                                                        title="Mail1"><strong>Email:</strong></h4> {{$vars->contact->mail}}
                            </a>
                            <br>
                            @endif
                            @if($vars->contact->mail2)<a href="mailto:{{$vars->contact->mail2}}"
                                                         title="Mail2"><strong>Email2:</strong></h4> {{$vars->contact->mail2}}
                            </a> @endif
                        </div>

                    </div>
                    <div class="social-icons m-t-30 social-icons-colored">
                        <ul>
                            @if($vars->contact->facebook)
                                <li class="social-facebook"><a href="{{$vars->contact->facebook}}"><i
                                            class="fab fa-facebook-f"></i></a></li>@endif
                            @if($vars->contact->twitter)
                                <li class="social-twitter"><a href="{{$vars->contact->twitter}}"><i
                                            class="fab fa-twitter"></i></a></li>@endif
                            @if($vars->contact->linkedin)
                                <li class="social-linkedin"><a target="_blank" href="{{$vars->contact->linkedin}}"><i
                                            class="fab fa-linkedin"></i></a></li>@endif
                            @if($vars->contact->youtube)
                                <li class="social-youtube"><a href="{{$vars->contact->youtube}}"><i
                                            class="fab fa-youtube"></i></a></li>@endif
                            @if($vars->contact->instagram)
                                <li class="social-instagram"><a href="{{$vars->contact->instagram}}"><i
                                            class="fab fa-instagram"></i></a></li>@endif
                            @if($vars->contact->mail)
                                <li class="social-gplus"><a href="{{$vars->contact->mail}}"><i
                                            class="far fa-envelope"></i></a></li>@endif

                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form class="widget-contact-form" action="/iletisim" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Name-Surname</label>
                                <input type="text" aria-required="true" required name="name"
                                       class="form-control name"
                                       placeholder="Please enter your name and surname.">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email *</label>
                                <input type="email" aria-required="true" required name="email"
                                       class="form-control required email" placeholder="Please enter your Email.">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="subject">Your Subject</label>
                                <input type="text" name="subject" required
                                       class="form-control required" placeholder="Please enter your subject.">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea type="text" name="message" required rows="5"
                                              class="form-control required"
                                              placeholder="Please enter your message"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group text-center">
                                    <button class="btn center" type="submit" id="form-submit"><i
                                            class="fa fa-paper-plane"></i>&nbsp;Send Message
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

@endsection
