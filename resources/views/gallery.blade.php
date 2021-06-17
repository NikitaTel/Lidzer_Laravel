@extends('layouts.app')

@section('title-block')
    Gallery
@endsection

@section('content')
    <section class="main-pods gallery">
        <div class="pod-wrapper">
            <a href="{{route('gallery')}}">
                <div class="pod-image">
                    <h3>СТИЛИ КАМЕРЫ</h3>
                    <h3 class="opacity">КАМЕРЫ</h3>
                </div>
            </a>
        </div>
        <div class="pod-wrapper">
            <a href="{{route('selfi')}}">
                <div class="pod-image">
                    <h3>СЕЛФИ</h3>
                    <h3 class="opacity">СЕЛФИ</h3>
                </div>
            </a>
        </div>
        <div class="pod-wrapper">
            <a href="{{route('objects')}}">
                <div class="pod-image">
                    <h3>ОБЪЕКТЫ</h3>
                    <h3 class="opacity">ОБЪЕКТЫ</h3>
                </div>
            </a>
        </div>
        <div class="pod-wrapper">
            <a href="{{route('home')}}">
                <div class="pod-image">
                    <h3>ГЛАВНАЯ</h3>
                    <h3 class="opacity">ГЛАВНАЯ</h3>
                </div>
            </a>
        </div>
    </section>


    <section class="catalog gallery">
        @foreach($masks as $mask)
            @if($mask->category_id==1)
            <div class="catalog-element">
                <div class="mask-mobile"><div class="mask-image" style="background: url({{asset('/storage/' . $mask->mask_img) }}) center / cover no-repeat"></div></div>
                <div class="mask-wrapper">
                    <div class="mask-description">
                        <div class="mask-name">{{$mask->mask_name}}</div>
                        <a class="cart-image" href="{{route('addToCart',['id' =>$mask->id])}}">
                            <span class="price-mask">{{$mask->price}} BYN</span>
                        </a>
                    </div>
                    <div class="mask-qr">
                        <div class="qr" style="background: url('{{asset('/storage/' . $mask->mask_qr)}}');background-size: 100% 100%;" ></div>
                        <div class="try-it">
                            <span>попробовать в</span>
                            <span>Instagram</span>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endforeach

    </section>
@endsection
