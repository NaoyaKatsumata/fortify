<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    public function confirm(ContactRequest $request){
        $category=Category::where('id','=',$request->category_id)->first();
        // dd($category);
        return view('confirm',compact('request','category'));
    }

    public function store(Request $request){
        if($request->input('back')=='修正'){
            return redirect('/')->with([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'gender'=>$request->gender,
                'email'=>$request->email,
                'tel_first'=>$request->tel_first,
                'tel_second'=>$request->tel_second,
                'tel_third'=>$request->tel_third,
                'address'=>$request->address,
                'building'=>$request->building,
                'category_id'=>$request->category_id,
                'detail'=>$request->detail]);
        }
        Contact::create([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'gender'=>$request->gender,
            'email'=>$request->email,
            'tell'=>$request->tel_first.$request->tel_second.$request->tel_third,
            // 'tel_first'=>$request->tel_first,
            // 'tel_second'=>$request->tel_second,
            // 'tel_third'=>$request->tel_third,
            'address'=>$request->address,
            'building'=>$request->building,
            'category_id'=>$request->category_id,
            'detail'=>$request->detail
        ]);
        return view('thanks');
    }

    public function admin(){
        $contacts=Contact::join('categories','contacts.category_id','=','categories.id')->paginate(7);
        $categories=Category::all();

        // dd($contacts);
        return view('admin',compact('contacts','categories'));
    }

    public function search(Request $request){
        $contacts=Contact::join('categories','contacts.category_id','=','categories.id')
        ->orWhere('contacts.first_name','like','%' . $request->searchText . '%')
        ->orWhere('contacts.first_name','like','%' . $request->searchText . '%')
        ->orWhere('contacts.email','like','%' . $request->searchText . '%')->paginate(7);
        $categories=Category::all();
        // dd($contacts);
        return view('admin',compact('contacts','categories'));
    }
}
