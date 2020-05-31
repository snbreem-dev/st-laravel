@extends('layouts.master')
@section('title')
    My Home page
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

    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Latest Products</h2>
                        <a href="{{route('products')}}">view all products <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
                @foreach($products as $product)
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
            </div>
        </div>
    </div>

    <div class="best-features">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Top Rated Product</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="left-content">
                        <h4>{{$feature_product->name}}</h4>
                        <p>{{$feature_product->short_description}}</p>
                        <ul class="featured-list">
                            {{$feature_product->details}}
                        </ul>
                        <a href="{{route('products')}}" class="filled-button">Show More</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-image">
                        <img src="{{asset('product_images/'.$feature_product->cover_image)}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inner-content">
                        <div class="row">
                            <div class="col-md-8">
                                <h4>Creative &amp; Unique <em>Sixteen</em> Products</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite
                                    author nulla.</p>
                            </div>
                            <div class="col-md-4">
                                <a href="#" class="filled-button">Purchase Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('cssStyles')
    <style>
        body {
            /*background-color: red;*/
        }
    </style>
@stop
@section('jsCode')
    <script>
        $(document).ready(function () {
            $('.navbar-nav > li').removeClass("active");
            $('.homepage').addClass("active");
        });
    </script>
@endsection
