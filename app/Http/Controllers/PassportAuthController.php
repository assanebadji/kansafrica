<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Validator;
use Storage;
// use Illuminate\Database\Eloquent\Factories\HasFactory;


class PassportAuthController extends Controller
{

    

    /**
     * Registration
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required|min:4',
            'lastname' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'IsRole' => 'required|',
            //  'photo' => 'required|photo|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);
  
         $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'company_name'=> $request->company_name,
            'IsRole'=> $request->IsRole,
            'adress' => $request->adress,
            'photo' => $request->photo,
            'telephone' => $request->telephone,
            'continent' => $request->continent,
            'country' => $request->country,
            'city' => $request->city,
            'description' => $request->description,
        ]);
       
        $token = $user->createToken('LaravelAuthApp')->accessToken; 
        // dd($token);
 
        return response()->json(['token' => $token], 200);

    }


    public function show($id)
    {
        $user = User::find($id);
        return response()->json(['status' => 'Success', 'data' => $user]);
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
      //  $user = user::find($id);

        // $validator = Validator::make($request->all(), [
        //     'image' => 'required|image:jpeg,png,jpg,gif,svg|max:2048'
        //  ]);
        //  if ($validator->fails()) {
        //     return sendCustomResponse($validator->messages()->first(),  'error', 500);
        //  }
        
        // if(!$request->hasFile('photo')) {

        //     $user->firstname = $request->firstname;
        //     $user->lastname = $request->lastname;
        //     $user->email = $request->email;
        //     $user->company_name = $request->company_name;
        //     $user->IsRole = $request->IsRole;
        //     $user->adress = $request->adress;
        //     $user->photo = $request->photo;
        //     $user->telephone = $request->telephone;
        //     $user->continent = $request->continent;
        //     $user->country = $request->country;
        //     $user->city = $request->city;
        //     $user->description = $request->description;

        // } else {

        //     // $name = $request->file('photo')->getClientOriginalName();
        //     // $path = $request->file('photo')->store('public/images');

        //     $uploadFolder = 'users';
        //     $image = $request->file('photo');
        //     $image_uploaded_path = $image->store($uploadFolder, 'public');
        //     $uploadedImageResponse = array(
        //        "image_name" => basename($image_uploaded_path),
        //        "image_url" => Storage::disk('public')->url($image_uploaded_path),
        //        "mime" => $image->getClientMimeType()
        //     );
   
            $user = user::find($id);

            $image = $request->file('photo');

            if($request->hasFile('photo')) {

                $new_name = rand().'.'.$image->getClientOriginalExtension();
                $filenameWithExt = $image->getClientOriginalName();
                $path = $image->move(public_path('/images'),$new_name); 

                $user->firstname = $request->firstname;
                $user->lastname = $request->lastname;
                $user->email = $request->email;
                $user->company_name = $request->company_name;
                $user->IsRole = $request->IsRole;
                $user->adress = $request->adress;
                $user->photo = $filenameWithExt;
                $user->telephone = $request->telephone;
                $user->continent = $request->continent;
                $user->country = $request->country;
                $user->city = $request->city;
                $user->description = $request->description;
                $user->save();

                return response()->json(['status' => 'Success',
                'id' =>$user->id,
                'firstname' =>$user->firstname,'lastname' => $user->lastname,
                'email'=> $user->email,'company_name' => $user->company_name,
                'IsRole' => $user->IsRole, 'adress' => $user->adress,
                'telephone' => $user->telephone,'continent' => $user->continent,
                'country' => $user->country,'city' => $user->city,
                'description' => $user->description,$uploadedImageResponse,
                'photo' =>$path,
                'message' => 'Update successfull']);

            } else {

                $user->firstname = $request->firstname;
                $user->lastname = $request->lastname;
                $user->email = $request->email;
                $user->company_name = $request->company_name;
                $user->IsRole = $request->IsRole;
                $user->adress = $request->adress;
                $user->photo = $request->photo;
                $user->telephone = $request->telephone;
                $user->continent = $request->continent;
                $user->country = $request->country;
                $user->city = $request->city;
                $user->description = $request->description;

                $user->save();
                return response()->json(['status' => 'Success',
                'id' =>$user->id,
                'firstname' =>$user->firstname,'lastname' => $user->lastname,
                'email'=> $user->email,'company_name' => $user->company_name,
                'IsRole' => $user->IsRole, 'adress' => $user->adress,
                'telephone' => $user->telephone,'continent' => $user->continent,
                'country' => $user->country,'city' => $user->city,'photo' => $user->photo,
                'description' => $user->description,
                'message' => 'Update successfull']);
            }
    }
    public function uploadImage(Request $request , $id)
    {
        
        $user = user::find($id);
    
        $image = $request->file('photo');

         if($request->hasFile('photo')) {

            $new_name = rand().'.'.$image->getClientOriginalExtension();
            $filenameWithExt = $image->getClientOriginalName();
            $path = $image->move(public_path('/images'),$new_name); 
            $user->photo = $filenameWithExt;
            $user->save();
            return response()->json(['status' => 'Success',
            'id' =>$user->id, $path,'message' => 'File Uploaded Successfully']);
        }
        else {
            return response()->json(['Erreur' => $image]);
        }
        
}
 
    /**
     * Login
     */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // "_id": "61b14810e12bf3ed26cb2b4a",
        // "username": "admin",
        // "email": "admin@gmail.com",
 
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
            $id = auth()->user()->id;
            $user = user::find($id);
            $firstname = auth()->user()->firstname;
            $lastname = auth()->user()->lastname;
            $email = auth()->user()->email;
            return response()->json([
            'id' =>$id ,'firstname' =>$firstname,'lastname' =>$lastname,'email' =>$email,
            'company_name' => $user->company_name,
            'IsRole' => $user->IsRole, 'adress' => $user->adress,
            'telephone' => $user->telephone,'continent' => $user->continent,
            'country' => $user->country,'city' => $user->city,'photo'=>$user->photo,
            'description' => $user->description,
            'token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }   
}