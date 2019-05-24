<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;
use App\Orders;
use Cart;
use Session;
use DB;
use App\Product;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct()
    {
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $session_id=Session::get('session_id');
        $customerCart=DB::table('cart')->where(['session_id'=>$session_id])->get();
        $customer_name=Auth::guard('customers')->user()->name;
        return $this->view('mails.shipped',compact('customerCart','customer_name'));
    }
}
