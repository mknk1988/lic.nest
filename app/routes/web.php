<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LicensesController;
use App\Models\Licenses;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [LicensesController::class, "showAll"]);

Route::get("/search", [LicensesController::class, "showAll"]);

Route::get('/{number}', [LicensesController::class, "show"])
    ->where("number", "[0-9]+");

Route::post("/search", [LicensesController::class, "search"]);

Route::get(
    '/documents',
    function () {
        return view('documents', [
            "countLicenses" => Licenses::getCountLicenses()
        ]);
    }
);

Route::get(
    '/information',
    function () {
        return view('information', [
            "countLicenses" => Licenses::getCountLicenses()
        ]);
    }
);
