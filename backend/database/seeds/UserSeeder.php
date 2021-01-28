<?php

use Illuminate\Database\Seeder;
use App\{User, Address, Geolocation, Company};

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents('https://jsonplaceholder.typicode.com/users');
        $users = json_decode($json);
        $arr_user = [];
        $arr_address = [];
        $arr_geo = [];
        $arr_company = [];
        $i = 1;

        foreach ($users as $user) {

            $arr_user[] = [
                "name" => $user->name,
                "username" => $user->username,
                "email" => $user->email,
                "address_id" => $i,
                "phone" => $user->phone,
                "website" => $user->website,
                "company_id" => $i,
                "created_at" => \Carbon\Carbon::now()
            ];

            $arr_address[] = [
                "street" => $user->address->street,
                "suite" => $user->address->suite,
                "city" => $user->address->city,
                "zipcode" => $user->address->zipcode,
                "geo_id" => $i,
                "user_id" => $i,
            ];

            $arr_geo[] = [
                "user_id" => $i,
                "lat" => $user->address->geo->lat,
                "lng" => $user->address->geo->lng,
            ];

            $arr_company[] = [
                "user_id" => $i,
                "name" => $user->company->name,
                "catch_phrase" => $user->company->catchPhrase,
                "bs" => $user->company->bs,
            ];

            $i++;
        }
        User::insert($arr_user);
        Address::insert($arr_address);
        Geolocation::insert($arr_geo);
        Company::insert($arr_company);
    }
}
