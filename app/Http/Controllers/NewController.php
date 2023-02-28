<?php

namespace App\Http\Controllers;

use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Laravel\Socialite\Facades\Socialite;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {

        $association = Association::all();
        $departementaleURL = "https://entreprise.data.gouv.fr/api/rna/v1/full_text/UNION%20NATIONALE%20DES%20COMBATTANTS%20DU%20DEPARTEMENT?per_page=50";

        $departementale = Http::withHeaders([
            'accept' => 'application/json'
        ])
            ->get($departementaleURL)
            ->json();



        return view('create', compact('association', 'departementale'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $rna = str_replace('-', '', $request->rna);

        /*$this->getBearerToken();
        $name = Http::withHeaders([
            'accept' => 'application/json'
        ])
            ->withToken("$this->bearerToken")
            ->get("https://entreprise.data.gouv.fr/api/rna/v1/id/" . $siret)
            ->json(['association', 'titre_court']);*/

        $name = Http::withHeaders([
            'accept' => 'application/json'
        ])
            ->get("https://entreprise.data.gouv.fr/api/rna/v1/id/" . $rna)
            ->json();

        $titre = $name['association']['titre'];
        $titrecourt = $name['association']['titre_court'];
        $adresse_code_postal = $name['association']['adresse_code_postal'];
        $adresse_libelle_commune = $name['association']['adresse_libelle_commune'];
        $adresse_gestion_libelle_voie = $name['association']['adresse_gestion_libelle_voie'];

        if (empty($titre)) {
            $titre = $request->titre;
        }

        $slug = str_replace(' ', '-', $titrecourt);
        $nia = substr($request->zipcode, 0, 2) . substr($rna, 0, 3) . '-' . rand(100000000, 999999999);

        if (strpos($titre, 'DEPARTEMENT') !== false)
        {
            $type = 'Départementale';
        } else {
            $type = 'Locale';
        }


        try {
            if (Association::where('Siret', $request->rna)->exists()) {
                throw new \Exception('Cette association existe déjà');
            }
            Association::create([
                'Name' => $titre,
                'Slug' => $slug,
                'NIA' => $nia,
                'SIRET' => $rna,
                'Address' => $adresse_gestion_libelle_voie,
                'Address2' => $request->address2,
                'PostalCode' => $adresse_code_postal,
                'City' => $adresse_libelle_commune,
                'Phone' => $request->phone,
                'Type' => $type,
                'Logo' => $request->logo,
                'Website' => $request->website,
                'Email' => $request->mail,
                'Agree' => $request->agree,
            ]);

            return redirect()->route('index')->with('success', 'L\'association ' . $titrecourt . ' a été ajoutée');

        } catch (\Exception $e) {
//            return redirect()->back()->with('error', 'L\'association ' . $name . ' existe déjà');
            return redirect()->back()->with('error', $e->getMessage());
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
