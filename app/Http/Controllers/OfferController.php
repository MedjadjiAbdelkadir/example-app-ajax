<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOfferRequest;
use App\Models\Offer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    

    public function allOffers()
    {
        $offers = Offer::all();

       
        return view('Offer.all' ,compact('offers'));
    }
    public function create(){

        return view('Offer.create');
    }


    public function store(StoreOfferRequest $request){

        $offer =Offer::create([
            'name'=> $request->name,
            'desc'=> $request->desc,
            'prix'=>$request->prix
        ]);
     
        if($offer){
            return response()->json([
                'status' => true,
                'msg'=>'Offer saved successfully',
            ]);
        }else{
            return response()->json([
                'status' => false,
                'msg'=>'Error Saved Offer',
            ]);
        }
        
    }


    public function edit($id)
    {
        $offer = Offer::find($id);

        if(!$offer){

            return redirect()->back()->with(['error'=>'This Offer Not Found']);
        }
        return view('Offer.edit',compact('offer'));
    }

    public function update(Request $request,$id){
       $offer = Offer::find($id);

        if(!$offer){

            return redirect()->back()->with(['error'=>'This Offer Not Found']);
        }
        $offer->update($request->all());
        return redirect()->back()->with(['success'=>'Update Offer Successfully']);
    }

    public function delete(Request $request)
    {
        $offer = Offer::find($request->id);

        if(!$offer){
            return response()->json([
                'status' => false,
                'msg'=>'Offer Not Exist',
            ]);
        }else{
            
            $offer->delete();
            return response()->json([
                'status' => true,
                'msg'=>'Delete Offer Successfully',
                'id'=>$request->id,
            ]);   
        }

    }
}
