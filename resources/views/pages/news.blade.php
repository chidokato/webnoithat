@extends('layout.index')

@section('title'){{ isset($category->title) ? $category->title : $category->name }}@endsection
@section('description'){{$category->description}}@endsection
@section('keywords'){{$category->keywords}}@endsection
@section('robots'){{ $category->robot == 0 ? 'index, follow' : 'noindex, nofollow' }}@endsection
@section('url'){{asset('').$category['slug']}}@endsection

@section('content')
<section id="body">
  <div class="product-page" class="page-body">
    <div class="breadcrumb">
            <div class="uk-container uk-container-center customer-container">
                <ul class="uk-breadcrumb">
                    <li class="uk-active"><a href="https://duyvillas.com/" title="Trang chủ"><i class="fa fa-home"></i> Trang chủ</a></li>
                    <li>Đất Nền</li>
                </ul>
            </div>
        </div>
    <div class="uk-container uk-container-center customer-container">
      <div class="uk-grid ">
          <div class="uk-width-large-3-4">
              <section class="artcatalogue">
                  <section class="panel-body">
                      <ul class="uk-list list-article">
                        @foreach($articles as $val)
                        <li>
                          <article class="article uk-clearfix">
                              <div class="thumb img-flash">
                                  <a class="image img-cover" href="detail-news.php"><img src="data/news/300/{{$val->img}}" alt=""></a>
                              </div>
                              <div class="info">
                                  <h2 class="title"><a href="detail-news.php">{{$val->name}}</a></h2>
                                  <div class="meta">
                                      <i class="fa fa-user"></i> {{$val->user->name}}
                                      <i class="fa fa-clock-o"></i> {{date('d/m/Y',strtotime($val->created_at))}}
                                      <i class="fa fa-folder-open"></i> {{$val->category->name}}
                                      <i class="fa fa-eye"></i> {{$val->hits}} view
                                  </div>
                                  <div class="description lib-line-4">{{$val->detail}}</div>
                              </div>
                          </article><!-- .article-1 -->
                        </li>
                        @endforeach
                      </ul><!-- .list-article -->
                  </section><!-- .panel-body -->
              </section>
          </div><!-- .uk-width-larg-3-4 -->
          <div class="uk-width-large-1-4 uk-visible-large">
              <aside class="aside">
                  <section class="aside-prd-detail aside-whyus">
                      <div class="prd-detail">
                          <div class="call-groups">
                              <a class="btn uk-flex uk-flex-middle uk-flex-space-between" href="tel:0904 558 318" title="Showroom 1">
                                  <div class="text">
                                      <span class="title">0904 558 318</span>
                                  </div>
                              </a>
                          </div>
                      </div>
                  </section><!-- .aside-prd-detail -->
                  <section class="aside-prd-detail">
                      <header class="panel-head">
                          <a href="location/ha-noi"><h3 class="heading"><span>Hà Nội</span></h3></a>
                      </header>
                      <section class="panel-body">
                          <ul class="uk-list list">
                              <li style="padding: 5px; border-bottom: dashed 1px #ddd;"><a href="location/ha-noi/quan-ba-dinh">Quận Ba Đình</a></li>
                          </ul>
                      </section>
                  </section><!-- .aside-prd-detail -->
                  <section class="aside-prd-detail aside-product">
                      <header class="panel-head">
                          <h3 class="heading"><span>Tin tức mới nhất</span></h3>
                      </header>
                      <section class="panel-body">
                          <ul class="uk-list list-product">
                              <li>
                                  <div class="product uk-clearfix">
                                      <div class="thumb">
                                          <a class="image img-cover" href="tin-tuc-bds/xu-huong-dan-noi-thanh-di-cu-sang-quan-long-bien-an-cu-lac-nghiep-/94.html" title="Xu hướng dân nội thành di cư sang Quận Long Biên “an cư lạc nghiệp”"><img src="data/news/80-60/Hai bờ sông Hồng.jpg" alt="Xu hướng dân nội thành di cư sang Quận Long Biên “an cư lạc nghiệp”"></a>
                                      </div>
                                      <div class="infor">
                                          <h4 class="title"><a href="tin-tuc-bds/xu-huong-dan-noi-thanh-di-cu-sang-quan-long-bien-an-cu-lac-nghiep-/94.html" title="Xu hướng dân nội thành di cư sang Quận Long Biên “an cư lạc nghiệp”">Xu hướng dân nội thành di cư sang Quận Long Biên “an cư lạc nghiệp”</a></h4>
                                      </div>
                                  </div>
                              </li>
                          </ul>
                      </section>
                  </section><!-- .aside-panel -->
              </aside>
          </div>        
      </div>
    </div>
    @include('layout.bottom')
  </div><!-- .uk-container -->
</section>
@endsection