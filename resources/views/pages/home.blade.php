@extends('layout.index')

@section('title'){{ isset($head_setting->title) ? $head_setting->title : $head_setting->name }}@endsection
@section('description'){{$head_setting->description}}@endsection
@section('keywords'){{$head_setting->keywords}}@endsection
@section('robots'){{ $head_setting->robot == 0 ? 'index, follow' : 'noindex, nofollow' }}@endsection
@section('url'){{asset('').$head_setting['slug']}}@endsection

@section('content')
<section id="body">
@include('layout.slider')
<div id="homepage" class="page-body">
  <section class="section1">
    <div class="uk-container uk-container-center customer-container">
      <div class="home-title">
        <span class="separator_wrapper">{{$section1->name}}</span>
        <div class="line"></div>
      </div>
      <div class="uk-grid ">
        <div class="uk-width-large-2-5 uk-visible-large about-img">
          <img src="data/themes/{{$section1->img}}">
        </div>
        <div class="uk-width-large-3-5 uk-visible-large about-content">
          <p>{{$section1->content}}</p>
        </div>
      </div>
    </div>
  </section><!-- .commitment-section -->

  <section class="section2 bgf1f1f1">
    <div class="home-title">
      <span class="separator_wrapper">{{$section2->name}}</span>
      <div class="line"></div>
    </div>
    <div class="tab">
        @foreach($homes_category as $key => $val)
        <button class="tablinks {{$key==0?'active':''}}" onclick="openCity(event, '{{$val->id}}')">{{$val->name}}</button>
        @endforeach
    </div>
    @foreach($homes_category as $key => $val)
    <div id="{{$val->id}}" class="tabcontent" style="{{$key==0?'display: block;':''}}">
      <div class="uk-container uk-container-center">
        <ul class="uk-grid lib-grid-20 uk-grid-width-1-2 uk-grid-width-medium-1-4 uk-grid-width-large-1-4 list-product" data-uk-grid-match="{target:'.title'}">
            product
        </ul>
      </div>
    </div>
    @endforeach
    
  </section><!-- .commitment-section -->
  <section class="section3">
    <div class="home-title">
      <span class="separator_wrapper">{{$section3->name}}</span>
      <div class="line"></div>
    </div>
    <div class="uk-container uk-container-center">
      <ul class="uk-grid lib-grid-20 uk-grid-width-1-2 uk-grid-width-medium-1-4 uk-grid-width-large-1-4 list-product" data-uk-grid-match="{target:'.title'}">
          product
      </ul>
    </div>
  </section><!-- .commitment-section -->
  @include('layout.bottom')
</div><!-- .uk-container -->
@endsection
