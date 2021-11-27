<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Type;
use App\Models\Brand;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Datatable;
use File;
use Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations=City::whereNotNull('parent_id')->with('parent')->get();

        return view('backend.car',compact('locations'));
    }

    public function getCars(){
        $cars=null;

       if(Auth::check()){
          
            $role=Auth::user()->roles[0];
            if($role->name =='car'){
                $cars=Car::where('company_id',Auth::user()->company->id)->get();
            }else{
                $cars=Car::all();
            }
            
       }

       

       if($cars){

        $datatables = Datatable::of($cars)->with(['type','company'])
            ->addColumn('codeno',function($car){
                return $car->codeno;
            } ) 
            ->addColumn('car_name',function($car){
                return $car->name.' ( '.$car->model.' )';
            } )  
            ->addColumn('seat',function($car){
                return $car->seats;
            } )
            ->addColumn('type',function($car){
                return $car->type->name;
            } )
            ->addColumn('company',function($car){
                return $car->company->name;
            } )
            ->addColumn('action',function($car){
                return "<button class='btn btn-danger btn-delete' data-id=".$car->id.">Delete</button>
                <a href=car/$car->id/edit class='btn btn-warning btn-edit' data-id=".$car->id.">Edit</a><a href=car/$car->id class='btn btn-outline-info btn-edit' data-id=".$car->id.">Detail</a>
                <button class='btn btn-secondary btn-pickup' data-id=".$car->id." >Add Pickup </button>
                ";
            } )

           ->addColumn('no-action',function($car){
            return '<td class="dropdown"><a class="btn btn-default actionButton"
                    data-toggle="dropdown" href="#"> Action </a></td>
            <ul id="contextMenu" class="dropdown-menu" role="menu">
                        <li>'."<a href='#' class='nav-link text-danger btn-delete' data-id=".$car->id.">Delete</a>".'</li>
                        <li>'."<a href=car/$car->id/edit class='nav-link text-warning btn-edit' data-id=".$car->id.">Edit</a>".'</li>
                        <li>'."<a href=car/$car->id class='nav-link text-info btn-edit' data-id=".$car->id.">Detail</a>".'</li>
                        <li>'."<a href='#' class='nav-link text-success btn-pickup' data-id=".$car->id." >Add Pickup Location </a>".'</li>
                      </ul>';
           });
             return $datatables->make(true);
       }else{
           return response()->json([]);
       }

            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities=City::whereNull('parent_id')->get();
        $types=Type::where('parent_id',2)->get();
        $brands=Brand::all();
        // dd($types);
        return view('backend.car_new',compact('types','brands','cities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           //dd($request); 
       
         // dd($request->discount);
        // codeno generate
    
       
        // dd($codeno);
        // die();
        



         if($request->discount==null){
            $request->discount=0;
         }
        $request->validate([
            'name' => 'required',
            'type_id' => 'required',
            
            'price_per_day' => 'required',
            'cover' => 'required',
            'city_id'=>'required'
        ]);  

        $input = $request->all();
        if($request->hasFile('cover')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            // $path = $request->file('cover')->storeAs('public/cover',$fileNameToStore);
            // $path = $request->file->storeAs('zipfile',$fileName,'public');        $zipfilepath = "/storage/".$path;

            $path = $request->file('cover')->storeAs('cover',$fileNameToStore,'public');
             $input['image']['cover'] = "$path";
        

        // if($cover=$request->file('cover')){
        //     $destinationPath = 'image/cover/';
        //     $profileImage = date('YmdHis') . "." . $cover->getClientOriginalExtension();
        //     $cover->move($destinationPath, $profileImage);
        //     $input['image'] = "$profileImage";

        }else{
            $input['image']['cover']=null;
        }


        if($request->hasFile('previews')){
            // Get filename with the extension
           foreach($request->file('previews') as  $k=>$file){
             $filenameWithExt = $file->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $file->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $file->storeAs('previews',$fileNameToStore,'public');
              $input['image']['previews'][$k] = "/$path";
            
           }
        

        // if($cover=$request->file('cover')){
        //     $destinationPath = 'image/cover/';
        //     $profileImage = date('YmdHis') . "." . $cover->getClientOriginalExtension();
        //     $cover->move($destinationPath, $profileImage);
        //     $input['image'] = "$profileImage";

        }else{
            $input['image']['previews']=null;
        }

         $codeno=$this->generateCode();

            
        $car=Car::create([
            'name'=>$request->name,
            'codeno'=>$codeno,
            'photo'=>json_encode($input['image']),
            'model'=>$request->model,
            'seats'=>$request->seat,
            'doors'=>$request->door,
            'bags'=>$request->air_bag_num,
            'aircon'=>$request->air_condition,
            'status'=>1,
            'type_id'=>$request->type_id,
            'brand_id'=>$request->brand_id,
            'company_id'=>Auth::user()->company->id,
            'priceperday'=>$request->price_per_day,
            "discount"=>$request->discount,
            "qty"=>1,
            "city_id"=>$request->city_id
        ]);
        $car_id=$car->id;
        
         return redirect()->route('car.index')
                        ->with( ['data' => $car_id] );
        
    }

    public function generateCode(){
        $data=Car::orderBy('id','desc')->first();
        if($data == null){
            $codeno='A-0000';
            return $codeno;
        }
        // dd($data);
        $codeno=$data->codeno;
        $id=substr($codeno, 2);
        $alpha= ord($codeno);

        if($id >=9999){
            $id=0;
            $id=str_pad($id, 4, '0', STR_PAD_LEFT);
             $alpha++;     
             
        }else{
             $id=str_pad($id+1, 4, '0', STR_PAD_LEFT);
            
        }
        $l = chr($alpha); // 'B'
        $codeno=$l.'-'.$id;
        $alpha= ord($codeno);
        
        $alpha++;
        $l = chr($alpha); // 'B'
        return $codeno;


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        $locations=City::whereNotNull('parent_id')->get();
        return view('backend.car_detail',compact('car','locations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
         $types=Type::where('parent_id',2)->get();
        $brands=Brand::all();
         return view('backend.car_edit',compact('car','types','brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        // wish-2020_1625978102.jpeg
        // dd($request);

        // old photo handling
        $oldphoto=json_decode($request->oldphoto,true);
        // dd($oldphoto['cover']);

        // old photo handling
        if($request->discount==null){
            $request->discount=0;
         }
        $request->validate([
            'name' => 'required',
            'type_id' => 'required',
            'price_per_day' => 'required',
            'brand_id'=>'required'
        ]);  

        $input = $request->all();
        if($request->hasFile('cover')){
            // Get filename with the extension
            $filenameWithExt = $request->file('cover')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            // $path = $request->file('cover')->storeAs('public/cover',$fileNameToStore);
            // $path = $request->file->storeAs('zipfile',$fileName,'public');        $zipfilepath = "/storage/".$path;

            $path = $request->file('cover')->storeAs('cover',$fileNameToStore,'public');
             $input['image']['cover'] = "$path";
        
              // unlink(storage_path('app/public/'.$oldphoto['cover'])) ;
       

        }else{
            $input['image']['cover']=$oldphoto['cover'];
        }
        // dd($input);

        if($request->hasFile('previews')){
            // Get filename with the extension
           foreach($request->file('previews') as  $k=>$file){
             $filenameWithExt = $file->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $file->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $file->storeAs('previews',$fileNameToStore,'public');
              $input['image']['previews'][$k] = "$path";
            
           }

           foreach($oldphoto['previews'] as $v){
            // unlink(storage_path('app/public/'.$v));
           }
        

        

        }else{
            $input['image']['previews']=$oldphoto['previews'];
        }

            $car->name=$request->name;
            $car->photo=json_encode($input['image']);
            $car->model=$request->model;
            $car->seats=$request->seat;
            $car->doors=$request->door;
            $car->bags=$request->air_bag_num;
            $car->aircon=$request->air_condition;
            $car->type_id=$request->type_id;
            $car->brand_id=$request->brand_id;
            $car->priceperday=$request->price_per_day;
            $car->discount=$request->discount;
            $car->save();
    
        return redirect()->route('car.index')
                        ->with('success','Vehicle updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return response()->json(['success'=>'Successfully deleted!']);
    }
}
