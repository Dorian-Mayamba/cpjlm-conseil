<?php

namespace App\Http\Controllers;

use App\Models\Partners;
use Illuminate\Http\Request;
use App\Http\Requests\PartnerForm;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class PartnersController extends Controller
{
    public function __construct(){
        $this->middleware('admin')->except('show');
    }
    
   

    /**
     * @param int $id
     * @param Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function show($id,Request $request){
        $partner = Partners::find($id);
        if($request->expectsJson()){
            return response()->json($partner);
        }
        return null;
    }

    /**
     *@param App\Http\Requests\PartnerForm $request
     *@return Illuminate\Http\Response
     */
    public function addPartner(PartnerForm $request){

        $path = Storage::putFileAs('partner_logo',$request->file('logo'),$request->file('logo')->getClientOriginalName());

        $partner = Partners::create([
            'partner_name' => $request->partner_name,
            'description' => $request->description,
            'partner_website' => $request->partner_website,
            'logo' => "/storage/".$path
        ]);

        return redirect()->route('admin.show',$partner->id);
    }

    /**
     * @param int $id
     * @return Illuminate\Http\Response
     */

    public function delete($id){
        $partnerToDelete = Partners::find($id);
        $partnerToDelete->delete();

        Session::flash('delete-success',"Le partenaire a été supprimé avec succès");
        return back();
    }

    /**
     *
     * @param int $id
     * @param App\Http\PartnerFrom $request
     * @return Illuminate\Http\Response
     */
    public function update(PartnerForm $request, $id){

        $path = Storage::putFileAs('partner_logo',$request->file('logo'),$request->file('logo')->getClientOriginalName());

        Partners::where('id', '=' ,$id)
        ->update([
            'partner_name' => $request->partner_name,
            'description' => $request->description,
            'partner_website' => $request->partner_website,
            'logo' => "/storage/".$path
        ]);

        Session::flash('update-success','Le partenaire a été modifié avec succès');
        return back();
    }
}
