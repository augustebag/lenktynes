<?php

namespace App\Http\Controllers;

use App\Models\Better;
use App\Models\Horse;
use Illuminate\Http\Request;
use Validator;
use PDF;

class BetterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {       
        // $betters = Better::all();
        
        $dir = 'asc';
        $sort = 'name';
        $horses = Horse::all();
        $defaultHorse = 0;
        
        if ($request->sort_by && $request->dir) {
            if ('name' == $request->sort_by && 'asc' == $request->dir) {
                $betters = Better::orderBy('name')->paginate(15)->withQueryString();
            } elseif ('name' == $request->sort_by && 'desc' == $request->dir) {
                $betters = Better::orderBy('name')->paginate(15)->withQueryString();
                $dir = 'desc';
            } elseif ('surname' == $request->sort_by && 'asc' == $request->dir) {
                $betters = Better::orderBy('surname')->paginate(15)->withQueryString();
                $dir = 'surname';
            } elseif ('surname' == $request->sort_by && 'desc' == $request->dir) {
                $betters = Better::orderBy('surname')->paginate(15)->withQueryString();
                $dir = 'desc';
                $dir = 'surname';
            } 
            else { $betters = Better::paginate(15)->withQueryString();
            } 
            
        }  elseif ($request->horse_id) {
            $betters = Better::where('horse_id', (int)$request->horse_id)->paginate(15)->withQueryString();
            $defaultHorse = (int)$request->horse_id;
        } else {
            $betters = Better::paginate(15)->withQueryString();
        }

        
        return view('better.index', 
        ['betters' => $betters,
        'dir' => $dir,
        'sort' => $sort,
        'horses' => $horses,
        'defaultHorse' => $defaultHorse,
    ]);
    
    // return view('better.index', ['betters' => $betters]);
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $horses = Horse::orderBy('name')->paginate(15)->withQueryString();
       return view('better.create', ['horses' => $horses]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
       [
           'better_name' => ['required', 'min:3', 'max:64', 'alpha'],
           'better_surname' => ['required', 'min:3', 'max:64', 'alpha'],
           'better_bet' => ['required', 'min:1', 'numeric'],
       ],

       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }

        $better = new Better;
        $better->name = $request->better_name;
        $better->surname = $request->better_surname;
        $better->bet = $request->better_bet;
        $better->horse_id = $request->horse_id;
        $better->save();
        return redirect()->route('better.index')->with('success_message', 'Sekmingai įrašytas.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Better  $better
     * @return \Illuminate\Http\Response
     */
    public function show(Better $better)
    {
        return view('better.show', ['better' => $better]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Better  $better
     * @return \Illuminate\Http\Response
     */
    public function edit(Better $better)
    {
        $horses = Horse::all();
        return view('better.edit', ['better' => $better, 'horses' => $horses]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Better  $better
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Better $better)
    {
        $validator = Validator::make($request->all(),
       [
           'better_name' => ['required', 'min:3', 'max:64', 'alpha'],
           'better_surname' => ['required', 'min:3', 'max:64', 'alpha'],
           'better_bet' => ['required', 'min:1', 'numeric'],
       ],

       );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }
       
        $better->name = $request->better_name;
        $better->surname = $request->better_surname;
        $better->bet = $request->better_bet;
        $better->horse_id = $request->horse_id;
        $better->save();
        return redirect()->route('better.index')->with('success_message', 'Sėkmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Better  $better
     * @return \Illuminate\Http\Response
     */
    public function destroy(Better $better)
    {
        $better->delete();
         return redirect()->route('better.index');

    }

    public function pdf(Better $better)
    {
        $pdf = PDF::loadView('better.pdf', ['better' => $better]);
        return $pdf->download($better ->name.'.pdf');
    }

}