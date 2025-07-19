<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactFormController extends Controller
{
    public function contact()
    {
        $categories = DB::table('categories')->get();
        return view('contact', compact('categories'));
        }

     public function admin()
    {
        $admins = Contact::paginate(7);
        return view('admin', compact('admins'));
    }

    public function confirm(ContactRequest $request)
    {
        if ($request->has('edit')) {
            return redirect('/')->withInput();
        }

        $contact = $request->all();
        return view('confirm', compact('contact'));
    }

    public function store(Request $request)
    {
        $contact =$request->all();
        Contact::create($contact);
        return view('thanks');
    }

   /*  public function edit(ContactRequest $request)
    {
        if($request->input('edit'))
            return redirect('/')->withInput();
    } */

    public function login()
    {
        return view('auth.login');
    }

 /*    public function login_register(Request $request)
    {
        return view('auth.register');
    } */

    public function register()
    {
       return view('auth.register');
    }

    public function register_login(Request $request)
    {
        return view('auth.login');
    }

    /*  public function page()
    {
        $admins = Contact::simplePaginate(7);
        return view('admin', compact('admins'));
    } */

    public function thanks()
    {
        return view('thanks');
    }

    public function index(Request $request)
    {
        $admins = Contact::paginate(10);

        $detailAdmin = null;
        if ($request->has('detail')) {
            $detailAdmin = Contact::find($request->input('detail'));
        }

        return view('admin', compact('admins', 'detailAdmin'));
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();
        return redirect()->route('admin.index')->with('message','削除しました');
    }

}
