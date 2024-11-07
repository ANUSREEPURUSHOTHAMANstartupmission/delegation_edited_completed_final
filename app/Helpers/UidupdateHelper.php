<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Http;

class UidupdateHelper{
   
        // Update existing startup
     public static function updateuid($startupdata, $directors,$products,$startup){
        $startup->update([
            'name' => $startupdata["name"],
            'email' => $startupdata["login_email"],
            'website' => $startupdata["website"],
            'contact_num' => $startupdata["phone"],
            'location' => $startupdata["registered_district"],
            'founding_year' => $startupdata["incorp_date"],
        ]);

        // Update products
        $startup->products()->delete();
        foreach ($products as $product) {
            $startup->products()->create([
                'name' => $product["name"],
                'pitch' => $product["pitch"],
                'brief' => $product["brief"],
                'sector_verified' => $product["sector_verified"],
                'type' => $product["type"],
                'sectors' => json_encode($product["sectors"]),
                'technologies' => json_encode($product["technologies"]),
            ]);
        }

        // Update directors
        $startup->directors()->delete();
        foreach ($directors as $director) {
            $startup->directors()->create([
                'name' => $director["name"],
                'gender' => $director["gender"],
                'category' => $director["category"],
                'din' => $director["din"],
                'share' => $director["share"],
            ]);
        }

     }

    
}