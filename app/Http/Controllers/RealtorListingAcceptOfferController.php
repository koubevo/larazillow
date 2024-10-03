<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;

use function Symfony\Component\String\b;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RealtorListingAcceptOfferController extends Controller
{
    use AuthorizesRequests;
    public function __invoke(Offer $offer)
    {
        $listing = $offer->listing;
        $this->authorize('update', $listing);
        $offer->update(['accepted_at' => now()]);

        $listing->sold_at = now();
        $listing->save();

        $listing->offers()->except($offer)->update(['rejected_at' => now()]);

        return redirect()->back()->with('success', "Offer #{$offer->id} accepted, others rejected.");
    }
}
