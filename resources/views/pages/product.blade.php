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
            <div class="uk-container uk-container-center">
                <ul class="uk-breadcrumb">
                    <li class="uk-active"><a href="https://duyvillas.com/" title="Trang chủ"><i class="fa fa-home"></i> Trang chủ</a></li>
                    <li>Đất Nền</li>
                </ul>
            </div>
        </div>

		<div class="home-title">
			<span class="separator_wrapper">DỰ ÁN THI CÔNG MỚI NHẤT</span>
			<div class="line"></div>
		</div>
		<div class="uk-container uk-container-center">
			<ul class="uk-grid lib-grid-20 uk-grid-width-1-2 uk-grid-width-medium-1-4 uk-grid-width-large-1-4 list-product" data-uk-grid-match="{target:'.title'}">
				@foreach($articles as $val)
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

		@include('layout.bottom')
	</div><!-- .uk-container -->
</section>

@endsection