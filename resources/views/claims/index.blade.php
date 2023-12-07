@extends('layouts.main')
@section('content')
   <div class="form__box">
      <form class="step" id="checkFlight" method="POST" action="{{ route('claims.checkAirports') }}">
         @csrf
         <div class="form-group mb-3">
            <label class="fw-bold" for="">Check the flight</label>
         </div>
         <div class="step-wrapper mb-3">
            <div class="form-group mb-3">
               <label class="fw-bold" for="departureAirport">Airport of departure</label><br>
               <select class="select2" name="departure-airport" id="departureAirport" placeholder="Airport of departure"></select>
            </div>
            <div class="form-group mb-3">
               <label class="fw-bold" for="destination">Destination</label><br>
               <select class="select2" name="destination" id="destination" placeholder="Destination"></select>
            </div>
         </div>
         <div class="form-group">
            <button type="submit" class="btn btn-primary continue-button check-flight">Continue</button>
         </div>
      </form>
   </div>
   
   <div class="modal fade" id="checkFlightModal" tabindex="-1" role="dialog" aria-label="check_flight_modal" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <button class="close" data-dismiss="modal" aria-label="Close"></button>
            <p class="info"></p>
            <div class="form-group">
               <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
         </div>
      </div>
   </div>
@endsection