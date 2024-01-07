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
        return view('client.index', compact('home', 'activity', 'news'));
    }

    public function news()
    {
        $news = News::orderBy('created_at', 'desc')->paginate(9);
        return view('client.news')->with('news', $news);
    }

    public function newsDetail(string $title)
    {
        $data = News::where('title', $title)->first();
        return view('client.news-detail')->with('data', $data);
    }

    public function about()
    {
        $about = About::where('id', 1)->first();
        $mision = Mision::where('about_id', 1)->get();
        return view('client.about', compact('about', 'mision'));
    }

    public function activity()
    {
        $activity = Activity::orderBy('created_at', 'desc')->paginate(9);
        return view('client.activity')->with('activity', $activity);
    }

    public function contact()
    {
        $contact = Contact::where('id', 1)->first();
        return view('client.contact')->with('contact', $contact);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
