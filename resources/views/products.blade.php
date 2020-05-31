@extends('layouts.master')
@section('title', 'My products Page')

@section('content')
<!-- Page Content -->
<div class="page-heading products-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="text-content">
                    <h4>new arrivals</h4>
                    <h2>sixteen products</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="filters">
                    <ul>
                        <li class="active" data-filter="*">All Products</li>
                        @foreach($categories as $category)
                            <li data-filter=".{{$category->code}}">{{$category->name}}</li>
                        @endforeach
{{--                        <li data-filter=".dev">Flash Deals</li>--}}
{{--                        <li data-filter=".gra">Last Minute</li>--}}
                    </ul>
                </div>
            </div>
            <div class="col-md-12">
                <div class="filters-content">
                    <div class="row grid">
                        @foreach($products as $product)
                        <div class="col-lg-4 col-md-4 all {{\App\Category::find($product->category_id)->code}}">
                            <div class="product-item">
                                <a href="{{route('product_details',$product->id)}}">
{{--                                    <img src="assets/images/product_01.jpg" alt="">--}}
                                    <img src="{{asset('product_images/'.$product->cover_image)}}" alt="">
                                </a>
                                <div class="down-content">
                                    <a href="{{route('product_details',$product->id)}}"><h4>{{$product->name}}</h4></a>
                                    <h6>{{$product->currency_code}} {{$product->price}}</h6>
                                    <p>{{$product->short_description}}</p>
                                    <ul class="stars">
                                        @for($i=0; $i<$product->stars; $i++)
                                        <li><i class="fa fa-star"></i></li>
                                        @endfor
                                    </ul>
                                    <span>Comments ({{$product->comments->count()}})</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
{{--                        <div class="col-lg-4 col-md-4 all dev">--}}
{{--                            <div class="product-item">--}}
{{--                                <a href="#"><img src="assets/images/product_02.jpg" alt=""></a>--}}
{{--                                <div class="down-content">--}}
{{--                                    <a href="#"><h4>Tittle goes here</h4></a>--}}
{{--                                    <h6>$16.75</h6>--}}
{{--                                    <p>Lorem ipsume dolor sit amet, adipisicing elite. Itaque, corporis nulla aspernatur.</p>--}}
{{--                                    <ul class="stars">--}}
{{--                                        <li><i class="fa fa-star"></i></li>--}}
{{--                                        <li><i class="fa fa-star"></i></li>--}}
{{--                                        <li><i class="fa fa-star"></i></li>--}}
{{--                                        <li><i class="fa fa-star"></i></li>--}}
{{--                                        <li><i class="fa fa-star"></i></li>--}}
{{--                                    </ul>--}}
{{--                                    <span>Reviews (24)</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                {{$products->links()}}
{{--                <ul class="pages">--}}
{{--                    <li><a href="#">1</a></li>--}}
{{--                    <li class="active"><a href="#">2</a></li>--}}
{{--                    <li><a href="#">3</a></li>--}}
{{--                    <li><a href="#">4</a></li>--}}
{{--                    <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>--}}
{{--                </ul>--}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('jsCode')
    <script>
        $(document).ready(function () {
            $('.navbar-nav > li').removeClass("active");
            $('.products').addClass("active");
        });
    </script>
@endsection
