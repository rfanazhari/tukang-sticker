<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $quotes = [
            [
                'text' => "I've failed over and over and over again in my life and that is why I succeed.",
                'by'   => "Michael Jordan",
            ],
            [
                'text' => "Nothing can stop the man with the right mental attitude from achieving his goal; nothing on earth can help the man with the wrong mental attitude.",
                'by'   => "Thomas Jefferson",
            ],
            [
                'text' => "Your work is going to fill a large part of your life, and the only way to be truly satisfied is to do what you believe is great work. And the only way to do great work is to love what you do. If you haven't found it yet, keep looking. Don't settle. As with all matters of the heart, you'll know when you find it.",
                'by'   => "Steve Jobs",
            ],
            [
                'text' => "I've missed more than 9000 shots in my career. I've lost almost 300 games. 26 times, I've been trusted to take the game winning shot and missed. I've failed over and over and over again in my life. And that is why I succeed.",
                'by'   => "Michael Jordan",
            ],
            [
                'text' => "The only place success comes before work is in the dictionary.",
                'by'   => "Vince Lombardi",
            ],
            [
                'text' => "Nothing is work unless you'd rather be doing something else.",
                'by'   => "George Halas",
            ],
            [
                'text' => "A professional is someone who can do his best work when he doesn't feel like it.",
                'by'   => "Alistair Cooke",
            ],
            [
                'text' => "The pessimist complains about the wind; the optimist expects it to change; the realist adjusts the sails.",
                'by'   => "William Arthur Ward",
            ],
            [
                'text' => "If you think you can't, you're right.",
                'by'   => "Carol Bartz",
            ],
            [
                'text' => "Yesterday's home runs don't win today's games.",
                'by'   => "Babe Ruth",
            ],
        ];

        $i=1;
        $printIndex = 11;
        $nums = 0;
        while($i<=20)
        {
            if ($i == $printIndex)
                $nums = rand(1,count($quotes));
            $i++;
        }
        $data['quotes'] = isset($quotes[$nums]) ? $quotes[$nums] : $quotes[0];
        return view('admin.home', $data);
    }
}
