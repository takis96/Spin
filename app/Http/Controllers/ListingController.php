<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class ListingController extends Controller
{
    public function search(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'location' => 'required|array',
                'price' => 'required|array',
                'price.min' => 'integer|min:0',
                'price.max' => 'integer|min:0',
                'square_meters' => 'required|array',
                'square_meters.min' => 'integer|min:20|max:10000',
                'square_meters.max' => 'integer|min:20|max:10000',
                'availability' => 'required|in:sale,rent',
                'type' => 'required|array',
                'type' => 'required|in:apartment,studio,loft,maisonette',
            ]);

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

            $results = $listings->get();

            // Log the performed search
            Log::channel('searches')->info("Search performed with parameters: " . json_encode($request->all()));

            return $results;
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

}
