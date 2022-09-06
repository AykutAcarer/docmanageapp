<?php

namespace App\Http\Controllers;

use App\Models\Kapitel;
use App\Models\Unterlage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class KapitelController extends Controller
{
    // Show all Kapitels of a single Unterlage: 
    // Route'dan unterlage_id parametre olarak geldigi icin kapitels methodunun 
    // kapitels(Unterlage $unterlage) seklinde object olmasi gerekiyor  
    // Bu objecte ait olan kapitelleri ise methodun icerisinde [kapitel=> $unterlage->kapitels()->get()] 
    // seklinde array icine topluyoruz.
    public function kapitels(Unterlage $unterlage)
    {

        // return view('kapitels.kapitels', [
        //     'kapitels' => $unterlage->kapitels()->get()
        // ]);

        $id = $unterlage['id'];

        $query1 = DB::table('kapitels')
            ->where('unterlagen_kapitel_vater', '=', NULL)
            ->where('unterlagen_id_fk', '=', $id)
            ->orderBy('unterlagen_kapitel_order')
            ->get();

        $query2 = DB::table('kapitels')
            ->where('unterlagen_kapitel_vater', '>', 1000)
            ->where('unterlagen_id_fk', '=', $id)
            ->orderBy('unterlagen_kapitel_order')
            ->get();


        // dd(
        //     'kapitels.kapitels',
        //     [

        //         'kapitels' => $query1
        //     ],
        //     [
        //         'kapitels2' => $query2,
        //         'unterlagen' => $unterlage
        //     ]
        // );
        return view(
            'kapitels.kapitels',
            [

                'kapitels' => $query1,
                'main' => auth()->user()->mainfolders()->get(),
            ],
            [
                'kapitels2' => $query2,
                'unterlagen' => $unterlage
            ]
        );
    }

    //Show single Kapitel:
    public function show(Kapitel $kapitel)
    {

        $selectedValue = $kapitel->unterlagen_kapitel_vater;
        $selectedKapitel = DB::table('kapitels')
            ->where('kapitels.k_id', '=', $selectedValue)
            ->get();

        // dd(
        //     'kapitels.show',
        //     [
        //         'unterlagen' => $kapitel->unterlagen()->get()
        //     ],
        //     [
        //         'kapitels' => $kapitel
        //          'selectedKapitel' => $selectedKapitel
        //     ]
        // );

        return view(
            'kapitels.show',
            [
                'unterlagen' => $kapitel->unterlagen()->get(),
                'main' => auth()->user()->mainfolders()->get()
            ],
            [
                'kapitels' => $kapitel,
                'selectedKapitel' => $selectedKapitel
            ]
        );
    }

    //Store new Kapitel
    public function store(Request $request)
    {
        // dd($request->all());

        if ($request->unterlagen_kapitel_vater == null) {

            $formFields = $request->validate([
                'unterlagen_id_fk' => 'required',
                'unterlagen_kapitel_name' => 'required',
                'unterlagen_kapitel_order' => 'required',
                'unterlagen_kapitel_inhalt' => 'required'

            ]);
        } else {
            $formFields = $request->validate([
                'unterlagen_id_fk' => 'required',
                'unterlagen_kapitel_name' => 'required',
                'unterlagen_kapitel_order' => 'required',
                'unterlagen_kapitel_vater' => 'required',
                'unterlagen_kapitel_inhalt' => 'required'

            ]);
        }


        Kapitel::create($formFields);
        return redirect('/unterlagen/' . $request->unterlagen_id_fk . '');
    }

    // Show Page for creating new Kapitel
    public function create(Unterlage $unterlage)
    {
        // dd(
        //     'kapitels.create',
        //     [
        //         'unterlagen' => $unterlage,
        //         'kapitels' => $unterlage->kapitels()->get()
        //     ]

        // );

        return view(
            'kapitels.create',
            [
                'unterlagen' => $unterlage,
                'kapitels' => $unterlage->kapitels()->get(),
                'main' => auth()->user()->mainfolders()->get()
            ]
        );
    }

    //Update kapitel
    public function update(Request $request, Kapitel $kapitel)
    {
        // dd($request->all());
        if ($request->unterlagen_kapitel_vater == null) {
            $formFields = $request->validate([
                'unterlagen_id_fk' => 'required',
                'unterlagen_kapitel_name' => 'required',
                'unterlagen_kapitel_order' => 'required',
                'unterlagen_kapitel_inhalt' => 'required',

            ]);
        } else {
            $formFields = $request->validate([
                'unterlagen_id_fk' => 'required',
                'unterlagen_kapitel_name' => 'required',
                'unterlagen_kapitel_order' => 'required',
                'unterlagen_kapitel_vater' => 'required',
                'unterlagen_kapitel_inhalt' => 'required',

            ]);
        }

        $kapitel->update($formFields);

        return redirect('/unterlagen/kapitels/edit/' . $request->unterlagen_kapitel_id . '');
    }

    //Delete Kapitel
    public function destroy(Kapitel $kapitel)
    {
        $kapitel->delete();
        return redirect('/unterlagen/' . $kapitel->unterlagen_id_fk . '');
    }
}
