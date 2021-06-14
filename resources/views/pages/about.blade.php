@extends('layout.index')

@section('title')
<?php if ( $category['title'] == '' ) echo $category['name']; else echo $category['title']; ?>
@endsection
@section('description')
<?php echo $category['desc']; ?>
@endsection
@section('keywords')
<?php echo $category['key']; ?>
@endsection
@section('robots')
<?php if ( $category['robot'] == 0 ) echo "index, follow";  elseif ( $category['robot'] == 1 ) echo "noindex, nofollow"; ?>
@endsection
@section('url')
<?php echo asset('').$category['slug']; ?>
@endsection

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
                    <header class="panel-head">
                        <h1 class="heading-2"><span>Xu hướng dân nội thành di cư sang Quận Long Biên “an cư lạc nghiệp”</span></h1>
                    </header>
                    <section class="panel-body">
                        <div class="detail-content">
                            <p style="text-align:justify"><em>Xu hướng lựa chọn Long Biên là nơi để "an cư lạc nghiệp" đang gia tăng, nhất là sau thời điểm bùng phát dịch Covid-19. Trong đó, tỷ trọng khách hàng tìm kiếm đến từ khu vực phố cổ chiếm phần lớn.</em></p>


                        </div>
                    </section><!-- .panel-body -->
                </section>
			    </div><!-- .uk-width-larg-3-4 -->
			    <div class="uk-width-large-1-4 uk-visible-large">
			        <aside class="aside">
			            <section class="aside-prd-detail">
			                <header class="panel-head">
			                    <a href="location/ha-noi"><h3 class="heading"><span>Giới thiệu</span></h3></a>
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
			                        @foreach($news_hits as $val)
					                  <li>
					                      <div class="product news uk-clearfix">
					                          <div class="thumb">
					                              <a class="image img-cover" href="{{$val->category->slug}}/{{$val->slug}}" ><img src="data/news/80/{{$val->img}}" alt="{{$val->name}}"></a>
					                          </div>
					                          <div class="infor">
					                              <h4 class="title"><a href="{{$val->category->slug}}/{{$val->slug}}" >{{$val->name}}</a></h4>
					                          </div>
					                      </div>
					                  </li>
					                  @endforeach
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