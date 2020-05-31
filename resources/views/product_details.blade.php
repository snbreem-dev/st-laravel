@extends('layouts.master')
@section('title')
    Product Details
@endsection

@section('content')
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
        <div class="owl-banner owl-carousel">
            <div class="banner-item-01">
                <div class="text-content">
                    <h4>Best Offer</h4>
                    <h2>New Arrivals On Sale</h2>
                </div>
            </div>
            <div class="banner-item-02">
                <div class="text-content">
                    <h4>Flash Deals</h4>
                    <h2>Get your best products</h2>
                </div>
            </div>
            <div class="banner-item-03">
                <div class="text-content">
                    <h4>Last Minute</h4>
                    <h2>Grab last minute deals</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="best-features">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Product Details {{$product->id}}</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="left-content">
                        <h4>{{$product->name}}</h4>
                        <p>{{$product->short_description}}</p>
                        <ul class="featured-list">
                            {{$product->details}}
                        </ul>
                        <a href="{{route('products')}}" class="filled-button">Show More</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-image">
                        <img src="{{asset('product_images/'.$product->cover_image)}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Related Products</h2>
                        <a href="{{route('products')}}">view all products <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                @foreach($similar_products as $product)
                <div class="col-md-4">
                    <div class="product-item">
                        <a href="{{route('product_details',$product->id)}}"><img src="{{asset('product_images/'.$product->cover_image)}}" alt=""></a>
                        <div class="down-content">
                            <a href="{{route('product_details',$product->id)}}"><h4>{{$product->name}}</h4></a>
                            <h6>{{$product->currency_code}} {{$product->price}}</h6>
                            <p>{{$product->short_description}}</p>
                            <ul class="stars">
                                @for($i=0; $i<$product->stars; $i++)
                                    <li><i class="fa fa-star"></i></li>
                                @endfor
                            </ul>
                            <span>Comments {{$product->comments->count()}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
{{--                <div class="col-md-4">--}}
{{--                    <div class="product-item">--}}
{{--                        <a href="#"><img src="{{asset('assets/images/product_02.jpg')}}" alt=""></a>--}}
{{--                        <div class="down-content">--}}
{{--                            <a href="#"><h4>Tittle goes here</h4></a>--}}
{{--                            <h6>$30.25</h6>--}}
{{--                            <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>--}}
{{--                            <ul class="stars">--}}
{{--                                <li><i class="fa fa-star"></i></li>--}}
{{--                                <li><i class="fa fa-star"></i></li>--}}
{{--                                <li><i class="fa fa-star"></i></li>--}}
{{--                                <li><i class="fa fa-star"></i></li>--}}
{{--                                <li><i class="fa fa-star"></i></li>--}}
{{--                            </ul>--}}
{{--                            <span>Reviews (21)</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>

    <div class="comment_block">
        @foreach($product->comments as $comment)
            <div class="new_comment">
                <ul class="user_comment">
                    <div class="user_avatar">
                        <img src="{{asset('assets/images/avatar.jpg')}}">
                    </div><div class="comment_body">
                        <p>{{$comment->id}} - {{$comment->comment}}</p>
                    </div>

                    <div class="comment_toolbar">

                        <div class="comment_details">
                            <ul>
                                <li><i class="fa fa-pencil"></i> <span class="user">{{$comment->name}}</span></li>
                                <li><i class="fa fa-calendar"></i> {{explode(' ',$comment->created_at)[0]}}</li>
                                <li><i class="fa fa-clock-o"></i> {{explode(' ',$comment->created_at)[1]}}</li>
                                <li><i class="fa fa-share-alt"></i></li>
                                <li><i class="fa fa-reply"></i></li>
                                <li><i class="fa fa-heart love"></i></li>
                            </ul>
                        </div>
                    </div>
                </ul>
            </div>
        @endforeach
    </div>

    <div class="container comment-container">
        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="panel panel-info">
                    <div class="panel-body">
                        <form class="form-inline" method="post" action="{{route('comments',$product->id)}}">
                            @csrf
                            <input placeholder="Your Name" name="name" class="comment-name">
                            <input placeholder="Your Email" name="email" class="comment-name">
                            <textarea placeholder="Write your comment here!" name="comment"
                                      class="comment-text"></textarea>
                            <button class="btn btn-primary pull-right" type="submit">Send Feedback</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('cssStyles')
    <style>
        .comment_block {
            width: 65%;
            height: 100%;
            margin: 0 auto;
            padding: 10px;
        }

        .comment_block .new_comment {
            width: 100%;
            height: auto;
            padding: 20px 0;
            border-top: 1px solid #e6e6e6;
        }

        .comment_block .new_comment .user_comment {
            list-style-type: none;
        }

        .user_avatar {
            width: 65px;
            height: 65px;
            display: inline-block;
            vertical-align: middle;
        }

        .user_avatar img {
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }

        .comment_block .new_comment .comment_body {
            display: inline-block;
            vertical-align: middle;
            width: calc(100% - 75px);
            min-height: 65px;
            margin-left: 10px;
            padding: 5px 10px;
            font-size: 1em;
            color: #555;
            background-color: #FFF;
            border-bottom: 2px solid #f2f2f2;
        }

        .comment_block .new_comment .comment_body p{
            font-size: 20px;
            color: #555;
        }

        .comment_block .new_comment .comment_toolbar {
            width: 100%;
        }

        .comment_block .new_comment .comment_toolbar .comment_details {
            display: inline-block;
            vertical-align: middle;
            width: 70%;
            text-align: left;
        }

        .comment_block .new_comment .comment_toolbar ul {
            list-style-type: none;
            padding-left: 75px;
            font-size: 0;
        }

        .comment_block .new_comment .comment_toolbar ul li {
            display: inline-block;
            padding: 5px;
            font-size: 14px;
            color: #959191;
        }

        .comment-container {
            font-family: Lato;
            margin-top: 50px;
        }

        .comment-name {
            padding: 20px;
            width: 100%;
            margin-top: 10px;
            border: 1px solid rgba(32, 25, 75, 0.88);
        }

        .comment-text {
            resize: none;
            padding: 20px;
            height: 130px;
            width: 100%;
            margin-top: 10px;
            margin-bottom: 10px;
            border: 1px solid rgba(32, 25, 75, 0.88);
        }

    </style>
@endsection
@section('jsCode')
    <script>
        $(document).ready(function () {
            $('.navbar-nav > li').removeClass("active");
            //$('.aboutus').addClass("active");
        });
    </script>
@endsection
