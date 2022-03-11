<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\IcndbService;

class QuoteController extends Controller
{
    private $icndbService;

    public function __construct(IcndbService $icndbService)
    {
        $this->icndbService = $icndbService;
    }

    public function home() {
        return view('welcome');
    }

    public function getRandomQuote() {
        $randomQuote = $this->icndbService->getRandomQuote();

        return view('quote', compact('randomQuote'));
    }

    public function showCustomQuote()
    {
        return view('custom-quote', ['quote' => null]);
    }

    public function getCustomQuote(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string',
            'lastName' => 'required|string'
        ]);

        $quote = $this->icndbService->getCustomQuote(
            $request->firstName,
            $request->lastName
        );

        return view('custom-quote', compact('quote'));
    }

    public function showCategories()
    {


        $categories = $this->icndbService->getCategories();

        return view('categories', compact('categories'));
    }

    public function getQuoteByCategory(Request $request)
    {
        $request->validate([
            'categories' => 'required|array|min:1'
        ]);

        $randomQuote = $this->icndbService->getRandomQuote($request->categories);

        return view('quote', compact('randomQuote'));
    }
}
