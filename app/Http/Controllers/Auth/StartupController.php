<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\UidHelper;
use App\Helpers\UidupdateHelper;

use App\Models\Startup;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class StartupController extends Controller
{
    public function login_page(){
        return UidHelper::login();
    }

    public function authenticate()
{
    $datas = UidHelper::callback();
    $startupdata = UidHelper::getUidDetails($datas["unique_id"]);
    $directors = $startupdata["directors"];
    $products = $startupdata["products"];

    $startup = Startup::query()->where('unique_id', $startupdata["unique_id"])->first();
    // dd($startup);
    if ($startup) {
        // Update existing startup
        UidupdateHelper::updateuid($startupdata, $directors,$products,$startup);
        Auth::login($startup->user, $remember = true);

        return redirect()->route('user.dashboard');
    } 
    else 
    {
        // Create new user and startup
        $super = Role::firstOrCreate(["name" => "user"]);

        $user = new User();
        $user->name = $startupdata["name"];
        $user->email = $startupdata["login_email"];
        $user->password = "nopass";
        $user->save();

        $user->assignRole($super);

        $startup = Startup::create([
            'name' => $startupdata["name"],
            'email' => $startupdata["login_email"],
            'website' => $startupdata["website"],
            'contact_num' => $startupdata["phone"],
            'location' => $startupdata["registered_district"],
            'unique_id' => $startupdata["unique_id"],
            'founding_year' => $startupdata["incorp_date"],
            'user_id' => $user->id,
        ]);

        // Save products
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

        // Save directors
        foreach ($directors as $director) {
            $startup->directors()->create([
                'name' => $director["name"],
                'gender' => $director["gender"],
                'category' => $director["category"],
                'din' => $director["din"],
                'share' => $director["share"],
            ]);
        }

        Auth::login($user, $remember = true);

        return redirect()->route('user.dashboard');
    }
}

    
    
  
}
