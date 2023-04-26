@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Liste des consultations') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        <?php
                            session(['status' => '']) 
                        ?>
                    @endif

                    <table class="table table-success table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Montant Consultation</th>
                                <th>Montant Examen</th>
                                <th>Net Percu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($consultations as $key => $consultation)
                            <tr>
                                <td>{{$consultation->patient->name}}</td>
                                <td>{{$consultation->date_consult}}</td>
                                <td>{{$consultation->montant_consult}}</td>
                                <td>{{$consultation->montant_examen}}</td>
                                <td>{{$consultation->net_percu}}</td>
                            </tr> 
                            @endforeach
                        </tbody>
                    </table>
                    <div>
                        {{$consultations->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
