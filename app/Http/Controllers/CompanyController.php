<?php

namespace App\Http\Controllers;

use Carbon\Laravel\ServiceProvider;
use Illuminate\Http\Request;
use Services\FetchDataService;
use SoapClient;

class CompanyController extends Controller
{
    public function show(Request $request, ServiceProvider $provider)
    {
        $filter = $request->input('filter');
        $list = resolve('FetchDataService')->fetchAllSuppliers();
        $list = json_decode(json_encode($list), true);
        $filtered = [];

        foreach ($list['suppliersList']['SuppliersEntry'] as $entry)
        {
            if (
                ((stripos($entry['supplierName'], $filter) !== false) || (stripos($entry['registrationNumber'], $filter) !== false)) &&
                $entry['isActive'] == 'Y') {
                $filtered[] = $entry;
            }
        }




        return response()->json($filtered, 200);
    }
}
