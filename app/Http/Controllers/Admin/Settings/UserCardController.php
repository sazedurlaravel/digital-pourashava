<?php

namespace App\Http\Controllers\Admin\Settings;

use Exception;
use App\Models\UserCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userCards = UserCard::get();

        return view('admin.settings.user_card', compact('userCards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required|integer'
        ],
        [
            'amount.required' => 'কার্ডের পরিমান দিন',
            'amount.integer'  => 'কার্ডের পরিমান সংখ্যায় দিন'
        ]);

        try {
            DB::beginTransaction();
            
            for ($i = 1; $i <= $request->amount; $i++) {
                // Generate 6 digit pin number
                $pinNumber   = random_int(100000, 999999);
    
                // Create pin number
                $userCard = new UserCard();
                $userCard->pin_no = $pinNumber;
                $userCard->save();
    
                // Generate 8 digit card number appending 0 at the beging of last user card id
                $cardNumber = str_pad($userCard->id, 8, '0', STR_PAD_LEFT);
                
                // Create card number
                $userCard->card_no = $cardNumber;
                $userCard->save();
            }

            DB::commit();

            $request->session()->flash('message', 'ব্যবহারকারীর কার্ড তৈরি হয়েছে।');
            $request->session()->flash('alert-type', 'success');
            return redirect()->back();
        } catch (Exception $e) {
            DB::rollBack();
            $request->session()->flash('message', 'কিছু ভুল হয়েছে।');
            $request->session()->flash('alert-type', 'danger');
            return redirect()->back();
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserCard  $userCard
     * @return \Illuminate\Http\Response
     */
    public function show(UserCard $userCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserCard  $userCard
     * @return \Illuminate\Http\Response
     */
    public function edit(UserCard $userCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserCard  $userCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserCard $userCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserCard  $userCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserCard $userCard)
    {
        //
    }
}
