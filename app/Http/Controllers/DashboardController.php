<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function barChart(){
        $clients = Client::all()->take(7);
        $clientsNames = array();
        $clientsOrdersNumber = array();
        $barChart = array();
        foreach ($clients as $key => $client) {
            array_push($clientsNames, $client->lastName);
            array_push($clientsOrdersNumber, $client->orders->count());
        }
        array_push($barChart, ['names' => $clientsNames, 'ordersCount' => $clientsOrdersNumber]);
        return $barChart;
    }
    public function ok(){
        $clients = Client::all()->take(7);
        foreach ($clients as $key => $client) {
            $client->setPasswordAttribute("123456789");
            $client->save();
        }
        return $clients;
        return Hash::make("123456789");
    }
}
