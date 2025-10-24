<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CaptchaController extends Controller
{
    /**
     * Generate a simple math captcha
     */
    public function generate()
    {
        // Generate two random numbers between 1 and 10
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);

        // Store the answer in session
        $answer = $num1 + $num2;
        Session::put('captcha_answer', $answer);

        // Return the question
        return response()->json([
            'question' => "$num1 + $num2 = ?"
        ]);
    }

    /**
     * Validate captcha answer
     */
    public static function validate(Request $request)
    {
        $userAnswer = $request->input('captcha');
        $correctAnswer = Session::get('captcha_answer');

        // Clear the captcha from session after validation
        Session::forget('captcha_answer');

        return $userAnswer == $correctAnswer;
    }
}
