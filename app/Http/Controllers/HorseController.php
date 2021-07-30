<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use Illuminate\Http\Request;
use Validator;
use PDF;

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
        $s = '';
        
        if ($request->sort_by) {
            if ('name' == $request->sort_by) {
                $horses = Horse::orderBy('name')->paginate(15)->withQueryString();
            } elseif ('name' == $request->sort_by) {
                $horses = Horse::orderBy('name')->paginate(15)->withQueryString();
            } elseif ('runs' == $request->sort_by) {
                $horses = Horse::orderBy('runs')->paginate(15)->withQueryString();
                $sort = 'runs';
            } elseif ('runs' == $request->sort_by) {
                $horses = Horse::orderBy('runs')->paginate(15)->withQueryString();
                $sort = 'runs';
            } 
                else { 
                    $horses = Horse::paginate(15)->withQueryString();
            } 
            //FILTRAVIMAS
        }  elseif ($request->horse_id) {
            $horses = Horse::where('horse_id', (int)$request->horse_id)->paginate(15)->withQueryString();
            $defaultHorse = (int)$request->horse_id;
        } 
        
        elseif ($request->s) {
            $horses = Horse::where('name', 'like', '%'.$request->s.'%')->paginate(15)->withQueryString();
            $s = $request->s;
        }
        elseif ($request->do_search) {
            $horses = Horse::where('name', 'like', '')->paginate(15)->withQueryString();

        }
        
            else {
            $horses = Horse::paginate(15)->withQueryString();
        }

        
        return view('horse.index', [
        'horses' => $horses,
        'dir' => $dir,
        'sort' => $sort,
        'horses' => $horses,
        'defaultHorse' => $defaultHorse,
        's' => $s,
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
        return view('horse.show', ['horse' => $horse]);

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

        if ($horse->horseHasBetter()->count()) {
             return redirect()->rout('horse.index')->with('success_message', 'Trinti negalima, nes turi nebaigtu darbu');
         }
        //  HorseBetters
         $horse->delete();
         return redirect()->route('horse.index')->with('success_message', 'Sekmingai ištrintas.');

    }

    public function pdf(Horse $horse)
    {
        $pdf = PDF::loadView('horse.pdf', ['horse' => $horse]);
        return $pdf->download($horse ->name.'.pdf');
    }

}
