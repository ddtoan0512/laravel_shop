@extends('layouts.app')
@section('content')
<!-- breadcrumbs area start -->
<div class="breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="container-inner">
          <ul>
            <li class="home">
              <a href="/">Trang chủ</a>
              <span><i class="fa fa-angle-right"></i></span>
            </li>
            <li class="category3"><span>Shop List</span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- breadcrumbs area end -->
<!-- product-details Area Start -->
<div class="product-details-area">
  <div class="container">
    <div class="row">
      <div class="col-md-5 col-sm-5 col-xs-12">
        <div class="zoomWrapper">
          <div id="img-1" class="zoomWrapper single-zoom">
            <a href="#">
              <img id="zoom1" src="{{pare_url_file($product->pro_avatar)}}"
                data-zoom-image="{{pare_url_file($product->pro_avatar)}}" alt="big-1">
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-7 col-sm-7 col-xs-12">
        <div class="product-list-wrapper">
          <div class="single-product">
            <div class="product-content">
              <h2 class="product-name"><a href="#">{{ $product->pro_name }}</a></h2>
              <div class="rating-price">
                <div class="pro-rating">
                  <a href="#"><i class="fa fa-star"></i></a>
                  <a href="#"><i class="fa fa-star"></i></a>
                  <a href="#"><i class="fa fa-star"></i></a>
                  <a href="#"><i class="fa fa-star"></i></a>
                  <a href="#"><i class="fa fa-star"></i></a>
                </div>
                <div class="price-boxes">
                  <span class="new-price">{{ number_format($product->pro_price, 0, ',','.') }}vnđ </span>
                </div>
              </div>
              <div class="product-desc">
                <p>{{$product->pro_description}}</p>
              </div>
              <p class="availability in-stock">Availability: <span>In stock</span></p>
              <div class="actions-e">
                <div class="action-buttons-single">
                  <div class="inputx-content">
                    <label for="qty">Quantity:</label>
                    <input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty">
                  </div>
                  <div class="add-to-cart">
                    <a href="#">Add to cart</a>
                  </div>
                  <div class="add-to-links">
                    <div class="add-to-wishlist">
                      <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i
                          class="fa fa-heart"></i></a>
                    </div>
                    <div class="compare-button">
                      <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i
                          class="fa fa-refresh"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="singl-share">
                <a href="#"><img src="img/single-share.png" alt=""></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="single-product-tab">
        <!-- Nav tabs -->
        <ul class="details-tab">
          <li class="active"><a href="#home" data-toggle="tab">Description</a></li>
          <li class=""><a href="#messages" data-toggle="tab"> Review (1)</a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="home">
            <div class="product-tab-content">
              <p>{{$product->pro_description}}</p>
            </div>
          </div>
          <div role="tabpanel" class="tab-pane" id="messages">
            <div class="single-post-comments col-md-6 col-md-offset-3">
              <div class="comments-area">
                <h3 class="comment-reply-title">1 REVIEW FOR TURPIS VELIT ALIQUET</h3>
                <div class="comments-list">
                  <ul>
                    <li>
                      <div class="comments-details">
                        <div class="comments-list-img">
                          <img src="img/user-1.jpg" alt="">
                        </div>
                        <div class="comments-content-wrap">
                          <span>
                            <b><a href="#">Admin - </a></b>
                            <span class="post-time">October 6, 2014 at 1:38 am</span>
                          </span>
                          <p>Lorem et placerat vestibulum, metus nisi posuere nisl, in accumsan elit odio quis mi.</p>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="comment-respond">
                <h3 class="comment-reply-title">Add a review</h3>
                <span class="email-notes">Your email address will not be published. Required fields are marked *</span>
                <form action="#">
                  <div class="row">
                    <div class="col-md-12">
                      <p>Name *</p>
                      <input type="text">
                    </div>
                    <div class="col-md-12">
                      <p>Email *</p>
                      <input type="email">
                    </div>
                    <div class="col-md-12">
                      <p>Your Rating</p>
                      <div class="pro-rating">
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star-o"></i></a>
                        <a href="#"><i class="fa fa-star-o"></i></a>
                      </div>
                    </div>
                    <div class="col-md-12 comment-form-comment">
                      <p>Your Review</p>
                      <textarea id="message" cols="30" rows="10"></textarea>
                      <input type="submit" value="Submit">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- product-details Area end -->

@stop