<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PropertyController extends Controller
{
    //

    public function index()
    {
        // $properties =  DB::select('select * from properties ');
        $properties = Property::all();
        return view('property.index')->with('properties', $properties);
    }

    public function show($name)
    {
        // $prop = DB::select("select * from properties where name = ?", [$name]);

        $prop = Property::where('name',$name)->get();
        if (!empty($prop)) {
            return view('property.show')->with('properties', $prop);
        } else {
            return redirect()->action('App\Http\Controllers\PropertyController@index');
        }

    }
    public function create()
    {
        return view('property.create');
    }

    public function store(Request $request)
    {
        $propsSlug = $this->setName($request->title);

        // $props = [
        //     $request->title,
        //     $propsSlug,
        //     $request->description,
        //     $request->rental_price,
        //     $request->sale_price,
        // ];
        // DB::insert('insert into properties (title,name,description,rental_price,sale_price) values (?,?,?,?,?)', $props);

        $props = [
            'title'=>$request->title,
            'name'=>$propsSlug,
            'description'=>$request->description,
            'rental_price'=>$request->rental_price,
            'sale_price'=> $request->sale_price,
        ];
        Property::create($props);

        return redirect()->action('App\Http\Controllers\PropertyController@index');
    }

    private function setName($title){
        $propsSlug = Str::slug($title);
        // $property = DB::select("select * from properties");
        $property = Property::all();
        $t = 0;

        foreach ($property as $propy) {
            if (Str::slug($propy->title) === $propsSlug) {
                $t++;
            }
        }

            if($t>0){
                $propsSlug = $propsSlug.'-'.$t;
            }

            return $propsSlug;

    }

    public function edit($name){
        // $prop = DB::select("select * from properties where name = ?", [$name]);
        $prop = Property::where('name',$name)->get();
        if (!empty($prop)) {
            return view('property.edit')->with('properties', $prop);
        } else {
            return redirect()->action('App\Http\Controllers\PropertyController@index');
        }

    }

    public function update(Request $request, $id){
        $propsSlug = $this->setName($request->title);
        // $props = [
        //     $request->title,
        //     $propsSlug,
        //     $request->description,
        //     $request->rental_price,
        //     $request->sale_price,
        //     $id
        // ];
        // DB::update('update properties set title = ?, name = ?, description = ?, rental_price = ?, sale_price = ? where id = ?', $props);
        $propety = Property::find($id);
        $propety->title = $request->title;
        $propety->name = $propsSlug;
        $propety->description = $request->description;
        $propety->rental_price = $request->rental_price;
        $propety->sale_price = $request->sale_price;
        $propety->save();
        return redirect()->action('App\Http\Controllers\PropertyController@index');
    }

    public function destroy($name){
        // $prop = DB::select("select * from properties where name = ?", [$name]);
        $prop = Property::where('name',$name)->get();

        if(!empty($prop)){
            DB::delete("delete from properties where name = ?", [$name]);
        }

        return redirect()->action('App\Http\Controllers\PropertyController@index');
    }
}
