@extends("layouts.app")

@section("title", "Роскосмос / Лицензии")
@section("countLicenses", $countLicenses)
@section("content")
    @forelse($license as $lic)
        <h1>Решениe Госкорпорации «Роскосмос»</h1>
        <h3 class="mb-4"> по предоставлению государственной услуги по лицензированию космической деятельности:</h3>
        <table class="table table-bordered col-lg-6">
            <tbody>
            <tr>
                <td scope="row" colspan="2"><h3>Приказ:</h3></td>
            </tr>
            <tr>
                <td scope="row">Дата приказа</td>
                <td>{{ $lic->date_order }} г.</td>
            </tr>
            <tr>
                <td scope="row">Тип приказа</td>
                <td>{{ $lic->order_content }}</td>
            </tr>
            <tr>
                <td scope="row" colspan="2"><h3>Лицензия:</h3></td>
            </tr>
            <tr>
                <td scope="row">Номер лицензии</td>
                <td>{{ $lic->license_number }}</td>
            </tr>
            <tr>
                <td scope="row">Дата начала действия лицензии</td>
                <td>{{ $lic->date_issue }} г.</td>
            </tr>
            <tr>
                <td scope="row" colspan="2"><h3>Организация:</h3></td>
            </tr>
            <tr>
                <td scope="row">Наименование</td>
                <td>{{ $lic->organization }}</td>
            </tr>
            <tr>
                <td scope="row">ОГРН</td>
                <td>{{ $lic->ogrn }}</td>
            </tr>
            <tr>
                <td scope="row">ИНН</td>
                <td>{{ $lic->inn }}</td>
            </tr>
            <tr>
                <td scope="row">Адрес места нахождения</td>
                <td>{{ $lic->location_address }}</td>
            </tr>
            <tr>
                <td scope="row">Адреса мест осуществления деятельности</td>
                <td>{{ $lic->activity_addresses }}</td>
            </tr>
            <tr>
                <td scope="row">Вид выполняемых работ</td>
                <td>{{ $lic->work_types }}</td>
            </tr>
            </tbody>
        </table>
    @empty
        <h3>К сожалению такой лицензии нет.</h3>
    @endforelse
@endsection
