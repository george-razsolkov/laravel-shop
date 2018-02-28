@extends('layouts.app')

@section('small-basket')
    {!! $basket !!}
@endsection

@section('content')

    <!-- Start welcome header section -->
    <header class="masthead">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <h1 class="brand-heading">Grayscale</h1>
                        <p class="intro-text">A free, responsive, one page Bootstrap theme.
                            <br>Created by Start Bootstrap.</p>
                        <a href="#bestseller" class="btn btn-circle js-scroll-trigger">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End welcome header section -->
    <!--Start Best Selllers Section -->
    <section class="aimeos catalog-list content-section text-center" id="bestseller"
             data-jsonurl="http://localhost:8000/jsonapi">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <h2>НАЙ-ПРОДАВАНИ</h2>
                <div class="catalog-list-items">
                    <ul class="list-items">
                        <!-- add products here -->
                        @foreach($bestSellers as $bestseller)
                                <li class="product "
                                    data-reqstock="1"
                                    itemprop=""
                                    itemtype="http://schema.org/Product"
                                    itemscope="">
                                    <a href="/detail/{{$bestseller['product.id']}}/{{$bestseller['product.label']}}/0">
                                        <div class="media-list">
                                            <noscript>
                                                <div class="media-item"
                                                     style="background-image: url('/preview/0/3/0389f34471a91a952eb0ea6412921fb5.jpg')"
                                                     itemscope="" itemtype="http://schema.org/ImageObject">
                                                    <meta itemprop="contentUrl"
                                                          content="/preview/0/3/0389f34471a91a952eb0ea6412921fb5.jpg"/>
                                                </div>
                                            </noscript>
                                            @foreach($bestseller['media'] as $media)
                                            <div class="media-item lazy-image"
                                                 data-src="{{$media['media.preview']}}"></div>
                                            @endforeach
                                        </div>
                                        <div class="text-list">
                                            <h2 itemprop="name">{{$bestseller['product.label']}}</h2>
                                        </div>
                                    </a>
                                    <div class="offer" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                        <div class="stock-list">
                                            <div class="articleitem stock-actual"
                                                 data-prodid="{{$bestseller['product.id']}}"
                                                 data-prodcode="{{$bestseller['product.code']}}">
                                            </div>
                                        </div>
                                        <div class="price-list">
                                            <div class="articleitem price price-actual"
                                                 data-prodid="7"
                                                 data-prodcode="{{$bestseller['product.code']}}">
                                                <meta itemprop="price" content="{{$bestseller['price']['price.value']}}"/>
                                                <div class="price-item default" itemprop="priceSpecification"
                                                     itemscope=""
                                                     itemtype="http://schema.org/PriceSpecification">
                                                    <meta itemprop="valueAddedTaxIncluded" content="true"/>
                                                    <meta itemprop="priceCurrency" content="{{$bestseller['price']['price.currencyid']}}"/>
                                                    <meta itemprop="price" content="{{$bestseller['price']['price.value']}}"/>
                                                    <span class="quantity" itemscope=""
                                                          itemtype="http://schema.org/QuantitativeValue">
                           <meta itemprop="minValue" content="1"/>
                           от 1
                        </span>
                                                    <!--TODO TRANSLATE THE CURRENCY FOR EACH LANGUAGE -->>
                                                    <span class="value">
                        {{$bestseller['price']['price.value']}} лв		</span>
                                                    <span class="taxrate">
                        {{$bestseller['price']['price.taxrate']}}		</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                        @endforeach
                        <!--
                        <li class="product "
                            data-reqstock="1"
                            itemprop=""
                            itemtype="http://schema.org/Product"
                            itemscope="">
                            <a href="/detail/7/TENISKA1/0">
                                <div class="media-list">
                                    <noscript>
                                        <div class="media-item"
                                             style="background-image: url('/preview/0/3/0389f34471a91a952eb0ea6412921fb5.jpg')"
                                             itemscope="" itemtype="http://schema.org/ImageObject">
                                            <meta itemprop="contentUrl"
                                                  content="/preview/0/3/0389f34471a91a952eb0ea6412921fb5.jpg"/>
                                        </div>
                                    </noscript>
                                    <div class="media-item lazy-image"
                                         data-src="/preview/0/3/0389f34471a91a952eb0ea6412921fb5.jpg"></div>
                                    <div class="media-item"
                                         data-src="/preview/d/5/d5ac301a5384b221668c3eccc025b6a1.jpg"></div>
                                    <div class="media-item"
                                         data-src="/preview/7/9/79161b702d8c1a474de3e89f50848e97.png"></div>
                                </div>
                                <div class="text-list">
                                    <h2 itemprop="name">TENISKA1</h2>
                                </div>
                            </a>
                            <div class="offer" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <div class="stock-list">
                                    <div class="articleitem stock-actual"
                                         data-prodid="7"
                                         data-prodcode="312">
                                    </div>
                                </div>
                                <div class="price-list">
                                    <div class="articleitem price price-actual"
                                         data-prodid="7"
                                         data-prodcode="312">
                                        <meta itemprop="price" content="19.99"/>
                                        <div class="price-item default" itemprop="priceSpecification" itemscope=""
                                             itemtype="http://schema.org/PriceSpecification">
                                            <meta itemprop="valueAddedTaxIncluded" content="true"/>
                                            <meta itemprop="priceCurrency" content="BGN"/>
                                            <meta itemprop="price" content="19.99"/>
                                            <span class="quantity" itemscope=""
                                                  itemtype="http://schema.org/QuantitativeValue">
                           <meta itemprop="minValue" content="1"/>
                           от 1
                        </span>
                                            <span class="value">
                        19.99 лasda	</span>
                                            <span class="taxrate">
                        Вкл. 0.00% ДДС		</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>

    </section>
    <!--End Best Selllers Section -->

    <!-- Contact Section -->
    <section id="contact" class="content-section text-center">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h2>Contact US BABY</h2>
                    <p>Leave a message :)</p>

                    <ul class="list-inline banner-social-buttons">
                        <li class="list-inline-item">
                            <a href="https://facebook.com/SBootstrap" class="btn btn-default btn-lg">
                                <i class="fa fa-facebook "></i>
                                <span class="network-name">Facebook</span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://github.com/BlackrockDigital/startbootstrap" class="btn btn-default btn-lg">
                                <i class="fa fa-twitter fa-fw"></i>
                                <span class="network-name">Twitter</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

