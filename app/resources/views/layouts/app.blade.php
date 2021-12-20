<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1,maximum-scale=1,minimum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>
    <link href="./build/css/main.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="96x96" href="./build/img/favicon.png">
</head>
<body>
@include("includes.nav")
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-sm-12 col-lg-2 d-md-block bg-primary shadow pb-4 align-self-start">
            <div id="Search" class="pt-3">
                <h4 class="text-white">Лицензий в реестре: @yield("countLicenses")</h4>
                <h5 class="text-white">Дата формирования: {{ date("d.m.Y") }}</h5>
                <form method="POST" action="/search">
                    @csrf
                    <div class="row">
                        <div class="col-12 mt-2"><input type="text" name="inn" class="form-control" placeholder="ИНН">
                        </div>
                        <div class="col-12 mt-2"><input type="text" name="ogrn" class="form-control" placeholder="ОГРН">
                        </div>
                        <div class="col-12 mt-2"><input type="text" name="organization" class="form-control"
                                                        placeholder="Организация">
                        </div>
                        <div class="col-12 mt-2"><input type="text" name="license_number" class="form-control"
                                                        placeholder="Лицензия №">
                        </div>
                        <div class="col mt-4">
                            <button type="submit" class="btn btn-success">Искать</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-9 col-sm-12 ml-sm-auto col-lg-10 px-md-4">
            @yield("content")
        </div>
    </div>
</div>
<script src="./build/js/main.js"></script>
</body>
</html>
