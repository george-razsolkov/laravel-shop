<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Aimeos\MShop\Factory;

class HomeController extends Controller {
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
        $bestSellers = array();
        $media = array();
        $catalogList = app('\Aimeos\Shop\Base\Page')->getSections('catalog-list');
        $context = app('\Aimeos\Shop\Base\Context')->get();
        $manager = Factory::createManager($context, 'order/base/product');
        $filter = $manager->createSearch()->setSlice(0, 10)->setSortations(array(
            $manager->createSearch()->sort('+', 'order.base.product.quantity')
        ));
        $orders = $manager->aggregate($filter, 'order.base.product.productid', 'order.base.product.quantity', 'sum');
        $manager = \Aimeos\MShop\Factory::createManager($context, 'product');
        foreach ($orders as $id => $count) {
            $index = current($orders);
            $product = $manager->getItem($id, array('media', 'price'));
            if (isset($product) && !empty($product)) {
                $bestSellers[$index]= $product->toArray();
                $refItems = $product->getRefItems();
                foreach ($refItems as $type => $items) {
                    foreach ($items as $item) {
                        if($type == 'media') {
                            array_push($media, $item->toArray());
                            $bestSellers[$index]['media']= $media;
                        }elseif ($type == 'price'){
                           $bestSellers[$index][$type] = $item->toArray();
                        }
                    }
                }
            }

        }
        //return $bestSellers;
        return view('home', [
            'basket' => $catalogList['aibody']['basket/mini'],
            'bestSellers' => $bestSellers
        ]);
    }
}
