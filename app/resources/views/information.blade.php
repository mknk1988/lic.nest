@extends("layouts.app")

@section("title", "Роскосмос / Лицензии")
@section("countLicenses", $countLicenses)

@section("content")
    <h1>Общая информация</h1>
    <h4>Контакты по вопросам получения сведений из Реестра:</h4>
    <p>тел.: 8 (495) 631 9303</p>
    <p>E-mail: <a href="mailto:licence@roscosmos.ru">licence@roscosmos.ru</a></p>
    <a href="https://www.gosuslugi.ru/structure/10000001043"><img src="{{asset("./build/img/gosuslugi.jpg")}}" alt="Госуслуги" class="img-thumbnail"></a>
@endsection
