<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Patient;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $labelpatientsAll = Patient::where('user_id', auth()->user()->id)->get();
        $labelpatients = [];
        foreach($labelpatientsAll as $patient){
            $labelpatients[] = ['label' => $patient->name, 'value'=> $patient->id];
        }
        return view('home', compact('labelpatients'));
    }

    public function patientCreate()
    {
        return view('patient');
    }

    public function patientStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'date_naissance' => 'required'
        ]);

        $patient = new Patient([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'date_naissance' => $request->get('date_naissance'),
            'user_id' => auth()->user()->id
        ]);

        $patient->save();
        session(['status' => 'Reussite de l\'enregistrement.']);
        return redirect(route('home'));
    }

    public function consultationStore(Request $request){
        $validated = $request->validate([
            'patient_id' => 'required',
            'type_consult' => 'required',
            'montant_consult'=> 'required',
            'nombre_consult'=> 'required',
            'type_examen'=> 'required',
            'montant_examen'=> 'required',
            'nombre_examen'=> 'required',
            'date_consult'=> 'required',
        ]);

        $consultation = new Consultation([
            'patient_id' => $request->get('patient_id'),
            'type_consult' => $request->get('type_consult'),
            'montant_consult' => $request->get('montant_consult'),
            'nombre_consult' => $request->get('nombre_consult'),
            'type_examen'=> $request->get('type_examen'),
            'montant_examen'=> $request->get('montant_examen'),
            'nombre_examen'=> $request->get('nombre_examen'),
            'date_consult'=> $request->get('date_consult'),
            'commission_cabinet' => floatval($request->get('montant_examen')) * 0.1,
            'net_percu' => floatval($request->get('montant_consult')) + floatval($request->get('montant_examen'))*0.9,
            'user_id' => auth()->user()->id,
        ]);

        $consultation->save();
        session(['status' => 'Reussite de l\'enregistrement.']);
        return redirect(route('consultation.list'));
    }

    public function consultationList(){
        $consultations = Consultation::where('user_id', auth()->user()->id)
                            ->orderBy('created_at', 'desc')
                            ->paginate(10);
        return view('consultation-list', compact('consultations'));
    }
}
