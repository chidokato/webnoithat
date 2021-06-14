<section class="section4 bgf1f1f1">
	<div class="uk-container uk-container-center customer-container">
		<div class="home-title">
			<span class="separator_wrapper">{{$bottom_sections1->name}}</span>
			<div class="line"></div>
		</div>

		<div class="uk-grid mb-30">
			<div class="uk-width-large-1-1  about-content">
				{!! $bottom_sections1->content !!}
			</div>
		</div>

		<div class=" uk-grid lib-grid-20 uk-grid-width-1-2 uk-grid-width-medium-1-4 uk-grid-width-large-1-4">
			@foreach($bottom_sections as $val)
			<div class=" div-room">
				<div class="iteam-why">
					<img src="data/section/300/{{$val->img}}">
					<h4>{{$val->name}}</h4>
					{!! $val->content !!}
				</div>
			</div>
			@endforeach
		</div>
	</div>
</section><!-- .commitment-section -->

<section class="section5">
	<div class="uk-container uk-container-center customer-container">
		<div class="uk-grid mb-30">
			<div class="uk-width-large-1-1  home-contact">
				<h3>NHẬN TƯ VẤN MIỄN PHÍ</h3>
				<div class="note">Tặng kèm Ebook 39 mẫu Thiết kế nội thất mới nhất 2019 trị giá 19$</div>
				<form action="" method="post" class="form">
					<p><input type="text" name="name" placeholder="Họ & Tên"></p>
					<p><input type="text" name="phone" placeholder="Số điện thoại"></p>
					<p><input type="text" name="email" placeholder="Email"></p>
					<p><input type="submit" value="ĐĂNG KÝ"></p>
				</form>
			</div>
		</div>
	</div>
</section><!-- .commitment-section -->