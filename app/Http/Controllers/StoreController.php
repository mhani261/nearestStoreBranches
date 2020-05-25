<?php

namespace App\Http\Controllers;

use App\Http\Resources\StoreCollection;
use App\Http\Resources\StoreResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StoreController extends Controller
{

    public function Stores_list(Request $request)
    {
        $lang = $request->header('lang');
        $latitude = $request->lat;
        $longitude = $request->lng;
        $stores = DB::table('store_branches')->select(DB::raw('*, ( 6367 * acos( cos( radians(' . $latitude . ') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(' . $longitude . ') ) + sin( radians(' . $latitude . ') ) * sin( radians( lat ) ) ) ) AS distance'))
            ->join('stores', 'store_branches.store_id', '=', 'stores.id')
            ->join('store_translation', 'stores.id', '=', 'store_translation.store_id')
            ->join('store_branches_translation', 'store_branches_translation.store_branch_id', '=', 'store_branches.id')
            ->join('stores_categories', 'stores.category_id', '=', 'stores_categories.id')
            ->join('stores_categories_translation', 'stores_categories_translation.store_category_id', '=', 'stores_categories.id')
            ->where('store_translation.locale', '=', $lang)
            ->where('stores_categories_translation.locale', '=', $lang)
            ->where('store_branches_translation.locale', '=', $lang)
            ->get();
        $stores = $stores->unique('store_id');

        return StoreResource::collection($stores)->additional(['status' => 'success']);
    }


}
