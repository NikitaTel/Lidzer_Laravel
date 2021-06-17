@section('header')

    <header>
        <ul>
            <li class="cart"><a href="{{route('cart')}}">корзина  @if(Session::has('cart'))
                <span class="cart-count">{{Session::get('cart')->totalQty}}</span>
                    @else
                    @endif
                </a>
            </li>

            @if(\Illuminate\Support\Facades\Auth::check() ?? '')
            <li class="sign-in">
                <a href="{{route('profile')}}">хеллоу,{{\Illuminate\Support\Facades\Auth::user()->login}}
                    @if(\Illuminate\Support\Facades\Auth::user()->id_role ==1 && \App\Constructor::where('constructor_status','Анализ заказа')->count() !=0)
                        <span class="constructor-count">{{\App\Constructor::where('constructor_status','Анализ заказа')->count()}}</span>
                    @endif
                </a>
            </li>
            <li>
                <a  href="{{route('logoutUser')}}" class="sign-out">выйти</a>
            </li>


            @else
           <li>
               <a href="{{route('login')}}">войти</a>
           </li>

            @endif


        </ul>
    </header>

    <h1 class="main-title"><a href="{{route('home')}}">TWINPIXEL</a></h1>
    <h3 class="spark-ar">SPARK AR STUDIO | 2020</h3>
    <div class="background-main-image"></div>
