<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Models\LicenceDemande;

class LicenceDemandeController extends Controller
{
    public function licenceShow(){
        return view('license');
    }

    public function licenceSend(Request $request){
        $request->validate([
            "license_duree" => 'required',
        ]);
        $newDemande = [
            "employe_name" => Auth()->user()->admin_name,
            "work_type" => $request->license_cadre,
            "rental" => $request->license_rental,
            "duree" => $request->license_duree,
            "status" => "under review",
            "leave_date" => $request->license_on_year. "-". $request->license_on_month. "-". $request->license_on_day,
        ];
        if ($request->filled('license_on_year') && $request->filled('license_on_month') && $request->filled('license_on_day')) {
            $newDemande['leave_date'] = $request->license_on_year . "-" . $request->license_on_month . "-" . $request->license_on_day;
        } else {
            $newDemande['leave_date'] = null;
        }
    
        $newAdd =LicenceDemande::create($newDemande);
    
    
        return redirect()->route('dashboard')->with('demandeAdded', 'تم إرسال الطلب بنجاح');
    }

    public function listLicence(){

        $licenceDemandes = LicenceDemande::get();
        
        $waitingEmploye = Admin::where('status', '=', 'not approved')->get();

        return view('licenseList', compact('licenceDemandes', 'waitingEmploye'));
    }
    public function pdfLicence(Request $request){
        return view('licencePdf', compact('request'));
    }



    public function listLicenceEmp(){

        $licenceDemandes = LicenceDemande::where('employe_name', auth()->user()->admin_name)->get();
        
        $waitingEmploye = Admin::where('status', '=', 'not approved')->get();

        return view('licenseListEmp', compact('licenceDemandes', 'waitingEmploye'));
    }


    public function acceptLicenceDemande(Request $request)
    {
        $licence = LicenceDemande::findOrFail($request->id);
        $licence->status = 'approved';
        $licence->save();

        return redirect()->back()->with('successAccept', 'تم الموافقة على طلب الموضف');
    }
    public function rejectLicenceDemande(Request $request)
    {
        $licence = LicenceDemande::findOrFail($request->id);
        $licence->status = 'not approved';
        $licence->save();

        return redirect()->back()->with('successReject', 'تمت رفض طلب الموضف');
    }

    
}
