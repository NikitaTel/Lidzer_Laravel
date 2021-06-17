@extends('layouts.app')

@section('content')
    @if(\Illuminate\Support\Facades\Auth::user()->id_role ==1)
        <section class="admin-panel">
            <div class="admin-headers">
                <h1 class="admin-header">Новый эффект</h1>
                <h1 class="admin-header">Удалить эффект</h1>
                <h1 class="admin-header">Индивидуальный заказ</h1>
                <h1 class="admin-header">История заказов</h1>
                <h1 class="admin-header">Пользователи</h1>
                <h1 class="admin-header">Добавить новость</h1>
            </div>

            <form class="admin-submit" method="post" action="{{route('addMask')}}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="admin-add">
                    <div>
                        <label for="name">название маски</label>
                        <input type="text" name="name" id="name" required>
                    </div>
                    <div>
                        <label for="category">категория</label>
                        <input type="text" name="category" id="category" required>
                    </div>
                    <div>
                        <label for="price">цена</label>
                        <input type="text" name="price" id="price" required>
                    </div>
                    <div>
                        <label for="image">фото маски</label>
                        <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" required>
                    </div>
                    <div>
                        <label for="qr">qr-код</label>
                        <input type="file" name="qr" id="qr" accept=".jpg, .jpeg, .png, .gif" required  >
                    </div>
                </div>
                @if($errors->any())
                    <div class="alert">
                        <ul>
                            @foreach($errors ->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <input type="submit" value="Добавить">
            </form>



            <section class="admin-delete-mask">
                <ul class="order-headers">
                    <li>Id</li>
                    <li>Название</li>
                    <li>Фото</li>
                </ul>
                <ul class="admin-delete-mask-ul">
                    @foreach(\App\Mask::all() as $mask)
                        <li>
                            <div>{{$mask->id}}</div>
                            <div>{{$mask->mask_name}}</div>
                            <img src="{{'/storage/' . $mask->mask_img}}" width="150" alt="{{$mask->mask_name}}}">
                            <div>
                                <a href="{{route('removeMask', ['id'=>$mask->id])}}">
                                    <div class="remove-cart">
                                    </div>
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </section>

            <section class="admin-list">

                <ul class="order-headers">
                    <li>Номер</li>
                    <li>Статус</li>
                    <li>Описание</li>
                    <li>Прикреплённое фото</li>
                </ul>

                <ul class="constructors-list">
                    @foreach(\App\Constructor::all() as $constructor)

                        <li  @if($constructor->constructor_status=='Подтверждён') style="background: #f8f8f8;" @endif>
                            <div>{{$constructor->id}}</div>
                            <div>{{$constructor->constructor_status}}</div>
                            <textarea class="constructors-list-description"  readonly @if($constructor->constructor_status=='Подтверждён') style="background: #f8f8f8;" @endif>{{$constructor->constructor_description}}</textarea>

                            <div>
                                <img width="203px" src="{{asset('/storage/' . $constructor->constructor_image)}}" alt="">
                            </div>
                        </li>
                        @if($constructor->constructor_status=='Анализ заказа')
                            <form action="{{route('changeStatus',['id'=>$constructor->id])}}" method="post">
                                @csrf
                                @if($errors->any())
                                    <div class="alert">
                                        <ul>
                                            @foreach($errors ->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <input required type="text" placeholder="ввести цену" name="price" id="price">

                                <button type="submit">
                                    Подтвердить заказ
                                </button>
                            </form>
                        @endif



                    @endforeach

                </ul>
            </section>

            <section class="admin-masks-list">
                <ul class="order-headers">
                    <li>Id Заказа</li>
                    <li>Id Пользователя</li>
                    <li>Маски</li>
                    <li>Стоимость</li>
                </ul>
                <ul class="admin-masks-list-ul">
                    @foreach(\App\Order::all() as $order)
                        <li>
                            <div>{{$order->id}}</div>
                            <div>{{$order->user_id}}</div>
                            <ul>

                                @foreach(\App\DetailedCart::all()->where('order_id', $order->id) as $detailedCart)
                                    <li>
                                        <div class="mask-name">
                                            {{$detailedCart->mask_name}}
                                        </div>
                                    </li>

                                @endforeach

                            </ul>
                            <div>{{$order->price}}</div>
                        </li>
                    @endforeach
                </ul>

            </section>

            <section class="admin-users-list">
                <ul class="order-headers">
                    <li>Id</li>
                    <li>Логин</li>
                    <li>Эл. почта</li>
                </ul>
                <ul class="admin-users-list-ul">
                    @foreach(\App\User::all() as $user)
                        @if($user->id != 1)
                            <li>
                                <div>{{$user->id}}</div>
                                <div>{{$user->login}}</div>
                                <div>{{$user->email}}</div>
                                <div>
                                    <a href="{{route('removeUser', ['id'=>$user->id])}}">
                                        <div class="remove-cart">
                                        </div>
                                    </a>
                                </div>
                            </li>
                        @endif

                    @endforeach
                </ul>
            </section>
        </section>

        @include('admin.addBlog')
    @else
        <div class="user-headers">
            <h1 class="constructors-header">Мои контрукторы</h1>
            <h1 class="constructors-header">Мои маски</h1>
        </div>

        <section class="user-constructor-list">

            <ul class="order-headers">
                <li>Статус</li>
                <li>Описание</li>
                <li>Приложение</li>
                <li>Цена</li>
            </ul>

            <ul class="constructors-list">
                @foreach(\App\Constructor::all() as $constructor)
                    @if($constructor->user_id==\Illuminate\Support\Facades\Auth::user()->id)
                        <li>
                            <div>{{$constructor->constructor_status}}</div>
                            <textarea class="constructors-list-description">{{$constructor->constructor_description}}</textarea>

                            <div>
                                <img width="150px" src="{{asset('/storage/' . $constructor->constructor_image)}}" alt="">
                            </div>


                            @if($constructor->constructor_price !=null)
                                <div>{{$constructor->constructor_price}} BYN</div>
                            @else
                                <div>Цена не определена</div>
                            @endif
                        </li>

                        @if($constructor->constructor_price !=null)
                            <section class="download">
                                <div class="cart-next"><a href="{{ \Illuminate\Support\Facades\Storage::url('instructions.zip')}}" download>скачать файл с инструкциями</a></div>
                            </section>
                        @endif
                    @endif
                @endforeach
            </ul>
        </section>

        <section class="user-mask-list">
            <div class="catalog">
                @foreach(\App\Order::all()->where('user_id', \Illuminate\Support\Facades\Auth::user()->id) as $order)
                            @foreach(\App\DetailedCart::all()->where('order_id', $order->id) as $detailedCart)
                                <div class="catalog-element">

                                    <div class="mask-mobile"><div class="mask-image" style="background: url({{asset('/storage/' . $detailedCart->mask_img) }});background-size: 100% 100%;"></div></div>

                                    <div class="name-qr-wrapper">
                                        <div class="mask-name">
                                            {{$detailedCart->mask_name}}
                                        </div>
                                        <div class="mask-qr">
                                            <div class="qr" style="background: url({{asset('/storage/' . $detailedCart->mask_qr) }});background-size: 100% 100%;">
                                            </div>
                                        </div>
                                    </div>
                                    <section class="download">
                                        <div class="cart-next"><a href="{{ \Illuminate\Support\Facades\Storage::url('instructions.zip')}}" download>скачать файл с инструкциями</a></div>
                                    </section>
                                </div>
                            @endforeach
                @endforeach
            </div>
        </section>

    @endif

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $('.constructors-header:first-child').click(function(){
            $('.user-constructor-list').slideToggle();

        });
        $('.constructors-header:nth-child(2)').click(function(){
            $('.user-mask-list').slideToggle();
        });


        $('.admin-header:nth-child(1)').click(function(){
            $('.admin-submit').slideToggle();
            $('.admin-delete-mask,.admin-add-post,  .admin-users-list, .admin-list, .admin-masks-list').css('display','none');
        });

        $('.admin-header:nth-child(2)').click(function(){
            $('.admin-delete-mask').slideToggle();
            $('.admin-submit, .admin-add-post, .admin-users-list, .admin-list, .admin-masks-list').css('display','none');
        });

        $('.admin-header:nth-child(3)').click(function(){
            $('.admin-list').slideToggle();
            $('.admin-delete-mask,.admin-add-post,  .admin-users-list, .admin-submit, .admin-masks-list').css('display','none');
        });

        $('.admin-header:nth-child(4)').click(function(){
            $('.admin-masks-list').slideToggle();
            $('.admin-delete-mask,.admin-add-post,  .admin-users-list, .admin-list, .admin-submit').css('display','none');
        });

        $('.admin-header:nth-child(5)').click(function(){
            $('.admin-users-list').slideToggle();
            $('.admin-delete-mask, .admin-add-post, .admin-list, .admin-masks-list, .admin-submit').css('display','none');
        });

        $('.admin-header:nth-child(6)').click(function(){
            $('.admin-add-post').slideToggle();
            $('.admin-delete-mask, .admin-users-list .admin-list, .admin-masks-list, .admin-submit').css('display','none');
        });
    </script>
@endsection
