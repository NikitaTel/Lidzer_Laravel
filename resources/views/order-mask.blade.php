@extends('layouts.app')

@section('block-title')
    Order
@endsection

@section('content')
    <section class="main-pods">
        <div class="pod-wrapper">
            <a href="{{route('home')}}">
            <div class="pod-image">
                <h3>ГЛАВНАЯ</h3>
                <h3 class="opacity">ГЛАВНАЯ</h3>
            </div>
            </a>
        </div>
        <div class="pod-wrapper">
            <a href="{{route('gallery')}}">
                <div class="pod-image">
                    <h3>ГАЛЕРЕЯ ЭФФЕКТОВ</h3>
                    <h3 class="opacity">ЭФФЕКТОВ</h3>
                </div>
            </a>
        </div>
        <div class="pod-wrapper">
            <a href="{{route('order-mask')}}">
                <div class="pod-image">
                    <h3>ЗАКАЗАТЬ МАСКУ</h3>
                    <h3 class="opacity">МАСКУ</h3>
                </div>
            </a>
        </div>
        <div class="pod-wrapper">
            <a href="{{route('blogs')}}">
                <div class="pod-image">
                    <h3>БЛОГ</h3>
                    <h3 class="opacity">БЛОГ</h3>
                </div>
            </a>
        </div>
    </section>


    <section class="order-information">
        <h3>Расскажите, как должна выглядить маска</h3>
        <h4>Авторизуйтесь пожалуйста и мы свяжемся с вами для уточнения деталей</h4>

        <div class="order-form">
        <form method="post" @if(\Illuminate\Support\Facades\Auth::check() ?? '') action="{{route('makeOrder', ['id'=>\Illuminate\Support\Facades\Auth::user()->id])}}" @else action="{{route('makeOrder', 0)}}" @endif id="order-description" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div  class="order-description">
                <textarea required name="description" id="description" type="text"></textarea>

            </div>

            <p>
                Я НЕ УМЕЮ ЧИТАТЬ ВАШИ МЫСЛИ! У меня нет такого навыка :)<br>
                По этому старайтесь как можно точнее выразить все ваши пожелания,<br>
                желательно с графическими примерами. <br>
            </p>
            <label class="order-file-wrapper">
                <input required type="file" class="order-information-submit" accept=".jpg, .jpeg, .png, .gif" id="image" name="image">
                <span class="order-information-submit">прикрепить</span>
            </label>

            @if($errors->any())
                <div class="alert">
                    <ul>
                        @foreach($errors ->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <button type="submit" class="order-information-submit" onClick="document.getElementById('order-description').submit()">отправить</button>
        </form>


        </div>
    </section>

    <section class="order-opportunities">
        <h2>Возможности маски</h2>

        <div class="order-opportunities-pods">
            <div class="order-opportunities-pod ">
                <h2>отслеживание <br>
                    нескольких лиц
                </h2>
                <p>Эффекты и  анимации <br>
                    можно накладывать <br>
                    на несколько лиц.
                </p>
            </div>
            <div class="order-opportunities-pod face ">
                <h2>
                    сглаживание <br>
                    лица
                </h2>
                <p>
                    Удаление прыщиков, складок, <br>
                    морщин. <br>
                    Выравнивание цветового тона кожи <br>
                </p>
            </div>
            <div class="order-opportunities-pod texture">
                <h2>текстура</h2>
                <p>
                    Добавление на лицо <br>
                    любой текстуры <br>
                    (бороду картинку, надпись).
                </p>
            </div>

            <div class="order-opportunities-pod">
                <h2>изменение формы</h2>
                <p>
                    Меняйте размеры <br>
                    любой части лица.
                </p>
            </div>
            <div class="order-opportunities-pod d_obj">
                <h2>3D объекты</h2>
                <p>Возможность добавления <br>
                    3D объектов: очки, маски, <br>
                    головные уборы, шлем
                </p>
            </div>
            <div class="order-opportunities-pod fly">
                <h2>
                    добавление <br>
                    летающих частиц
                </h2>
                <p>
                    Возможность добавить разные частицы: <br>
                    снежинки, воздушные шары и.т.д
                </p>
            </div>
            <div class="order-opportunities-pod">
                <h2>звук</h2>
                <p>
                    Возможность добавления <br>
                    звука и связи его с анимацией.
                </p>
            </div>
            <div class="order-opportunities-pod segment">
                <h2>сегментация фона</h2>
                <p>
                    Изменение фона на любое изображение <br>
                    или анимацию
                </p>
            </div>
        </div>

        <p>
            После обработки заказа, цена маски будет установлена вличном кабинете. <br>
            Стоимость заказа рассчитывается исходя из его сложности.
        </p>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $('.order-file-wrapper > input').change(function(){
            var value = $(".order-file-wrapper > input").val().replace(/.*\\/, "");;
            $('.order-file-wrapper > span').text(value);

        });
    </script>
@endsection
