<?php

namespace Services;

use SoapClient;

class FetchDataService
{
    public function fetchAllSuppliers()
    {
        $soapClient = new SoapClient(config('soap.wsdl'),
            [
                'user' => config('soap.user'),
                'password' => config('soap.password')
            ]);
        return $soapClient->GetSuppliersList(config('soap.requestSettings.GetSupplierList.body'));
    }

}
