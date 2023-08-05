<?php

namespace App\Http\Controllers;

use App\Models\daily_balance;
use App\Models\daily_card;
use App\Models\daily_gift;
use App\Models\daily_home_net;
use App\Models\daily_p_o_s;
use App\Models\daily_selling_electricity;
use App\Models\daily_selling_jawal;
use App\Models\daily_selling_ooredoo;
use App\Models\daily_snaks;
use App\Models\ip_routers;
use App\Models\remaining_electricity_balance;
use App\Models\remaining_jawal_balance;
use App\Models\remaining_ooredoo_balance;
use App\Models\social_media;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class AuthenticationController extends Controller
{
    public function registration()
    {
        return view('frontend.registrat');
    }

    public function doregistration(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'mobile' => 'required|numeric|unique:users',
            'password' => 'required|confirmed',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['name']       = $request->name;
        $data['username']   = $request->username;
        $data['email']      = $request->email;
        $data['mobile']     = $request->mobile;
        $data['password']   = bcrypt($request->password);

        User::create($data);

        return redirect()->route('login')->with([
            'message' => 'User created successfully',
            'alert-type' => 'success'
        ]);
    }

    public function login()
    {
        return view('frontend.login');
    }

    public function dologin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'login_id' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (filter_var($request->login_id, FILTER_VALIDATE_EMAIL)) {
            $user_id = 'email';
        } elseif (filter_var((int)$request->login_id, FILTER_VALIDATE_INT)) {
            $user_id = 'mobile';
        } else {
            $user_id = 'username';
        }

        $request->merge([
            $user_id => $request->login_id
        ]);

        if (Auth::attempt($request->only($user_id, 'password'), $request->filled('remember'))) {
            return redirect()->route('home')->with([
                'message' => 'logged in successfully',
                'alert-type' => 'success'
            ]);
        } else {
            return redirect()->route('login')->with([
                'message' => 'These credentials do not match our records.',
                'alert-type' => 'danger'
            ]);
        }
    }

    public function dologout()
    {
        Auth::logout();
        return redirect()->route('login')->with([
            'message' => 'logged Out successfully',
            'alert-type' => 'success'
        ]);
    }

    public function adddailycard(Request $request)
    {
        $daily_card = new daily_card;
        $daily_card->card_type = $request->card_type;
        $daily_card->card_quantity = $request->card_quantity;
        $daily_card->card_total = $request->card_total;
        $daily_card->save();
        return redirect('home');
    }

    public function add_dailyhomenet(Request $request)
    {
        $daily_card = new daily_home_net();
        $daily_card->homenet_name = $request->homenet_name;
        $daily_card->homenet_no = $request->homenet_no;
        $daily_card->homenet_month = $request->homenet_month;
        $daily_card->homenet_total = $request->homenet_total;
        $daily_card->save();
        return redirect('home');
    }

    public function add_dailypos(Request $request)
    {
        $daily_card = new daily_p_o_s();
        $daily_card->pos_name = $request->pos_name;
        $daily_card->pos_card_type = $request->pos_card_type;
        $daily_card->pos_card_quantity = $request->pos_card_quantity;
        $daily_card->pos_card_total = $request->pos_card_total;
        $daily_card->save();
        return redirect('home');
    }

    public function add_dailysnaks(Request $request)
    {
        $daily_card = new daily_snaks();
        $daily_card->snaks_type = $request->snaks_type;
        $daily_card->snaks_weight = $request->snaks_weight;
        $daily_card->snaks_prise = $request->snaks_prise;
        $daily_card->save();
        return redirect('home');
    }

    public function add_dailygift(Request $request)
    {
        $daily_card = new daily_gift();
        $daily_card->gift_day = $request->gift_day;
        $daily_card->gift_total = $request->gift_total * -1;
        $daily_card->save();
        return redirect('home');
    }

    public function add_dailybalance(Request $request)
    {
        if ($request->balance_type == 'jawal_balance') {
            $add_jawal_balance = new remaining_jawal_balance();
            $add_jawal_balance->new_balance = $request->balance_mount;
            $add_jawal_balance->last_add = $request->new_balance_jawal;
            $add_jawal_balance->remaining_balance = $request->remaining_jawal + $request->balance_mount;
            $remaining_balances = $request->remaining_jawal + $request->balance_mount;
            $add_jawal_balance->remm = 'اضافة رصيد جوال جديد بقيمة ' + $request->balance_mount;
            $add_jawal_balance->save();
        }
        if ($request->balance_type == 'ooredoo_balance') {
            $add_ooredoo_balance = new remaining_ooredoo_balance();
            $add_ooredoo_balance->new_balance = $request->balance_mount;
            $add_ooredoo_balance->last_add = $request->new_balance_ooredoo;
            $add_ooredoo_balance->remaining_balance = $request->remaining_ooredoo + $request->balance_mount;
            $remaining_balances = $request->remaining_ooredoo + $request->balance_mount;
            $add_ooredoo_balance->save();
        }
        if ($request->balance_type == 'electricity_balance') {
            $add_electricity_balance = new remaining_electricity_balance();
            $add_electricity_balance->new_balance = $request->balance_mount;
            $add_electricity_balance->last_add = $request->new_balance_electricity;
            $add_electricity_balance->remaining_balance = $request->remaining_electricity + $request->balance_mount;
            $remaining_balances = $request->remaining_electricity + $request->balance_mount;
            $add_electricity_balance->save();
        }

        $daily_card = new daily_balance();
        $daily_card->balance_type = $request->balance_type;
        $daily_card->balance_mount = $request->balance_mount;
        $daily_card->balance_total = $request->balance_total * -1;
        $daily_card->remaining_balance = $remaining_balances;
        $daily_card->balance_dealer = $request->balance_dealer;
        $daily_card->dealer_name = $request->dealer_name;
        $daily_card->dealer_jawal = $request->dealer_jawal;
        $daily_card->dealer_id = $request->dealer_id;
        $daily_card->day_balance = $request->day_balance;
        $daily_card->save();

        return redirect('home');
    }

    public function add_dailyjawal(Request $request)
    {
        $jawal = DB::select('SELECT remaining_balance,new_balance,last_add FROM remaining_jawal_balance order by date_new_add desc LIMIT 1');

        $daily_card = new daily_selling_jawal();
        $daily_card->remaining_jawal = $request->remaining_jawal - $request->jawal_selling_total;
        $daily_card->jawal_selling_total = $request->jawal_selling_total;
        $daily_card->remm = 'شحن رصيد جوال لمشترك بقيمة ' . ' ' . $request->jawal_selling_total . '  شيكل  ';
        $daily_card->day_selling_jawal = $request->day_selling_jawal;
        $daily_card->save();

        foreach ($jawal as $value) {
            $last_add = $value->last_add;
            $new_balance = $value->new_balance;
        }

        $add_jawal_balance = new remaining_jawal_balance();
        $add_jawal_balance->remaining_balance = $request->remaining_jawal - $request->jawal_selling_total;
        $add_jawal_balance->last_add = $last_add;
        $add_jawal_balance->new_balance = $new_balance;
        $add_jawal_balance->remm = 'شحن رصيد جوال لمشترك بقيمة ' . ' ' . $request->jawal_selling_total . '  شيكل  ';
        $add_jawal_balance->save();
        return redirect('home');
    }

    public function add_dailyooredoo(Request $request)
    {
        $ooredoo = DB::select('SELECT remaining_balance,new_balance,last_add FROM remaining_ooredoo_balance order by date_new_add desc LIMIT 1');

        $daily_card = new daily_selling_ooredoo();
        $daily_card->remaining_ooredoo = $request->remaining_ooredoo - $request->ooredoo_selling_total;
        $daily_card->ooredoo_selling_total = $request->ooredoo_selling_total;
        $daily_card->remm = 'شحن رصيد وطنية لمشترك بقيمة ' . ' ' . $request->ooredoo_selling_total . '  شيكل  ';
        $daily_card->day_selling_ooredoo = $request->day_selling_ooredoo;
        $daily_card->save();

        foreach ($ooredoo as $value) {
            $last_add = $value->last_add;
            $new_balance = $value->new_balance;
        }

        $add_ooredoo_balance = new remaining_ooredoo_balance();
        $add_ooredoo_balance->remaining_balance = $request->remaining_ooredoo - $request->ooredoo_selling_total;
        $add_ooredoo_balance->last_add = $last_add;
        $add_ooredoo_balance->new_balance = $new_balance;
        $add_ooredoo_balance->remm = 'شحن رصيد وطنية لمشترك بقيمة ' . ' ' . $request->ooredoo_selling_total . '  شيكل  ';
        $add_ooredoo_balance->save();
        return redirect('home');
    }

    public function add_dailyelectricity(Request $request)
    {
        $electricity = DB::select('SELECT remaining_balance,new_balance,last_add FROM remaining_electricity_balance order by date_new_add desc LIMIT 1');

        $daily_card = new daily_selling_electricity();
        $daily_card->remaining_electricity = $request->remaining_electricity - $request->electricity_selling_total;
        $daily_card->electricity_selling_total = $request->electricity_selling_total;
        $daily_card->remm = 'شحن رصيد كهرباء لمشترك بقيمة ' . ' ' . $request->electricity_selling_total . '  شيكل  ';
        $daily_card->day_selling_electricity = $request->day_selling_electricity;
        $daily_card->save();

        foreach ($electricity as $value) {
            $last_add = $value->last_add;
            $new_balance = $value->new_balance;
        }

        $add_electricity_balance = new remaining_electricity_balance();
        $add_electricity_balance->remaining_balance = $request->remaining_electricity - $request->electricity_selling_total;
        $add_electricity_balance->last_add = $last_add;
        $add_electricity_balance->new_balance = $new_balance;
        $add_electricity_balance->remm = 'شحن رصيد كهرباء لمشترك بقيمة ' . ' ' . $request->electricity_selling_total . '  شيكل  ';
        $add_electricity_balance->save();
        return redirect('home');
    }
    public function add_socialmedia(Request $request)
    {
        $social_media = new social_media();
        $social_media->remm = $request->remm;
        $social_media->user_name = $request->user_name;
        $social_media->passwords = $request->passwords;
        $social_media->save();
        return redirect('social_media');
    }

    public function edit_socialmedia(Request $request, $id)
    {
        $social_media = social_media::find($id);
        $social_media->remm = $request->remm;
        $social_media->user_name = $request->user_name;
        $social_media->passwords = $request->passwords;
        $social_media->update();
        return redirect('social_media')->with('status', 'Student Updated Successfully');
    }

    public function add_iprouters(Request $request, $name, $key)
    {
        $ip_routers = new ip_routers();
        $ip_routers->router_location = $request->$name;
        $ip_routers->router_location_number = $request->$key;
        $ip_routers->router_ip = $request->router_ip;
        $ip_routers->router_names = $request->router_names;
        $ip_routers->router_sub1 = $request->router_sub1;
        $ip_routers->router_sub2 = $request->router_sub2;
        $ip_routers->router_sub3 = $request->router_sub3;
        $ip_routers->router_sub4 = $request->router_sub4;
        $ip_routers->router_sub5 = $request->router_sub5;
        $ip_routers->router_sub6 = $request->router_sub6;
        $ip_routers->save();
        return redirect()->back()->with('success', 'routers save Successfully');
    }

    public function edit_iprouters(Request $request, $id)
    {
        $ip_routers = ip_routers::find($id);
        $ip_routers->router_ip = $request->router_ip;
        $ip_routers->router_names = $request->router_names;
        $ip_routers->router_sub1 = $request->router_sub1;
        $ip_routers->router_sub2 = $request->router_sub2;
        $ip_routers->router_sub3 = $request->router_sub3;
        $ip_routers->router_sub4 = $request->router_sub4;
        $ip_routers->router_sub5 = $request->router_sub5;
        $ip_routers->router_sub6 = $request->router_sub6;
        $ip_routers->update();
        return redirect()->back()->with('success', 'routers Updated Successfully');
    }
}
