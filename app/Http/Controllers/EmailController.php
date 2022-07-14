<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class EmailController extends Controller
{
    public function sendEmail()
    {
        /** 
         * Store a receiver email address to a variable.
         */
        $reveiverEmailAddress = "tarastar115@gmail.com";

        /**
         * Import the Mail class at the top of this page,
         * and call the to() method for passing the 
         * receiver email address.
         * 
         * Also, call the send() method to incloude the
         * HelloEmail class that contains the email template.
         */

        /**
         * Check if the email has been sent successfully, or not.
         * Return the appropriate message.
         */
        if (Mail::failures() != 0) {
            return "Email has been sent successfully.";
        }
        return "Oops! There was some error sending the email.";
    }
}
