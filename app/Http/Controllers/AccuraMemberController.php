<?php

namespace App\Http\Controllers;
use Redirect;
use Illuminate\Http\Request;
use App\Models\Accura_Member;
class AccuraMemberController extends Controller
{
  
public function index()
{
    $Accura_Membersks = Accura_Member::all();
    return view('AccuraMember.index', compact('Accura_Membersks'));
}

public function create()
{
    return view('AccuraMember.create');
}

public function store(Request $request)
{
  
    
    $validatedData = $request->validate([
        'FirstName' => 'required',
        'LastName' => 'required',
        'Date' => 'required',
        'Division' => 'required',
        
    ]);
    
    $post = new Accura_Member;
    $post->FirstName = $request->input('FirstName');
    $post->LastName = $request->input('LastName');
    $post->Date = $request->input('Date');
    $post->Division = $request->input('Division');
    $post->Summery = 'ACCURA'.$request->input('LastName');
    $post->save();

    return Redirect::back()->with('success', 'Accura Member created successfully!');
}

public function show($id)
{
    $Accura_Member = Accura_Member::where('id','=',$id)->get();
    return view('AccuraMember.show', compact('Accura_Member'));
}

public function edit($id)
{
    $post = Post::findOrFail($id);
    return view('AccuraMember.edit', compact('post'));
}

public function update(Request $request)
{
    $id = $request->auto;
  
    $validatedData = $request->validate([
        'FirstName' => 'required',
        'LastName' => 'required',
        'Date' => 'required',
        'Division' => 'required',
        
    ]);

    Accura_Member::where('id', $id)
    ->update([
        'FirstName' => $request->input('FirstName'),
        'LastName' => $request->input('LastName'),
        'Date' =>   $request->input('Date'),
        'Division' => $request->input('Division'),
        'Summery' => 'ACCURA'.$request->input('LastName'),
          ]);
          return Redirect::back()->with('success', 'Accura Member Updated successfully!');

}

public function destroy($id)
{
    
    $post = Accura_Member::findOrFail($id);
     $post->delete();

     return response()->json([
        'message' => 'sucess',
        
     ]);
}
public function search(Request $request){
    $Accura_Membersks = Accura_Member::
    where('LastName', 'like', '%' . $request->get('search') . '%') 
    ->get();
    return view('AccuraMember.index', compact('Accura_Membersks'));
}
}
