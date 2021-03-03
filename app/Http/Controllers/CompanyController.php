<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SoapClient;

class CompanyController extends Controller
{
    public function show(Request $request)
    {
        $filter = $request->input('filter');
        $soapClient = new SoapClient("http://test.soa.energo.lv:8011/DMBServices/Private/DMBService?wsdl",
            [
                'user' => 'portal_user',
                'password' => 'yon4I1TP'
            ]);
        $list = $soapClient->GetSuppliersList([
            'MMIdentification' => [
                'username' => '*DAMBO*',
                'password' => 'u4U3hHiKa5ky4SDw',
                'supplierEIC' => 'mcnffDxWh5NEZ6BwkAvUNtsVdwaUSUeb',
                'messageId' => 'string'
            ]
        ]);
        $list = json_decode(json_encode($list), true);
        $filtered = [];

        foreach ($list['suppliersList']['SuppliersEntry'] as $entry)
        {
            if (((stripos($entry['supplierName'], $filter) !== false) || (stripos($entry['registrationNumber'], $filter) !== false)) && $entry['isActive'] == 'Y') {
                $filtered[] = $entry;
            }
        }




        return response()->json($filtered, 200);
    }
}
