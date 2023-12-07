@extends('layouts.main')
@section('content')
<div class="form__box">
   <form class="step" method="POST" action="{{ route('claims.checkCompensation') }}">
      @csrf
      <div class="step-wrapper mb-3">
         <div class="form-group">
            <label class="fw-bold">How long was the total delay after arrival?</label>
         </div>
         <div class="form-check">
            <input class="form-check-input" type="radio" name="time_delay" id="radio1" value="2" checked>
            <label class="form-check-label" for="radio1">
               less than 3 hours
            </label>
         </div>
         <div class="form-check">
            <input class="form-check-input" type="radio" name="time_delay" id="radio2" value="3">
            <label class="form-check-label" for="radio2">
               from 3 to 4 hours
            </label>
         </div>
         <div class="form-check">
            <input class="form-check-input" type="radio" name="time_delay" id="radio3" value="4">
            <label class="form-check-label" for="radio3">
               from 4 and more 4 hours
            </label>
         </div>
         <div class="form-check">
            <input class="form-check-input" type="radio" name="time_delay" id="radio4" value="5">
            <label class="form-check-label" for="radio4">
               Didn't arrive at all
            </label>
         </div>
      </div>
      <div class="step-wrapper mb-3">
         <label class="fw-bold" for="reason">What is the reason for the flight delay?</label>
         <select class="form-select" name="reason" id="reason" aria-label="reason">
            <option value="1">Don't remeber the reason</option>
            <option value="2">Technical problems</option>
            <option value="3">Weather conditions</option>
         </select>
      </div>
      <div class="step-wrapper mb-3">
         <label class="fw-bold" for="what_happened" class="form-label">Add any other details about your problematic flight (optional)</label>
         <textarea class="form-control" name="what_happened" id="what_happened" cols="30" rows="10" style="height:auto;" placeholder="Tell what happened (not required)"></textarea>
      </div>
      <div class="form-group">
         <button type="submit" class="btn btn-primary continue-button">Continue</button>
      </div>
   </form>
</div>
@endsection