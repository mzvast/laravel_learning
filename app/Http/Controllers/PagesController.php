<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function about()
    {
    	// $people = [
    	// 	'Texlar','Day be','fucker'
    	// ];
    	$people = [];
    	$first =  'Doggie';
    	$last = 'Maxis';
    	return view('pages.about',compact('people','first','last'));
    }

    public function contact()
    {
    	return view('pages.contact');
    }
}
