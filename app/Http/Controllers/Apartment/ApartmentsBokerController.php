<?php
namespace App\Http\Controllers\Apartment;
use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApartmentsBokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        // $user = User::all();

        $apartments = DB::table('apartments')
        ->where('user_id', Auth::user()->id)
        ->get();

        return view('admin.apartmentsBoker.apartmentbroker',compact( ['apartments','user']));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
        // $input = $request->all();
        Apartment::create(
            $request->all(),

            // 'user_id'->$request->id,
         );

/*
         $apartments = new  Apartment();
         $apartments->address = $request->address;
         $apartments->apartment_type = $request->apartment_type;
         $apartments->size = $request->size;
         $apartments->rooms_number = $request->rooms_number;
         $apartments->bathroms_number = $request->bathroms_number;
         $apartments->apartment_description = $request->apartment_description;
         $apartments->start_at = $request->start_at;
         $apartments->end_at = $request->end_at;
         $apartments->rent_cyclic = $request->rent_cyclic;
         $apartments->price_of_rent = $request->price_of_rent;
         $apartments->number_presenter_payment = $request->number_presenter_payment;
         $apartments->user_id = $request->user_id;

*/
        // return redirect('student')->with('flash_message', 'Student Addedd!');
        // return response('تمامة الاضافه بنجاح');

    //       insert image
        $apartments = new  Apartment();
        if($request->hasFile('images')){

            foreach($request->file('images') as $file){
                $name = $file->getClientOriginalName();
                // $file->storeAs('');
                $file->storeAs('attachments/apartments/'.$apartments->name,$file->getClientOriginalName(),'upload_attachments');
            $images = new image();
            $images->filename = $name;
            $images->imageable_id = $apartments->id;
            $images->imageable_type = 'App\Models\apartment';
            $images->save();
        }
    }

        session()->flash('Add', 'تم اضافة المنتج بنجاح ');
        return redirect('/apartment');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\apartments  $apartments
     * @return \Illuminate\Http\Response
    //  */
    // public function show(apartments $apartments)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\apartments  $apartments
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apartments = Apartment::findorFail($id);
        $user = User::all();
        return view('apartments.edit' ,compact ('apartments','user'));
        // return  $id;
            //  return response('id');
    }
    public function update(Request $request){
        // $apartments = Apartment::findorFail($id);
        // $apartments = $request->all();

        //             $apartment->save();
        //  return redirect()->route('apartment.index');
        // // $user = User::all();
        // $id = $request->id;
        // $this->validate($request, [

        //     'address' => 'required|max:255|unique:apartments,address,'.$id,
        //     'apartment_description' => 'required',
        // ],[

        //     'address.required' =>'يرجي ادخال اسم القسم',
        //     'address.unique' =>'اسم القسم مسجل مسبقا',
        //     'apartment_description.required' =>'يرجي ادخال البيان',

        // ]);
        $id = $request->id;
        $apartment = Apartment::find($id);
        $apartment->update([
            'address' => $request->address,
            'apartment_type' => $request->apartment_type,
            'size' => $request->size,
            'rooms_number'=> $request->rooms_number,
            'bathroms_number' => $request->bathroms_number,
            'apartment_description'=> $request->apartment_description,
            'start_at'=> $request->start_at,
            'end_at'=> $request->end_at,
            'rent_cyclic'=> $request->rent_cyclic,
            'price_of_rent'=> $request->price_of_rent,
            'number_presenter_payment'=> $request->number_presenter_payment,
            'user_id'=> $request->user_id,
        ]);
        session()->flash('edit','تم تعديل الباينات بنجاج');
        return redirect('/apartment');
    }
    public function destroy(Request $request)
    {
        //
        $id = $request->id;
        Apartment::find($id)->delete();
        session()->flash('delete','تم حذف الشقه بنجاح');
        return redirect('/apartment');
    }
}
