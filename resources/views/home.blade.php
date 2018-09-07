@extends('layouts.home')
@section('title','University of Calabar Graduate School')
@section('content')
   
    <!-- Hero Section-->
    <section class="hero hero-home">
      <div class="swiper-container hero-slider">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div style="background: url(img/hero-img.jpg);" class="hero-content has-overlay-dark">
              <div class="container">
                <div class="row">
                  <div class="col-lg-8">
                    <h3>Welcome to <span>University of calabar Graduate school Transcript Portal </span></h3>
                    <p class="hero-text pr-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                    <div class="CTAs"><a href="{{url('application')}}" class="btn btn-primary">Apply now</a><a href="{{url('guide')}}" class="btn btn-outline-light">Read more</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div style="background: url(img/hero-img-2.jpg);" class="hero-content has-overlay-dark">
              <div class="container">
                <div class="row">
                  <div class="col-lg-8">
                    <h2>Graduate <span>school Transcript Portal</span></h2>
                    <p class="hero-text pr-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                    <div class="CTAs"><a href="{{url('application')}}" class="btn btn-primary">Apply now</a><a href="{{url('guide')}}" class="btn btn-outline-light">Read more</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div style="background: url(img/hero-img-3.jpg);" class="hero-content has-overlay-dark">
              <div class="container">
                <div class="row">
                  <div class="col-lg-8">
                   <h3>Welcome to <span>University of Calabar Graduate school Transcript Portal </span></h3>
                    <p class="hero-text pr-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
                    <div class="CTAs"><a href="{{url('application')}}" class="btn btn-primary">Apply now</a><a href="{{url('guide')}}" class="btn btn-outline-light">Read more</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Add Pagination-->
        <div class="swiper-pagination"></div>
      </div>
    </section>

    <!-- Intro Section-->
    <section class="intro">
      <div class="container text-center">
        <header>
          <h4>Welcome to UNICAL Graduateschool Transcript Portal</h4>
        </header>
        <div class="row">
          <p class="col-lg-8 mx-auto">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
       
      </div>
    </section>
    @endsection
    
   
  

  
   
  
 