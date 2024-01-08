<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\About;
use App\Models\Contact;
use App\Models\Activity;
use App\Models\Mision;
use App\Models\Home;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $home = Home::where('id', 1)->first();
        $activity = Activity::orderBy('created_at', 'asc')->take(3)->get();
        $news = News::orderBy('created_at', 'asc')->take(3)->get();
        $contact = Contact::where('id', 1)->first();
        return view('client.index', compact('home', 'activity', 'news', 'contact'));
    }

    public function news()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(9);
        $contact = Contact::where('id', 1)->first();
        return view('client.news', compact('news', 'contact'));
    }

    public function newsDetail(string $title)
    {
        $data = News::where('title', $title)->first();
        $contact = Contact::where('id', 1)->first();
        return view('client.news-detail', compact('data', 'contact'));
    }

    public function about()
    {
        $about = About::where('id', 1)->first();
        $mision = Mision::where('about_id', 1)->get();
        $contact = Contact::where('id', 1)->first();
        return view('client.about', compact('about', 'mision', 'contact'));
    }

    public function activity()
    {
        $activity = Activity::orderBy('created_at', 'desc')->paginate(9);
        $contact = Contact::where('id', 1)->first();
        return view('client.activity', compact('activity', 'contact'));
    }

    public function contact()
    {
        $contact = Contact::where('id', 1)->first();
        return view('client.contact')->with('contact', $contact);
    }
    
}
