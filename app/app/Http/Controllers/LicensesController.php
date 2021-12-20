<?php

namespace App\Http\Controllers;

use App\Models\Licenses;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

/**
 * Class LicensesController
 * @package App\Http\Controllers
 */
class LicensesController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function showAll()
    {
        return view(
            'home',
            [
                "licenses" => Licenses::getAllLicenses(),
                "countLicenses" => Licenses::getCountLicenses()
            ]
        );
    }

    /**
     * @param $licenseNumber
     * @return Application|Factory|View
     */
    public function show($licenseNumber)
    {
        $licenses = new Licenses();
        return view(
            'license',
            [
                "license" => $licenses->getLicenseInformation($licenseNumber),
                "countLicenses" => Licenses::getCountLicenses()
            ]
        );
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function search(Request $request)
    {
        return view(
            "search_results",
            [
                "data" => Licenses::searchLicenses($request->all()),
                "countLicenses" => Licenses::getCountLicenses()
            ]
        );
    }
}
