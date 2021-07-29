<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use Illuminate\Http\Request;
use Validator;

class HorseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dir = 'asc';
        $sort = 'name';
        $defaultHorse = 0;
        $horses = Horse::all();
        
        if ($request->sort_by && $request->dir) {
            if ('name' == $request->sort_by && 'asc' == $request->dir) {
                $horses = Horse::orderBy('name')->paginate(15)->withQueryString();
            } elseif ('name' == $request->sort_by && 'desc' == $request->dir) {
                $horses = Horse::orderBy('name', 'desc')->paginate(15)->withQueryString();
                $dir = 'desc';
            } elseif ('runs' == $request->sort_by && 'asc' == $request->dir) {
                $horses = Horse::orderBy('runs')->paginate(15)->withQueryString();
                $sort = 'runs';
            } elseif ('runs' == $request->sort_by && 'desc' == $request->dir) {
                $horses = Horse::orderBy('runs', 'desc')->paginate(15)->withQueryString();
                $dir = 'desc';
                $sort = 'runs';
            } 
            else { $horses = Horse::paginate(15)->withQueryString();
            } 
            //FILTRAVIMAS
        }  elseif ($request->horse_id) {
            $horses = Horse::where('horse_id', (int)$request->horse_id)->paginate(15)->withQueryString();
            $defaultHorse = (int)$request->horse_id;
        } else {
            $horses = Horse::paginate(15)->withQueryString();
        }

        
        return view('horse.index', [
        'horses' => $horses,
        'dir' => $dir,
        'sort' => $sort,
        'horses' => $horses,
        'defaultHorse' => $defaultHorse,
    ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('horse.create');
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
           'horse_name' => ['required', 'min:2', 'max:64', 'alpha'],
           'horse_runs' => ['required', 'numeric', 'gt:0'],
           'horse_wins' => ['required', 'numeric', 'gt:0'],
           'horse_about' => ['required'],
       ]
);
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }

       $horse = new Horse;

       if ($request->has('horse_photo')) {
        $photo = $request->file('horse_photo');
        $imageName = 
        $request->horse_name. '-' .
        $request->horse_runs. '-' .
        time(). '.' .
        $photo->getClientOriginalExtension();
        $path = public_path() . '/horses-img/'; // serverio vidinis kelias
        $url = asset('horses-img/'.$imageName); // url narsyklei (isorinis)
        $photo->move($path, $imageName); // is serverio tmp ===> i public folderi
        $horse->photo = $url;
    }


        $horse = new Horse;
        $horse->name = $request->horse_name;
        $horse->runs = $request->horse_runs;
        $horse->wins = $request->horse_wins;
        $horse->about = $request->horse_about;
        $horse->save();
        return redirect()->route('horse.index')->with('success_message', 'Sekmingai įrašytas.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function show(Horse $horse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function edit(Horse $horse)
    {
        return view('horse.edit', ['horse' => $horse]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horse $horse)
    {
        if ($request->has('delete_horse_photo')) {
            if ($horse->photo) {
                $imageName = explode('/', $horse->photo);
                $imageName = array_pop($imageName);
                $path = public_path() . '/horses-img' . $imageName;
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            $horse->photo = null;
        }

       if ($request->has('horse_photo')) {

        if ($horse->photo) {
            $imageName = explode('/', $horse->photo);
            $imageName = array_pop($imageName);
            $path = public_path() . '/horses-img/' . $imageName;
            if (file_exists($path)) {
                unlink($path);
            }
        }
    }

        $photo = $request->file('horse_photo');
        $imageName = 
        $request->horse_name. '-' .
        $request->horse_runs. '-' .
        time(). '.' .
        $photo->getClientOriginalExtension();
        $path = public_path() . '/horses-img/'; // serverio vidinis kelias
        $url = asset('horses-img/'.$imageName); // url narsyklei (isorinis)
        $photo->move($path, $imageName); // is serverio tmp ===> i public folderi
        $horse->photo = $url;
    

        $validator = Validator::make($request->all(),
       [
           'horse_name' => ['required', 'min:2', 'max:64', 'alpha'],
           'horse_runs' => ['required', 'numeric', 'gt:0'],
           'horse_wins' => ['required', 'numeric', 'gt:0'],
           'horse_about' => ['required'],
       ]
   );
       if ($validator->fails()) {
           $request->flash();
           return redirect()->back()->withErrors($validator);
       }
        $horse->name = $request->horse_name;
        $horse->runs = $request->horse_runs;
        $horse->wins = $request->horse_wins;
        $horse->about = $request->horse_about;
        $horse->save();
        return redirect()->route('horse.index')->with('success_message', 'Sėkmingai pakeistas.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horse $horse)
    {
        if ($horse->photo) {
            $imageName = explode('/', $horse->photo);
            $imageName = array_pop($imageName);
            $path = public_path() . '/horses-img/' . $imageName;
            if (file_exists($path)) {
                unlink($path);
            }
        }

        if ($horse->HorseBetters->count()) {
             return redirect()->back()->with('success_message', 'Trinti negalima, nes turi nebaigtu darbu');
         }
        
         $horse->delete();
         return redirect()->route('horse.index')->with('success_message', 'Sekmingai ištrintas.');

    }
}
