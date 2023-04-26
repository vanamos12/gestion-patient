@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('consultation.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="patient" class="col-md-4 col-form-label text-md-end">{{ __('Patient') }}</label>

                            <div class="col-md-6">
                                <input id="patient" type="text" class="form-control @error('patient') is-invalid @enderror" name="patient" value="{{ old('patient') }}" required autocomplete="patient" autofocus>
                                <input id="patient_id" type="hidden" name="patient_id"/>
                                @error('patient')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="row mb-3">
                            <label for="montant_examen" class="col-md-4 col-form-label text-md-end">{{ __('Montant Examen') }}</label>

                            <div class="col-md-6">
                                <input id="montant_examen" type="number" value="15000" step="1000" class="form-control @error('montant_examen') is-invalid @enderror" name="montant_examen" required >

                                @error('montant_examen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="type_examen" class="col-md-4 col-form-label text-md-end">{{ __('Type Examen') }}</label>

                            <div class="col-md-6">
                                <input id="type_examen" type="text" class="form-control @error('type_examen') is-invalid @enderror" name="type_examen" value="{{ old('type_examen') }}" required autocomplete="type_examen" autofocus>

                                @error('type_examen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nombre_examen" class="col-md-4 col-form-label text-md-end">{{ __('Nombre d\'examens') }}</label>

                            <div class="col-md-6">
                                <input id="nombre_examen" type="number" value="1" step="1" class="form-control @error('nombre_examen') is-invalid @enderror" name="nombre_examen" value="{{ old('nombre_examen') }}" required autocomplete="nombre_examen" autofocus>

                                @error('nombre_examen')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="type_consult" class="col-md-4 col-form-label text-md-end">{{ __('Type Consultation') }}</label>

                            <div class="col-md-6">
                                <input id="type_consult" type="text" class="form-control @error('type_consult') is-invalid @enderror" name="type_consult" value="{{ old('type_consult') }}" required autocomplete="type_consult">

                                @error('type_consult')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="montant_consult" class="col-md-4 col-form-label text-md-end">{{ __('Montant Consultation') }}</label>

                            <div class="col-md-6">
                                <input id="montant_consult" type="number" value="15000" step="1000" class="form-control @error('montant_consult') is-invalid @enderror" name="montant_consult" required >

                                @error('montant_consult')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nombre_consult" class="col-md-4 col-form-label text-md-end">{{ __('Nombre de consultations') }}</label>

                            <div class="col-md-6">
                                <input id="nombre_consult" type="number" value="1" step="1" class="form-control @error('nombre_consult') is-invalid @enderror" name="nombre_consult" value="{{ old('nombre_consult') }}" required autocomplete="nombre_consult" autofocus>

                                @error('nombre_consult')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date_consult" class="col-md-4 col-form-label text-md-end">{{ __('Date de consultation') }}</label>

                            <div class="col-md-6">
                                <input id="date_consult" type="date" value="{{date('Y-m-d')}}" class="form-control @error('date_consult') is-invalid @enderror" name="date_consult" value="{{ old('date_consult') }}" required autocomplete="date_consult" autofocus>

                                @error('date_consult')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enregistrer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>   

const patients = {{ \Illuminate\Support\Js::from($labelpatients) }};

</script>
@endsection
