@extends("layouts.app")

@section("title", "Роскосмос / Лицензии")
@section("countLicenses", $countLicenses)

@section("content")
    <h2 class="text-success">Результаты поиска:</h2>
    <div class="table-responsive-sm">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Номер лицензии</th>
                <th scope="col">Наименование лицензиата</th>
                <th scope="col">ОГРН</th>
                <th scope="col">ИНН</th>
                <th scope="col">Дата начала действия лицензии</th>
                <th scope="col">Ссылка на страницу</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $licenses)
                <tr>
                    <th scope="row">{{ $licenses->license_number }}</th>
                    <td class="w-50">{{ $licenses->organization }}</td>
                    <td>{{ $licenses->ogrn }}</td>
                    <td>{{ $licenses->inn }}</td>
                    <td>{{ $licenses->date_issue }}</td>
                    <td>
                        <a href="/{{ (int)$licenses->license_number }}">
                            <button type="button" class="btn btn-success">Перейти</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
