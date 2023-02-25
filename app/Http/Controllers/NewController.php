<?php

namespace App\Http\Controllers;

use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NewController extends Controller
{
    public string $bearerToken = "";
    public int $tokenExpirationEpoch = 0;

    public function getBearerToken()
    {
        $response = Http::withOptions([
            'verify' => false
        ])->asForm()->withHeaders([
            'Authorization' => 'Basic VEhVRHN5b3ZRS29Wc0N3TE1KWUNKaU9MdFRjYTp6OTVYcUJjTnlnQW1PSjF6aGZNWGw3Rlo3dzhh'
        ])->post('https://api.insee.fr/token', [
            'grant_type' => 'client_credentials'
        ]);

        if ($response->successful()) {
            $data = $response->json();
            $this->bearerToken = $data['access_token'];
        } else {
            // Gérer les erreurs de la requête
            $status = $response->status();
            $errorMessage = $response->body();
        }
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $association = Association::all();

        return view('create', compact('association'));
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
        $siret = str_replace('-', '', $request->siret);

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
            ->get("https://entreprise.data.gouv.fr/api/rna/v1/id/" . $siret)
            ->json();

        $titre = $name['association']['titre'];
        $titrecourt = $name['association']['titre_court'];
        $adresse_code_postal = $name['association']['adresse_code_postal'];
        $adresse_libelle_commune = $name['association']['adresse_libelle_commune'];
        $adresse_gestion_libelle_voie = $name['association']['adresse_gestion_libelle_voie'];




        // if $name is empty get $request->name
        if (empty($name)) {
            $name = $request->name;
        }

        $slug = str_replace(' ', '-', $titre);
        $nia = substr($request->zipcode, 0, 2) . substr($siret, 0, 3) . '-' . rand(100000000, 999999999);

        try {
            if (Association::where('Siret', $request->siret)->exists()) {
                throw new \Exception('Cette association existe déjà');
            }
            Association::create([
                'Name' => $titre,
                'Slug' => $slug,
                'NIA' => $nia,
                'SIRET' => $siret,
                'Address' => $adresse_gestion_libelle_voie,
                'Address2' => $request->address2,
                'PostalCode' => $adresse_code_postal,
                'City' => $adresse_libelle_commune,
                'Phone' => $request->phone,
                'Type' => $request->type,
                'Logo' => $request->logo,
                'Website' => $request->website,
                'Email' => $request->mail,
                'Agree' => $request->agree,
            ]);

            return redirect()->route('index')->with('success', 'L\'association ' . $name . ' a été ajoutée');

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
