<?php use App\category; ?>
<header class="pc-header uk-visible-large">
    <div class="uk-sticky-placeholder">
    	<section class="lower uk-sticky-init uk-active" data-uk-sticky="{top: 0}">
	        <div class="uk-container uk-container-center customer-container">
	            <nav class="main-nav">
	                <a class="logo" href="{{asset('')}}">
	                    <img src="data/themes/{{$head_logo->img}}">
	                </a>
	                <ul class="uk-navbar-nav uk-clearfix main-menu">
	                    <li><a href="{{asset('')}}">Trang chủ</a></li>
	                    @foreach($menu_top as $val)
                        <?php $sub_cats = category::where('parent', $val->id)->get(); ?>
                        @if(count($sub_cats) == 0)
                        <li><a href="{{$val->slug}}">{{$val->name}}</a></li>
                        @else
                        <li><a href="{{$val->slug}}">{{$val->name}}</a>
                            <div class="dropdown-menu"> 
                                <ul class="uk-list sub-menu">
                                    @foreach($sub_cats as $sub_cat)
                                    <li><a href="{{$sub_cat->slug}}">{{$sub_cat->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>   
                        @endif
        				@endforeach
	                </ul>
	            </nav><!-- .main-nav -->
	        </div>
	    </section>
	</div><!-- .lower -->
</header>

<header class="mobile-header uk-hidden-large">
    <section class="upper">
        <a class="moblie-menu-btn skin-1" href="#offcanvas" data-uk-offcanvas="{target:'#offcanvas'}">
            <span>Menu</span>
        </a>
        <div class="logo"><a href="#" title="Logo"><img src="data/themes/{{$head_logo->img}}" alt="Logo"></a></div>
        <a class="mobile-hotline" href="tel: 0911388799" title="Hotline">
            <span class="label">Hotline: </span>
            <span class="value">0911388799</span>
        </a>
    </section><!-- .upper -->
    <section class="lower">
        <div class="mobile-search header-search">
            <form action="#" method="" class="uk-form form">
                <input type="text" name="" class="uk-width-1-1 input-text keyword" placeholder="Bạn muốn tìm gì hôm nay?">
                <button type="submit" name="" value="" class="btn-submit">Tìm kiếm</button>
            </form>
            <div class="searchResult"></div>
        </div>
    </section>
</header>

