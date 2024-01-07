<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Home;
use App\Models\About;
use App\Models\Mision;
use App\Models\Contact;
use App\Models\Activity;
use App\Models\News;
use App\Models\Donate;
use App\Models\Cash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class AdminController extends Controller
{
    public function index()
    {
        $totalAnggota = User::where('role', 'anggota')->count();
        $totalAdmin = User::where('role', 'admin')->count();
        $totalBerita = News::count();
        $totalJumlahDonasi = Donate::sum('amount');
        $totalJumlahKas = Cash::sum('amount');
        return view('admin.index', compact('totalAnggota', 'totalAdmin', 'totalBerita', 'totalJumlahDonasi', 'totalJumlahKas'));
    }

    public function editProfile() {
        $data = User::where('id', auth()->user()->id)->first();
        return view('admin.profile.edit')->with('data', $data);
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'username' => ['required', 'string'],
            'phone' => ['required', 'string'],
        ], [
            'required' => 'Kolom :attribute harus diisi.'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::where('id', auth()->user()->id)->first();
        if (!$user) {
            return redirect()->back()->withErrors("User is not found")->withInput();
        }

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'phone' => $request->phone,
        ];

        User::where('id', auth()->user()->id)->update($data);
        return redirect()->back()->with('success', 'Berhasil update data!');
    }

    public function changePassword(Request $request) {
        $validator = Validator::make($request->all(), [
            'current_password' => ['required', 'string'],
            'new_password' => ['required', 'string', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if(!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->withErrors("Password saat ini tidak sesuai");
        }
        User::where('id',auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        return back()->with("success", "Berhasil merubah password!");
    }

    public function editHome()
    {
        $data = Home::where('id', 1)->first();
        return view('admin.home.edit')->with('data', $data);
    }

    public function updateHome(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'headline' => ['required', 'string'],
            'body' => ['required', 'string'],
            'hero' => ['image']
        ], [
            'required' => 'Kolom :attribute harus diisi.'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $home = Home::where('id', 1)->first();
        if (!$home) {
            return redirect()->back()->withErrors("Home is not found")->withInput();
        }

        $data = [
            'headline' => $request->headline,
            'body' => $request->body
        ];

        if ($request->hasFile('hero')) {
            $heroImage = $request->file('hero');
            $heroImage_extension = $heroImage->extension();
            $heroImage_name = date('ymdhis').".".$heroImage_extension;
            $heroImage->move(public_path('assets/images'), $heroImage_name);

            File::delete(public_path('assets/images').'/'.$home->hero);
            $data['hero'] = $heroImage_name;
        } else {
            unset($data['hero']);
        }

        Home::where('id', 1)->update($data);
        return redirect()->back()->with('success', 'Berhasil update data!');
    }

    public function editAbout()
    {
        $data = About::where('id', 1)->first();
        $mision = Mision::orderBy('id', 'asc')->get();
        return view('admin.about.edit', compact('data', 'mision'));
    }

    public function updateAbout(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'background' => ['required', 'string'],
            'vision' => ['required', 'string'],
        ], [
            'required' => 'Kolom :attribute harus diisi.'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $about = About::where('id', 1)->first();
        if (!$about) {
            return redirect()->back()->withErrors("About is not found")->withInput();
        }

        $data = [
            'background' => $request->background,
            'vision' => $request->vision,
        ];

        About::where('id', 1)->update($data);
        return redirect()->back()->with('success', 'Berhasil update data!');
    }

    public function createAboutMision()
    {
        return view('admin.about.create-mision');
    }

    public function storeAboutMision(Request $request) 
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
        ], [
            'required' => 'Kolom :attribute harus diisi.'
        ]);

        $mision = Mision::create([
            'about_id' => 1,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.about.edit')->with('success', 'Berhasil create data!');


    }

    public function editAboutMision(string $id)
    {
        $data = Mision::where('id', $id)->first();
        return view('admin.about.edit-mision')->with('data', $data);
    }

    public function updateAboutMision(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
        ], [
            'required' => 'Kolom :attribute harus diisi.'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $mision = Mision::where('id', $id)->first();
        if (!$mision) {
            return redirect()->back()->withErrors("Mision is not found")->withInput();
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        Mision::where('id', $id)->update($data);
        return redirect()->back()->with('success', 'Berhasil update data!');
    }

    public function destroyAboutMision(string $id)
    {
        $mision = Mision::where('id', $id)->first();

        if (!$mision) {
            return redirect()->back()->withErrors("Mision is not found")->withInput();
        }

        Mision::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil delete data!');
    }

    public function editContact()
    {
        $data = Contact::where('id', 1)->first();
        return view('admin.contact.edit')->with('data', $data);
    }

    public function updateContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address' => ['required', 'string'],
            'phone' => ['required', 'string'],
            'email' => ['required', 'string'],
            'latitude' => ['required', 'string'],
            'longitude' => ['required', 'string'],
        ], [
            'required' => 'Kolom :attribute harus diisi.'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $contact = Contact::where('id', 1)->first();
        if (!$contact) {
            return redirect()->back()->withErrors("Contact is not found")->withInput();
        }

        $data = [
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ];

        Contact::where('id', 1)->update($data);
        return redirect()->back()->with('success', 'Berhasil update data!');
    }

    public function listActivity(Request $request)
    {   
        $keyword = $request->keyword;

        if (strlen($keyword)) {
            $data = Activity::where('title', 'like', "%$keyword%")->orwhere('description', 'like', "%$keyword%")->paginate(10);
        } else {
            $data = Activity::orderBy('created_at', 'asc')->paginate(10); 
        }
        return view('admin.activity.index')->with('data', $data);
    }

    public function storeActivity(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => ['required', 'image'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string']
        ], [
            'required' => 'Kolom :attribute harus diisi.'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $image_name = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_extension = $image->extension();
            $image_name = date('ymdhis').".".$image_extension;
            $image->move(public_path('imageActivity'), $image_name);

        } else {
            $image_name = null;
        }

        Activity::create([
            'image' => $image_name,
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect()->route('admin.activity')->with('success', 'Berhasil create data!');
    }

    public function createActivity()
    {
        return view('admin.activity.create');
    }

    public function editActivity(string $id)
    {
        $data = Activity::where('id', $id)->first();
        return view('admin.activity.edit')->with('data', $data);
    }

    public function updateActivity(Request $request, string $id) {
        $validator = Validator::make($request->all(), [
            'image' => ['image'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
        ], [
            'required' => 'Kolom :attribute harus diisi.'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $activity = Activity::where('id', $id)->first();
        if (!$activity) {
            return redirect()->back()->withErrors("Activity is not found")->withInput();
        }

        $data = [
            'title' => $request->title,
            'description' => $request->description
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_extension = $image->extension();
            $image_name = date('ymdhis').".".$image_extension;
            $image->move(public_path('imageActivity'), $image_name);

            File::delete(public_path('imageActivity').'/'.$activity->image);
            $data['image'] = $image_name;
        } else {
            unset($data['image']);
        }

        Activity::where('id', $id)->update($data);
        return redirect()->back()->with('success', 'Berhasil update data!');
    }

    public function destroyActivity(string $id)
    {
        $activity = Activity::where('id', $id)->first();

        if (!$activity) {
            return redirect()->back()->withErrors("Activity is not found")->withInput();
        }

        if ($activity->image) {
            File::delete(public_path('imageActivity').'/'.$activity->image);
        }
        
        Activity::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil delete data!');
    }

    // ANGGOTA (USER)
    public function listAnggota(Request $request) 
    {
        $keyword = $request->keyword;

        if (strlen($keyword)) {
            $data = User::where('role', 'anggota')
                ->where(function ($query) use ($keyword) {
                    $query->where('name', 'like', "%$keyword%")
                    ->orWhere('username', 'like', "%$keyword%")
                    ->orWhere('position', 'like', "%$keyword%")
                    ->orWhere('phone', 'like', "%$keyword%")
                    ->orWhere('email', 'like', "%$keyword%");
                })->paginate(10);
        } else {
            $data = User::where('role', 'anggota')->orderBy('created_at', 'asc')->paginate(10); 
        }
        return view('admin.anggota.index')->with('data', $data);
    }

    public function createAnggota()
    {
        return view('admin.anggota.create');
    }

    public function storeAnggota(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:15'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'email_verified_at' => date('Y-m-d H:i:s'),
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);

        return redirect()->route('admin.anggota')->with('success', 'Berhasil create data!');
    }

    public function editAnggota(string $id)
    {
        $data = User::where('id', $id)->first();
        return view('admin.anggota.edit')->with('data', $data);
    }

    public function updateAnggota(Request $request, string $id) 
    {
        $validator = Validator::make($request->all(), [
            'name' => ['string', 'max:255'],
            'phone' => ['string', 'max:15'],
        ], [
            'required' => 'Kolom :attribute harus diisi.'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $anggota = User::where('id', $id)->first();
        if (!$anggota) {
            return redirect()->back()->withErrors("Anggota is not found")->withInput();
        }

        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
        ];

        User::where('id', $id)->update($data);
        return redirect()->back()->with('success', 'Berhasil update data!');
    }

    public function destroyAnggota(string $id)
    {
        $user = User::where('id', $id)->first();

        if (!$user) {
            return redirect()->back()->withErrors("User is not found")->withInput();
        }

        User::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil delete data!');
    }

    public function exportAnggota()
    {
        $anggota = User::where('role', 'anggota')->get();
        $csvFileName = 'anggota.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        ];

        $handle = fopen('php://output', 'w');
        fputcsv($handle, ['Nama', 'Username', 'Email', 'Jabatan', 'Telepon']); // Add more headers as needed

        foreach ($anggota as $a) {
            fputcsv($handle, [$a->name, $a->username, $a->email, $a->position, $a->phone]); // Add more fields as needed
        }

        fclose($handle);

        return Response::make('', 200, $headers);
    }

    // ADMIN (USER)
    public function listAdmin(Request $request) 
    {
        $keyword = $request->keyword;

        if (strlen($keyword)) {
            $data = User::where('role', 'admin')
                ->where(function ($query) use ($keyword) {
                    $query->where('name', 'like', "%$keyword%")
                    ->orWhere('username', 'like', "%$keyword%")
                    ->orWhere('position', 'like', "%$keyword%")
                    ->orWhere('phone', 'like', "%$keyword%")
                    ->orWhere('email', 'like', "%$keyword%");
                })->paginate(10);
        } else {
            $data = User::where('role', 'admin')->orderBy('created_at', 'asc')->paginate(10); 
        }
        return view('admin.admin.index')->with('data', $data);
    }

    public function createAdmin()
    {
        return view('admin.admin.create');
    }

    public function storeAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:15'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'email_verified_at' => date('Y-m-d H:i:s'),
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'admin'
        ]);

        return redirect()->route('admin.list')->with('success', 'Berhasil create data!');
    }

    public function editAdmin(string $id)
    {
        $data = User::where('id', $id)->first();
        return view('admin.admin.edit')->with('data', $data);
    }

    public function updateAdmin(Request $request, string $id) 
    {
        $validator = Validator::make($request->all(), [
            'name' => ['string', 'max:255'],
            'phone' => ['string', 'max:15'],
        ], [
            'required' => 'Kolom :attribute harus diisi.'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $anggota = User::where('id', $id)->first();
        if (!$anggota) {
            return redirect()->back()->withErrors("Anggota is not found")->withInput();
        }

        $data = [
            'name' => $request->name,
            'phone' => $request->phone,
        ];

        User::where('id', $id)->update($data);
        return redirect()->back()->with('success', 'Berhasil update data!');
    }

    public function destroyAdmin(string $id)
    {
        $user = User::where('id', $id)->first();

        if (!$user) {
            return redirect()->back()->withErrors("User is not found")->withInput();
        }

        User::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil delete data!');
    }

    public function exportAdmin()
    {
        $admin = User::where('role', 'admin')->get();
        $csvFileName = 'admin.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        ];

        $handle = fopen('php://output', 'w');
        fputcsv($handle, ['Nama', 'Username', 'Email', 'Jabatan', 'Telepon']); // Add more headers as needed

        foreach ($admin as $a) {
            fputcsv($handle, [$a->name, $a->username, $a->email, $a->position, $a->phone]); // Add more fields as needed
        }

        fclose($handle);

        return Response::make('', 200, $headers);
    }

    // NEWS
    public function listNews(Request $request)
    {   
        $keyword = $request->keyword;

        if (strlen($keyword)) {
            $data = News::where('title', 'like', "%$keyword%")->paginate(10);
        } else {
            $data = News::orderBy('created_at', 'asc')->paginate(10); 
        }
        return view('admin.news.index')->with('data', $data);
    }

    public function createNews()
    {
        return view('admin.news.create');
    }

    public function storeNews(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => ['required', 'image'],
            'title' => ['required', 'string'],
            'date' => ['required', 'string'],
            'content' => ['required', 'string'],
        ], [
            'required' => 'Kolom :attribute harus diisi.'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $image_name = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_extension = $image->extension();
            $image_name = date('ymdhis').".".$image_extension;
            $image->move(public_path('imageNews'), $image_name);

        } else {
            $image_name = null;
        }

        News::create([
            'image' => $image_name,
            'title' => $request->title,
            'date' => $request->date,
            'content' => $request->content,
            'createdUser' => auth()->user()->username
        ]);

        return redirect()->route('admin.news')->with('success', 'Berhasil create data!');
    }

    public function editNews(string $id)
    {
        $data = News::where('id', $id)->first();
        return view('admin.news.edit')->with('data', $data);
    }

    public function updateNews(Request $request, string $id) {
        $validator = Validator::make($request->all(), [
            'image' => ['image'],
            'title' => ['required', 'string'],
            'date' => ['required', 'string'],
            'content' => ['required', 'string'],
        ], [
            'required' => 'Kolom :attribute harus diisi.'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $news = News::where('id', $id)->first();
        if (!$news) {
            return redirect()->back()->withErrors("News is not found")->withInput();
        }

        $data = [
            'title' => $request->title,
            'date' => $request->date,
            'content' => $request->content,
        ];

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_extension = $image->extension();
            $image_name = date('ymdhis').".".$image_extension;
            $image->move(public_path('imageNews'), $image_name);

            File::delete(public_path('imageNews').'/'.$news->image);
            $data['image'] = $image_name;
        } else {
            unset($data['image']);
        }

        News::where('id', $id)->update($data);
        return redirect()->back()->with('success', 'Berhasil update data!');
    }

    public function destroyNews(string $id)
    {
        $news = News::where('id', $id)->first();

        if (!$news) {
            return redirect()->back()->withErrors("News is not found")->withInput();
        }

        if ($news->image) {
            File::delete(public_path('imageNews').'/'.$news->image);
        }
        
        News::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil delete data!');
    }

    public function exportNews()
    {
        $news = News::all();
        $csvFileName = 'news.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        ];

        $handle = fopen('php://output', 'w');
        fputcsv($handle, ['Image Cover', 'Judul', 'Tanggal Kegiatan/Acara', 'Konten', 'Diunggah oleh', 'Tanggal unggah']); // Add more headers as needed

        foreach ($news as $new) {
            fputcsv($handle, [$new->image, $new->title, $new->date, $new->content, $new->createdUser, $new->created_at]); // Add more fields as needed
        }

        fclose($handle);

        return Response::make('', 200, $headers);
    }

    // Donate
    public function listDonate(Request $request)
    {   
        $keyword = $request->keyword;

        if (strlen($keyword)) {
            $data = Donate::where('source', 'like', "%$keyword%")
            ->orwhere('date', 'like', "%$keyword%")
            ->orwhere('amount', 'like', "%$keyword%")
            ->orwhere('createdUser', 'like', "%$keyword%")->paginate(10);
        } else {
            $data = Donate::orderBy('created_at', 'asc')->paginate(10); 
        }
        return view('admin.donate.index')->with('data', $data);
    }

    public function createDonate()
    {
        return view('admin.donate.create');
    }

    public function storeDonate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'source' => ['required', 'string'],
            'date' => ['required', 'string'],
            'amount' => ['required', 'string']
        ], [
            'required' => 'Kolom :attribute harus diisi.'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $amount = str_replace('.', '', trim($request->amount));
        Donate::create([
            'source' => $request->source,
            'date' => $request->date,
            'amount' => $amount,
            'createdUser' => auth()->user()->username
        ]);

        return redirect()->route('admin.donate')->with('success', 'Berhasil create data!');
    }

    public function editDonate(string $id)
    {
        $data = Donate::where('id', $id)->first();
        return view('admin.donate.edit')->with('data', $data);
    }

    public function updateDonate(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'source' => ['required', 'string'],
            'date' => ['required', 'string'],
            'amount' => ['required', 'string']
        ], [
            'required' => 'Kolom :attribute harus diisi.'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $donate = Donate::where('id', $id)->first();
        if (!$donate) {
            return redirect()->back()->withErrors("Donate is not found")->withInput();
        }

        $amount = str_replace('.', '', trim($request->amount));
        $data = [
            'source' => $request->source,
            'date' => $request->date,
            'amount' => $amount,
        ];

        Donate::where('id', $id)->update($data);
        return redirect()->back()->with('success', 'Berhasil update data!');;
    }

    public function destroyDonate(string $id)
    {
        $donate = Donate::where('id', $id)->first();

        if (!$donate) {
            return redirect()->back()->withErrors("Donate is not found")->withInput();
        }

        Donate::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil delete data!');
    }

    public function exportDonate()
    {
        $donates = Donate::all();
        $csvFileName = 'donates.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        ];

        $handle = fopen('php://output', 'w');
        fputcsv($handle, ['Sumber', 'Tanggal', 'Jumlah', 'Diunggah oleh', 'Tanggal unggah']); // Add more headers as needed

        foreach ($donates as $d) {
            fputcsv($handle, [$d->source, $d->date, $d->amount, $d->createdUser, $d->created_at]); // Add more fields as needed
        }

        fclose($handle);

        return Response::make('', 200, $headers);
    }

    // Cash
    public function listCash(Request $request)
    {   
        $keyword = $request->keyword;

        if (strlen($keyword)) {
            $data = Cash::where('source', 'like', "%$keyword%")
            ->orwhere('date', 'like', "%$keyword%")
            ->orwhere('amount', 'like', "%$keyword%")
            ->orwhere('createdUser', 'like', "%$keyword%")->paginate(10);
        } else {
            $data = Cash::orderBy('created_at', 'asc')->paginate(10); 
        }
        return view('admin.cash.index')->with('data', $data);
    }

    public function createCash()
    {
        return view('admin.cash.create');
    }

    public function storeCash(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'source' => ['required', 'string'],
            'date' => ['required', 'string'],
            'amount' => ['required', 'string']
        ], [
            'required' => 'Kolom :attribute harus diisi.'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $amount = str_replace('.', '', trim($request->amount));
        Cash::create([
            'source' => $request->source,
            'date' => $request->date,
            'amount' => $amount,
            'createdUser' => auth()->user()->username
        ]);

        return redirect()->route('admin.cash')->with('success', 'Berhasil create data!');
    }

    public function editCash(string $id)
    {
        $data = Cash::where('id', $id)->first();
        return view('admin.cash.edit')->with('data', $data);
    }

    public function updateCash(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'source' => ['required', 'string'],
            'date' => ['required', 'string'],
            'amount' => ['required', 'string']
        ], [
            'required' => 'Kolom :attribute harus diisi.'
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $cash = Cash::where('id', $id)->first();
        if (!$cash) {
            return redirect()->back()->withErrors("Cash is not found")->withInput();
        }

        $amount = str_replace('.', '', trim($request->amount));
        $data = [
            'source' => $request->source,
            'date' => $request->date,
            'amount' => $amount,
        ];

        Cash::where('id', $id)->update($data);
        return redirect()->back()->with('success', 'Berhasil update data!');;
    }

    public function destroyCash(string $id)
    {
        $cash = Cash::where('id', $id)->first();

        if (!$cash) {
            return redirect()->back()->withErrors("Cash is not found")->withInput();
        }

        Cash::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Berhasil delete data!');
    }

    public function exportCash()
    {
        $cash = Cash::all();
        $csvFileName = 'cash.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        ];

        $handle = fopen('php://output', 'w');
        fputcsv($handle, ['Sumber', 'Tanggal', 'Jumlah', 'Diunggah oleh', 'Tanggal unggah']); // Add more headers as needed

        foreach ($cash as $c) {
            fputcsv($handle, [$c->source, $c->date, $c->amount, $c->createdUser, $c->created_at]); // Add more fields as needed
        }

        fclose($handle);

        return Response::make('', 200, $headers);
    }



}
