<?php

namespace App\Http\Controllers;
// use App\annonces;
use Illuminate\Http\Request;
use App\Models\Annonces;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Validator;



class AnnoncesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annonces = Annonces::all();
        return response()->json(['status' => 'Success', 'data' => $annonces]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $annonces = new Annonces();
        $annonces->user_id = $request->user_id;
        $annonces->company_name = $request->company_name;
        $annonces->adress_company = $request->adress_company;
        $annonces->IsCabinet = $request->IsCabinet;
        $annonces->job_type = $request->job_type;
        $annonces->type_of_employment = $request->type_of_employment;
        $annonces->company_type = $request->company_type;
        $annonces->post_disponible_teletravail = $request->post_disponible_teletravail;
        $annonces->number_of_recruitments = $request->number_of_recruitments;
        $annonces->full_name = $request->full_name;
        $annonces->recruiter_function = $request->recruiter_function;
        $annonces->emplacement_option = $request->emplacement_option;
        $annonces->comapny_size = $request->comapny_size;
        $annonces->info_canal = $request->info_canal;
        $annonces->company_description = $request->company_description;
        $annonces->continent = $request->continent;
        $annonces->country = $request->country;
        $annonces->city = $request->city;

    
        $annonces->save();
 
        return response()->json(['status' => 'Success' ,'data' => $annonces, 'message' => 'Annonces Saved']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $annonces = Annonces::find($id);
        return response()->json(['status' => 'Success', 'data' => $annonces]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $annonces = Annonces::find($id);
        $annonces->user_id = $request->user_id;
        $annonces->company_name = $request->company_name;
        $annonces->adress_company = $request->adress_company;
        $annonces->IsCabinet = $request->IsCabinet;
        $annonces->job_type = $request->job_type;
        $annonces->type_of_employment = $request->type_of_employment;
        $annonces->company_type = $request->company_type;
        $annonces->post_disponible_teletravail = $request->post_disponible_teletravail;
        $annonces->number_of_recruitments = $request->number_of_recruitments;
        $annonces->full_name = $request->full_name;
        $annonces->recruiter_function = $request->recruiter_function;
        $annonces->emplacement_option = $request->emplacement_option;
        $annonces->comapny_size = $request->comapny_size;
        $annonces->info_canal = $request->info_canal;
        $annonces->company_description = $request->company_description;
        $annonces->continent = $request->continent;
        $annonces->country = $request->country;
        $annonces->city = $request->city;

        // $annonces->type_user = $request->type_user;
        // $annonces->number_post = $request->number_post;
        // $annonces->company_sector = $request->company_sector;
        $annonces->save();
 
        return response()->json(['status' => 'Success', 'message' => 'Annonces Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function annonceByUser($id)
    {
        $annonces = Annonces::find($id);
        return response()->json(['status' => 'Success', 'data' => $annonces]);
    }
}
