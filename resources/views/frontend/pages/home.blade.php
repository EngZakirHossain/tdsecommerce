@extends('frontend.layouts.master')

@section('title', 'Home Page')

@section('frontedn_content')
    <!-- slideshow start -->
    @include('frontend.pages.widgets.slider')
    <!-- slideshow end -->

    <!-- trusted badge start -->
    @include('frontend.pages.widgets.trustedBadge')
    <!-- trusted badge end -->

    <!-- banner start -->
    @include('frontend.pages.widgets.banner')
    <!-- banner end -->

    <!-- collection start -->
    @include('frontend.pages.widgets.featuredCollection')
    <!-- collection end -->

    <!-- shop by category start -->
    @include('frontend.pages.widgets.categoryShop')
    <!-- shop by category end -->

    <!-- video start -->
    @include('frontend.pages.widgets.vedio')
    <!-- video end -->

    <!-- testimonial start -->
    @include('frontend.pages.widgets.testimonial')
    <!-- testimonial end -->

    <!-- single banner start -->
    @include('frontend.pages.widgets.singleBanner')
    <!-- single banner end -->

    <!-- latest blog start -->
    @include('frontend.pages.widgets.latestBlog')
    <!-- latest blog end -->

    <!-- Client logo start -->
    @include('frontend.pages.widgets.client')
    <!-- Client logo end -->

@endsection
