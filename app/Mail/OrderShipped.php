<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderShipped extends Mailable
{
    use Queueable, SerializesModels;
    public $orders;

    public function __construct($orderdata)
    {
        $this->orders = $orderdata;
    }

    public function build()
    {
        return $this->view('welcome');
    }
}
