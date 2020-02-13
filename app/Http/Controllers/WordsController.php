<?php

namespace App\Http\Controllers;

use App\Words;
use Illuminate\Http\Request;
use Auth;

class WordsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected function check()
    {
        if(!Auth::user()){ 
            die("YOU DON'T HAVE PERMISSION TO VIEW THIS PAGE"); 
        }
    }
    public function index()
    {
        $this->check();
     
        $words = Words::where('result',0)->select('word')->inRandomOrder()->first();
        return view('words/index', ['words' =>  $words['word']]);
    }

    public function store(Request $request)
    {
        Words::where('word',$request['word'])->update(['result' => 1]);
        return redirect( '/');
    }

    public function many()
    {
        $this->check();

        $words = Words::all()->where('result',0)->random(10);

        return view('words/many', ['words' =>  $words]);
    }

    public function storeMany(Request $request)
    {
        // Words::where('word',$request['word'])->update(['result' => 1]);
        foreach($request->word as $id ){
            Words::where('id',$id)->update(['result' => 1]);
        }
      
        return redirect( '/many');
    }

    public function addWord()
    {
        $this->check();
        return view('words/add');
    }
    public function storeWord(Request $request)
    {
        $word =  $request->word;
        Words::create(['word' => $word]);
        return redirect( '/');
    }

    public function deleteWordView()
    {
        $this->check();
        $words = Words::where('result',0)->get();
        return view('words/delete', ['words' =>  $words]);
    }
    public function deleteWord(Request $request)
    {
        foreach($request->word as $id ){
            Words::where('id',$id)->update(['result' => 1]);
        }
        return redirect( 'delete/');
    }
}
