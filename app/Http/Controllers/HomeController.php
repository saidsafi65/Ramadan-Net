<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function daily_sales()
    {
        return view('my_web.daily_sales');
    }
    public function daily_cards()
    {
        return view('my_web.daily.daily_cards');
    }
    public function daily_home_net()
    {
        return view('my_web.daily.daily_home_net');
    }
    public function daily_P_O_S()
    {
        return view('my_web.daily.daily_P_O_S');
    }
    public function daily_add_balance()
    {
        $jawal = DB::select('SELECT remaining_balance,new_balance FROM remaining_jawal_balance order by date_new_add desc LIMIT 1');
        $ooredoo = DB::select('SELECT remaining_balance,new_balance FROM remaining_ooredoo_balance order by date_new_add desc LIMIT 1');
        $electricity = DB::select('SELECT remaining_balance,new_balance FROM remaining_electricity_balance order by date_new_add desc LIMIT 1');
        return View::make('my_web.daily.daily_add_balance')
            ->with(['jawal' => $jawal])
            ->with(['ooredoo' => $ooredoo])
            ->with(['electricity' => $electricity]);
    }
    public function daily_sell_jawal($key)
    {
        if ($key == '1') {
            $jawal = DB::select('SELECT * FROM daily_selling_jawal order by date_selling_jawal desc LIMIT 1');
            return View::make('my_web.daily.daily_sell_jawal')
                ->with(['jawal' => $jawal])
                ->with(['key' => $key]);
        }
        if ($key == '2') {
            $ooredoo = DB::select('SELECT * FROM daily_selling_ooredoo order by date_selling_ooredoo desc LIMIT 1');
            return View::make('my_web.daily.daily_sell_jawal')
                ->with(['ooredoo' => $ooredoo])
                ->with(['key' => $key]);
        }
        if ($key == '3') {
            $electricity = DB::select('SELECT * FROM daily_selling_electricity order by date_selling_electricity desc LIMIT 1');
            return View::make('my_web.daily.daily_sell_jawal')
                ->with(['electricity' => $electricity])
                ->with(['key' => $key]);
        }
    }
    public function social_media()
    {
        $social_media = DB::select('SELECT * FROM social_media order by id desc ');
        return View::make('my_web.social.social_media')
            ->with(['social_media' => $social_media]);
    }
    public function ip_routers()
    {
        $ip_routers = DB::select('SELECT DISTINCT router_location,router_location_number FROM ip_routers');
        return View::make('my_web.routers.ip_routers')
            ->with(['ip_routers' => $ip_routers]);
    }
    public function ip_routers_location($key)
    {
        if ($key == '1') {
            $ip_routers_data = DB::select('SELECT * FROM ip_routers WHERE router_location_number LIKE 1 ');
            return View::make('my_web.routers.ip_data.ip_data')
                ->with(['ip_routers_data' => $ip_routers_data])
                ->with(['key' => $key]);
        }
        if ($key == '2') {
            $ip_routers_data = DB::select('SELECT * FROM ip_routers WHERE router_location_number LIKE 2 ');
            return View::make('my_web.routers.ip_data.ip_data')
                ->with(['ip_routers_data' => $ip_routers_data])
                ->with(['key' => $key]);
        }
        if ($key == '3') {
            $ip_routers_data = DB::select('SELECT * FROM ip_routers WHERE router_location_number LIKE 3 ');
            return View::make('my_web.routers.ip_data.ip_data')
                ->with(['ip_routers_data' => $ip_routers_data])
                ->with(['key' => $key]);
        }
        if ($key == '4') {
            $ip_routers_data = DB::select('SELECT * FROM ip_routers WHERE router_location_number LIKE 4 ');
            return View::make('my_web.routers.ip_data.ip_data')
                ->with(['ip_routers_data' => $ip_routers_data])
                ->with(['key' => $key]);
        }
        if ($key == '5') {
            $ip_routers_data = DB::select('SELECT * FROM ip_routers WHERE router_location_number LIKE 5 ');
            return View::make('my_web.routers.ip_data.ip_data')
                ->with(['ip_routers_data' => $ip_routers_data])
                ->with(['key' => $key]);
        }
    }
    public function expenses()
    {
        $mobile_accessories_items = DB::select('SELECT * FROM mobile_accessories_items');
        return View::make('my_web.expenses.expenses')
        ->with(['mobile_accessories_items' => $mobile_accessories_items]);
    }
    public function sim_card()
    {
        $sim_card1 = DB::select('SELECT sum(sims_card1_total) AS TOTAL FROM sims_card1');
        $sim_card2 = DB::select('SELECT sum(sims_card2_total) AS TOTAL FROM sims_card2');
        $sim_card3 = DB::select('SELECT sum(sims_card3_total) AS TOTAL FROM sims_card3');
        $sim_card4 = DB::select('SELECT sum(sims_card4_total) AS TOTAL FROM sims_card4');
        return View::make('my_web.simCard.sim_card')
        ->with(['sims_card1' => $sim_card1])
        ->with(['sims_card2' => $sim_card2])
        ->with(['sims_card3' => $sim_card3])
        ->with(['sims_card4' => $sim_card4]);
    }
}
