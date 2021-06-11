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
        <span class="separator_wrapper">AEC - DẪN ĐẦU PHONG CÁCH HIỆN ĐẠI</span>
        <div class="line"></div>
      </div>
      <div class="uk-grid ">
        <div class="uk-width-large-2-5 uk-visible-large about-img">
          <img src="data/themes/{{$bannherhomes->img}}">
        </div>
        <div class="uk-width-large-3-5 uk-visible-large about-content">
          <p>AEC JSC là thương hiệu lớn và uy tín trong ngành thiết kế và thi công nội thất, khác biệt với các đơn vị trên thị trường là AEC chỉ làm một phong cách duy nhất là Hiện Đại. Đồng thời là đơn vị tiên phong tạo ra xu hướng trong phong cách hiện đại với những giải pháp về ứng dụng vật liệu, màu sắc và mảng khối đồng nhất trong phong cách hiện đại. Với 10 năm kinh nghiệm, AEC hiện đang sở hữu nhà máy sản xuất cùng quy trình quản lý đạt chuẩn, đội ngũ được đào tạo bài bản. Nhằm đáp ứng nhu cầu khách hàng ngày càng gia tăng tại các tỉnh thành trong cả nước, với mục tiêu mở rộng và cung cấp tốt nhất các dịch vụ tiện ích cho khách hàng. AEC hiện là đơn vị có nhiều công trình thi công nhất và luôn cập nhật những hình ảnh thực tế giúp khách hàng có những đánh giá khách quan nhất về chúng tôi.</p>
        </div>
      </div>
    </div>
  </section><!-- .commitment-section -->

  <section class="section2 bgf1f1f1">
    <div class="home-title">
      <span class="separator_wrapper">THIẾT KẾ NỘI THẤT PHONG CÁCH HIỆN ĐẠI</span>
      <div class="line"></div>
    </div>
    <div class="tab">
        <button class="tablinks active" onclick="openCity(event, 'London')">Dự án thiết kế</button>
        <button class="tablinks" onclick="openCity(event, 'Paris')">Dự án thi công</button>
        <button class="tablinks" onclick="openCity(event, 'Tokyo')">Đồ bán lẻ</button>
    </div>

    <div id="London" class="tabcontent" style="display: block;">
      <div class="uk-container uk-container-center">
        <ul class="uk-grid lib-grid-20 uk-grid-width-1-2 uk-grid-width-medium-1-4 uk-grid-width-large-1-4 list-product" data-uk-grid-match="{target:'.title'}">
            product
        </ul>
      </div>
    </div>

    <div id="Paris" class="tabcontent">
        <div class="uk-container uk-container-center">
        <ul class="uk-grid lib-grid-20 uk-grid-width-1-2 uk-grid-width-medium-1-4 uk-grid-width-large-1-4 list-product" data-uk-grid-match="{target:'.title'}">
            product
        </ul>
      </div>
    </div>

    <div id="Tokyo" class="tabcontent">
        <div class="uk-container uk-container-center">
        <ul class="uk-grid lib-grid-20 uk-grid-width-1-2 uk-grid-width-medium-1-4 uk-grid-width-large-1-4 list-product" data-uk-grid-match="{target:'.title'}">
            product
        </ul>
      </div>
    </div>
  </section><!-- .commitment-section -->
  <section class="section3">
    <div class="home-title">
      <span class="separator_wrapper">DỰ ÁN THI CÔNG MỚI NHẤT</span>
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
