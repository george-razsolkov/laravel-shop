<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Aimeos\MShop\Order;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = app( '\Aimeos\Shop\Base\Page' )->getSections( 'catalog-list' );
        $miniBasket =  $params['aibody']['basket/mini'];
        return view('home')->withBasket($miniBasket);
    }
}
