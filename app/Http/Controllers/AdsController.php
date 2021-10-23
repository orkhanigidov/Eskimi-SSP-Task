<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    public function index()
    {
        $ads = Ads::all()->toArray();
        return array_reverse($ads);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif'
        ]);

        $image = $request->file('image');
        $imageName = $image->getClientOriginalName();
        $imageName = time() . '_' . $imageName;

        $image->move(public_path('/images'), $imageName);

        $ad = new Ads([
            'name' => $request->input('name'),
            'fromdate' => $request->input('fromdate'),
            'todate' => $request->input('todate'),
            'totalbudget' => $request->input('totalbudget'),
            'dailybudget' => $request->input('dailybudget'),
            'image' => '../images/' . $imageName
        ]);
        $ad->save();

        return response()->json('Ad created!');
    }

    public function show($id)
    {
        $ad = Ads::find($id);
        return response()->json($ad);
    }

    public function update(Request $request, $id)
    {
        $ad = Ads::find($id);
        // $ad->update($request->all());

        if ($request->file('image')) {
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif'
            ]);

            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $imageName = time() . '_' . $imageName;

            $image->move(public_path('/images'), $imageName);

            $ad->image = '../images/' . $imageName;
        }

        $ad->name = $request->input('name');
        $ad->fromdate = $request->input('fromdate');
        $ad->todate = $request->input('todate');
        $ad->totalbudget = $request->input('totalbudget');
        $ad->dailybudget = $request->input('dailybudget');
        $ad->save();

        return response()->json('Ad updated!');
    }
}
