<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request) //you only see the post of the id you have follow
    {
        $followingIds = auth()->user()->followings()->pluck('user_id');

        $ideas = Idea::whereIn('user_id',$followingIds)->latest();

        if(request()->has("search")){
            $ideas = $ideas->where('content','like', '%' . request()->get('search','') .'%');
        }

        return view('dashboard', [
            'ideas' => $ideas ->paginate(3), //paginate for pagination show 3 data
        ]);
    }
}
