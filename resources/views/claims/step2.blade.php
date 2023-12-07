@extends('layouts.main')
@section('content')
<div class="form__box">
   <form class="step" method="POST" action="{{ route('claims.checkFlight') }}">
      @csrf
      <div class="step-wrapper mb-3">
         <div class="form-group">
            <label class="fw-bold" for="">What happened to your flight?</label>
         </div>
         <div class="form-check">
            <input class="form-check-input" type="radio" name="problem" id="flightDelay1" value="delay" checked>
            <label class="form-check-label" for="flightDelay1">
               Flight delay
            </label>
         </div>
         <div class="form-check">
            <input class="form-check-input" type="radio" name="problem" id="flightCancellation2" value="cancellation">
            <label class="form-check-label" for="flightCancellation2">
               Flight cancellation
            </label>
         </div>
      </div>
      <div class="form-group">
         <button type="submit" class="btn btn-primary continue-button">Continue</button>
      </div>
   </form>
</div>
@endsection