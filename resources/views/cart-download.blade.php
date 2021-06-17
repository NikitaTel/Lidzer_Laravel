@extends('layouts.app')

@section('title-block')
    Download
@endsection

@section('content')

    <section class="cart-pods">
        <ul>
            <li>1. описание заказа</li>
            <li>2. оплата</li>
            <li><a href="#" disabled class="active-pod">3. скачивание</a></li>
        </ul>
    </section>

    <section class="download">
        <div class="cart-next"><a href="{{ \Illuminate\Support\Facades\Storage::url('instructions.zip')}}">скачать файл с инструкциями</a></div>
    </section>
@endsection
