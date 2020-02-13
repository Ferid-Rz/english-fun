<?php

namespace App\Http\Controllers;

use App\Word;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class WordsController extends Controller
{
    const FILE = 'vehicles_list.xlsx';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
     
        $words = Word::select('word')->inRandomOrder()->first();
        return view('words/index', ['words' =>  $words['word']]);
    }
    
    
    public function slide()
    {
        $words = Word::select('word')->get();
        $array = [];
        foreach($words as $aa){
            $array[] = $aa['word'];
        }
        return view('words/slide', ['words' =>  $array]);
    }
    
    public function api()
    {
        $words = Word::select('word')->get();
        $array = [];
        foreach($words as $aa){
            $array[] = $aa['word'];
        }
        return $array;
    }

    public function store(Request $request)
    {
        Word::where('word',$request['word'])->delete();
        return redirect( '/');
    }

    public function many()
    {

        $words = Word::all()->random(10);

        return view('words/many', ['words' =>  $words]);
    }

    public function storeMany(Request $request)
    {
        foreach($request->word as $id ){
            Word::where('id',$id)->delete();
        }
      
        return redirect( '/many');
    }

    public function addWord()
    {
        return view('words/add');
    }
    public function storeWord(Request $request)
    {
        $word =  $request->word;
        Word::create(['word' => $word]);
        return redirect( '/');
    }

    public function deleteWordView()
    {
        $words = Word::get();
        return view('words/delete', ['words' =>  $words]);
    }

    public function deleteWord(Request $request)
    {
        foreach($request->word as $id ){
            Word::where('id',$id)->delete();
        }
        return redirect( 'delete/');
    }

    public function saved()
    {
        $words = Word::onlyTrashed()->get();
        $array = [];
        foreach($words as $aa){
            $array[] = $aa['word'];
        }
        return $array;
    }
    
    
    public function hardReset()
    {
        Word::truncate();

        $filePath = base_path(self::FILE);
        $collection = (new FastExcel)->import($filePath);

        foreach ($collection as $key => $value) {
            $word = $value['word'];

            Word::firstOrCreate([
                'word' => $word,
            ]);

        }
    }
}
