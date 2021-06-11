<section class="main-slide">
	<div class="uk-slidenav-position slide-show" data-uk-slideshow="{autoplay: true, autoplayInterval: 7500, animation: 'random-fx'}">
		<ul class="uk-slideshow" style="height: 565px;">
			@foreach($slider as $key => $val)
			<li data-slideshow-slide="img" aria-hidden="false" class="{{$key=0? uk-active : ''}}" style="height: 565px;"><div class="uk-cover-background uk-position-cover" style="background-image: url(data/themes/{{$val->img}};);"></div><img src="data/themes/{{$val->img}}" alt="" style="width: 100%; height: auto; opacity: 0;"></li>
			@endforeach
		</ul>
		<a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
		<a href="#" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
		<ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
		@foreach($slider as $key => $val)
		<li data-uk-slideshow-item="{{$key}}" class="{{$key=0? uk-active : ''}}"><a href="#"></a></li>
		@endforeach
	</ul>
	</div>
</section>