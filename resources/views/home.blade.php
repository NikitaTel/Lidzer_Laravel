<!doctype html>
<html lang="en" id="home-page">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TWINPIXEL</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>

@include('header')
@include('inc.messages')

<main>


    <section class="main-pods">
        <div class="pod-wrapper">
                <div class="pod-image">
                    <h3>ГЛАВНАЯ</h3>
                    <h3 class="opacity">ГЛАВНАЯ</h3>
                </div>
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

{{--        <section class="marketing-instrument">--}}
{{--            <h3>МАСКИ, ФИЛЬТРЫ ДЛЯ ИНСТАГРАМ</h3>--}}
{{--            <p>Новый инструмент маркетинга для вас и вашего бренда</p>--}}
{{--        </section>--}}

{{--        <section class="main-page-section what-is-it">--}}
{{--            <h1>ЧТО ЭТО ТАКОЕ </h1>--}}
{{--            <div class="what-is-it-description">--}}
{{--                <p>--}}
{{--                    AR-маска - это эффект в Instagram и Facebook. <br>--}}
{{--                    До недавнего времени маски выполняли только <br>--}}
{{--                    развлекательную фукнцию. <br>--}}
{{--                    <span class="first-background-span">Теперь они могут работать на бренд.</span> <br>--}}
{{--                    Яркие и подвижные эффекты привлекают внимание,<br>--}}
{{--                    запоминаются и предполагают участие человека.<br>--}}
{{--                    Вовлеченный в процесс пользователь косвенно<br>--}}
{{--                    взаимодействует и с самим брендом.<br>--}}
{{--                    Но пользователя не так просто удивить -<br>--}}
{{--                    каждый день создаются новые маски.<br>--}}
{{--                    Аудитория становится избирательной и <br>--}}
{{--                    реагирует на действительно интересные маски.<br>--}}
{{--                    Перед компаниями стоит задача сделать эффект,<br>--}}
{{--                    которым будут пользоваться и активо делиться.<br>--}}
{{--                </p>--}}
{{--                <div class="main-page-image"></div>--}}
{{--            </div>--}}
{{--        </section>--}}

{{--    <section class="main-page-section why-us">--}}
{{--        <h1>ПОЧЕМУ МЫ</h1>--}}
{{--        <ul>--}}
{{--            <li>фильтры любой сложности</li>--}}
{{--            <li>мы вернем Вам деньги при отказе в одобрении</li>--}}
{{--            <li>у нас не отстойный сайт</li>--}}
{{--        </ul>--}}
{{--    </section>--}}

{{--    <section class="main-page-section your-order">--}}
{{--        <h1>ВАШ ЗАКАЗ</h1>--}}
{{--        <span>--}}
{{--        после оплаты в вашем личном кабинете <br>--}}
{{--        появятся:--}}
{{--      </span>--}}
{{--        <ul>--}}
{{--            <li>-загрузочный файл эффекта в формате arexport</li>--}}
{{--            <li>-иконка в формате jpeg 480 <span>x</span> 480 </li>--}}
{{--            <li>-описание маски</li>--}}
{{--            <li>-инструция по загрузке маски в Instagram</li>--}}
{{--        </ul>--}}
{{--    </section>--}}
</main>
<script src="/js/app.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

</body>
</html>

