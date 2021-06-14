@extends('layout.index')

@section('title'){{ isset($head_setting->title) ? $head_setting->title : $head_setting->name }}@endsection
@section('description'){{$head_setting->description}}@endsection
@section('keywords'){{$head_setting->keywords}}@endsection
@section('robots'){{ $head_setting->robot == 0 ? 'index, follow' : 'noindex, nofollow' }}@endsection
@section('url'){{asset('').$head_setting['slug']}}@endsection
@section('img') data/section/1.jpg @endsection

@section('content')
<?php use App\articles; ?>
<section id="body">
@include('layout.slider')
<div id="homepage" class="page-body">
  @foreach($sections as $key => $section)
  @if($key==0)
  <section class="section1">
    <div class="uk-container uk-container-center customer-container">
      <div class="home-title">
        <span class="separator_wrapper">{{$section->name}}</span>
        <div class="line"></div>
      </div>
      <div class="uk-grid ">
        <div class="uk-width-large-2-5  about-img">
          <img src="data/section/{{$section->img}}">
        </div>
        <div class="uk-width-large-3-5  about-content">
          {!! $section->content !!}
        </div>
      </div>
    </div>
  </section><!-- .commitment-section -->
  @elseif($key==1)
  <section class="section2 bgf1f1f1">
    <div class="home-title">
      <span class="separator_wrapper">{{$section->name}}</span>
      <div class="line"></div>
    </div>
    <div class="tab">
        @foreach($homes_category as $key => $val)
        <button class="tablinks {{$key==0?'active':''}}" onclick="openCity(event, '{{$val->id}}')">{{$val->name}}</button>
        @endforeach
    </div>
    @foreach($homes_category as $key => $homes_cat)
    <?php $articles = articles::where('sort_by',1)->where('category_id',$homes_cat->id)->where('status','true')->orderBy('hits','desc')->paginate(10); ?>
    <div id="{{$homes_cat->id}}" class="tabcontent" style="{{$key==0?'display: block;':''}}">
      <div class="uk-container uk-container-center">
        <ul class="uk-grid lib-grid-20 uk-grid-width-1-2 uk-grid-width-medium-1-4 uk-grid-width-large-1-4 list-product" data-uk-grid-match="{target:'.title'}">
            @foreach($homes_articles as $val)
            <li>
              <div class="product">
                  <div class="thumb">
                      <a class="image img-cover img-shine" href="{{$val->category->slug}}/{{$val->slug}}"><img src="data/product/300/{{$val->img}}" alt="{{$val->name}}"></a>
                  </div>
                  <div class="infor">
                      <h3 class="title" style="min-height: 44px;"><a href="{{$val->category->slug}}/{{$val->slug}}" >{{$val->name}}</a></h3>
                  </div>
              </div>
          </li>
          @endforeach
          @foreach($homes_articles as $val)
            <li>
              <div class="product">
                  <div class="thumb">
                      <a class="image img-cover img-shine" href="{{$val->category->slug}}/{{$val->slug}}"><img src="data/product/300/{{$val->img}}" alt="{{$val->name}}"></a>
                  </div>
                  <div class="infor">
                      <h3 class="title" style="min-height: 44px;"><a href="{{$val->category->slug}}/{{$val->slug}}" >{{$val->name}}</a></h3>
                  </div>
              </div>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
    @endforeach
    
  </section><!-- .commitment-section -->
  @elseif($key==2)
  <section class="section3">
    <div class="home-title">
      <span class="separator_wrapper">{{$section->name}}</span>
      <div class="line"></div>
    </div>
    <div class="uk-container uk-container-center">
      <ul class="uk-grid lib-grid-20 uk-grid-width-1-2 uk-grid-width-medium-1-4 uk-grid-width-large-1-4 list-product" data-uk-grid-match="{target:'.title'}">
        @foreach($homes_articles as $val)
            <li>
              <div class="product">
                  <div class="thumb">
                      <a class="image img-cover img-shine" href="{{$val->category->slug}}/{{$val->slug}}"><img src="data/product/300/{{$val->img}}" alt="{{$val->name}}"></a>
                  </div>
                  <div class="infor">
                      <h3 class="title" style="min-height: 44px;"><a href="{{$val->category->slug}}/{{$val->slug}}" >{{$val->name}}</a></h3>
                  </div>
              </div>
          </li>
          @endforeach
          @foreach($homes_articles as $val)
            <li>
              <div class="product">
                  <div class="thumb">
                      <a class="image img-cover img-shine" href="{{$val->category->slug}}/{{$val->slug}}"><img src="data/product/300/{{$val->img}}" alt="{{$val->name}}"></a>
                  </div>
                  <div class="infor">
                      <h3 class="title" style="min-height: 44px;"><a href="{{$val->category->slug}}/{{$val->slug}}" >{{$val->name}}</a></h3>
                  </div>
              </div>
          </li>
          @endforeach
      </ul>
    </div>
  </section><!-- .commitment-section -->
  @endif
  @endforeach
  @include('layout.bottom')
</div><!-- .uk-container -->


<script type="text/javascript">
  function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
@endsection
