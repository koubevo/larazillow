<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Offer;
use App\Notifications\OfferMade;
use App\Policies\ListingPolicy;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ListingOfferController extends Controller
{
    use AuthorizesRequests;
    public function store(Listing $listing, Request $request)
    {

        $this->authorize('view', $listing);
        $offer = $listing->offers()->save(
            Offer::make($request->validate([
                'amount' => 'required|integer|min:1|max:20000000'
            ]))->bidder()->associate($request->user())
        );

        $listing->owner->notify(new OfferMade($offer));

        return redirect()->back()->with('success', 'Offer was made');
    }
}
