<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ListingController extends Controller
{
    public function search(Request $request)
{
    $listings = Listing::query();

    if ($request->location) {
        $listings->whereIn('location', $request->location);
    }

    if ($request->price) {
        $listings->whereBetween('price', [$request->price['min'], $request->price['max']]);
    }

    if ($request->square_meters) {
        $listings->whereBetween('square_meters', [$request->square_meters['min'], $request->square_meters['max']]);
    }

    if ($request->availability) {
        $listings->whereIn('availability', $request->availability);
    }

    if ($request->type) {
        $listings->whereIn('type', $request->type);
    }

    return $listings->get();

    // Log the performed search
    Log::channel('searches')->info("Search performed with parameters: " . json_encode($request->all()));

}
}
