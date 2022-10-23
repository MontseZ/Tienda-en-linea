@extends('layouts.web')
@section('meta_description','Tienda en línea')
@section('title','Tienda en línea')
@section('styles')
@endsection
@section('content')
  <!-- breadcrumb area start -->
   <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">shop right sidebar 3 col</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- page wrapper start -->
        <div class="page-main-wrapper">
            <div class="container">
                <div class="row">
                    <!-- sidebar start -->
                    <div class="col-lg-3 order-2">
                        <div class="shop-sidebar-wrap mt-md-28 mt-sm-28">
                            <!-- sidebar categorie start -->
                           @include('web._sidebar_categories')
                            <!-- sidebar categorie start -->

                            <!-- manufacturer start -->
                            <!-- <div class="sidebar-widget mb-30">
                                <div class="sidebar-title mb-10">
                                    <h3>Manufacturers</h3>
                                </div>
                                <div class="sidebar-widget-body">
                                    <ul>
                                        <li><i class="fa fa-angle-right"></i><a href="#">calvin klein</a><span>(10)</span></li>
                                        <li><i class="fa fa-angle-right"></i><a href="#">diesel</a><span>(12)</span></li>
                                        <li><i class="fa fa-angle-right"></i><a href="#">polo</a><span>(20)</span></li>
                                        <li><i class="fa fa-angle-right"></i><a href="#">Tommy Hilfiger</a><span>(12)</span></li>
                                        <li><i class="fa fa-angle-right"></i><a href="#">Versace</a><span>(16)</span></li>
                                    </ul>
                                </div>
                            </div> -->
                            <!-- manufacturer end -->

                            <!-- pricing filter start -->
                            <!-- <div class="sidebar-widget mb-30">
                                <div class="sidebar-title mb-10">
                                    <h3>filter by price</h3>
                                </div>
                                <div class="sidebar-widget-body">
                                    <div class="price-range-wrap">
                                        <div class="price-range" data-min="50" data-max="400"></div>
                                        <div class="range-slider">
                                            <form action="#" class="d-flex justify-content-between">
                                                <button class="filter-btn">filter</button>
                                                <div class="price-input d-flex align-items-center">
                                                    <label for="amount">Price: </label>
                                                    <input type="text" id="amount">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- pricing filter end -->
                            @include('web._featured_category')
                            <!-- product size start -->
                            <!-- <div class="sidebar-widget mb-30">
                                <div class="sidebar-title mb-10">
                                    <h3>size</h3>
                                </div>
                                <div class="sidebar-widget-body">
                                    <ul>
                                        <li><i class="fa fa-angle-right"></i><a href="#">s</a><span>(10)</span></li>
                                        <li><i class="fa fa-angle-right"></i><a href="#">m</a><span>(12)</span></li>
                                        <li><i class="fa fa-angle-right"></i><a href="#">l</a><span>(20)</span></li>
                                        <li><i class="fa fa-angle-right"></i><a href="#">XL</a><span>(12)</span></li>
                                    </ul>
                                </div>
                            </div> -->
                            <!-- product size end -->

                            <!-- product tag start -->
                            <!-- <div class="sidebar-widget mb-30">
                                <div class="sidebar-title mb-10">
                                    <h3>tags</h3>
                                </div>
                                <div class="sidebar-widget-body">
                                    <div class="product-tag">
                                        <a href="#">camera</a>
                                        <a href="#">computer</a>
                                        <a href="#">tablet</a>
                                        <a href="#">watch</a>
                                        <a href="#">smart phones</a>
                                        <a href="#">handbag</a>
                                        <a href="#">shoe</a>
                                        <a href="#">men</a>
                                    </div>
                                </div>
                            </div> -->
                            @include('web._product_tag')
                            <!-- product tag end -->

                            <!-- sidebar banner start -->
                            <!-- <div class="sidebar-widget mb-30">
                                <div class="img-container fix img-full">
                                    <a href="#"><img src="galio/assets/img/banner/banner_shop.jpg" alt=""></a>
                                </div>
                            </div> -->
                            <!-- sidebar banner end -->
                        </div>
                    </div>
                    <!-- sidebar end -->

                    <!-- product main wrap start -->
                    <div class="col-lg-9 order-1">
                        <div class="shop-banner img-full">
                            <img src="galio/assets/img/banner/banner_static1.jpg" alt="">
                        </div>
                        <!-- product view wrapper area start -->
                        <div class="shop-product-wrapper pt-34">
                            <!-- shop product top wrap start -->
                            <div class="shop-top-bar">
                                <div class="row">
                                    <div class="col-lg-7 col-md-6">
                                        <div class="top-bar-left">
                                            <div class="product-view-mode mr-70 mr-sm-0">
                                                <a class="active" href="#" data-target="grid"><i class="fa fa-th"></i></a>
                                                <a href="#" data-target="list"><i class="fa fa-list"></i></a>
                                            </div>
                                            <div class="product-amount">
                                                <p>Showing 1–16 of 21 results</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-6">
                                        <div class="top-bar-right">
                                            <div class="product-short">
                                                <p>Sort By : </p>
                                                <select class="nice-select" name="sortby">
                                                    <option value="trending">Relevance</option>
                                                    <option value="sales">Name (A - Z)</option>
                                                    <option value="sales">Name (Z - A)</option>
                                                    <option value="rating">Price (Low &gt; High)</option>
                                                    <option value="date">Rating (Lowest)</option>
                                                    <option value="price-asc">Model (A - Z)</option>
                                                    <option value="price-asc">Model (Z - A)</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop product top wrap start -->

                            <!-- product item start -->
                            <div class="shop-product-wrap grid row">
                                @foreach ($products as $product)
                               @include('web._products_item')
                                @endforeach
                                
                            </div>
                            <!-- product item end -->
                        </div>
                        <!-- product view wrapper area end -->

                        <!-- start pagination area -->
                        <div class="paginatoin-area text-center pt-28">
                            <div class="row">
                                <div class="col-12">
                                    <ul class="pagination-box">
                                        <li><a class="Previous" href="#">Previous</a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a class="Next" href="#"> Next </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- end pagination area -->

                    </div>
                    <!-- product main wrap end -->
                </div>
            </div>
        </div>
        <!-- page wrapper end -->

        <!-- brand area start -->
        @include('web._brand_area')
        <!-- brand area end -->
@endsection

@section('scripts')
@endsection 