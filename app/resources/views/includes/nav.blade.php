<nav class="navbar navbar-dark bg-dark sticky-top bg-dark flex-md-nowrap shadow navbar-expand-lg"><a
        class="navbar-brand" href="{{ url("/") }}"><img src="{{asset("./build/img/logo.png")}}" height="30" alt="" loading="lazy"> </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span
            class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item{{ Request::path() ==  'documents' ? ' active' : ''  }}"><a class="nav-link" href="{{ url("/documents") }}">Нормативно-правовые акты</a></li>
            <li class="nav-item"><a class="nav-link" href="https://www.roscosmos.ru/22364/">Лицензирование</a></li>
            <li class="nav-item{{ Request::path() ==  'information' ? ' active' : ''  }}"><a class="nav-link" href="{{ url("/information") }}">Общая информация</a></li>
        </ul>
    </div>
</nav>
