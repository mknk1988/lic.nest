@extends("layouts.app")

@section("title", "Роскосмос / Лицензии")
@section("countLicenses", $countLicenses)

@section("content")
    <div class="table-responsive">
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
            @foreach($licenses as $license)
                <tr>
                    <th scope="row">{{ $license->license_number }}</th>
                    <td class="w-50">{{ $license->organization }}</td>
                    <td>{{ $license->ogrn }}</td>
                    <td>{{ $license->inn }}</td>
                    <td>{{ $license->date_issue }}</td>
                    <td>
                        <a href="/{{ (int)$license->license_number }}">
                            <button type="button" class="btn btn-success">Перейти</button>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
@endsection
