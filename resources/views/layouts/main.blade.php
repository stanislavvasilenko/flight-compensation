<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">
   </head>
<body>
   <div class="wrapper">
      <header>
         <div class="container">
            <div class="row">
                  <nav class="navbar navbar-expand-lg bg-body-tertiary">
                     <div class="container-fluid">
                        <a class="navbar-brand" href="{{ route('claims.index') }}">
                           <img src="{{ asset('images/logo.svg') }}" alt="logo">
                        </a>
                     </div>
                  </nav>
               </div>
            </div>
         </div>
      </header>

      <div class="container">
         <div class="row">
            @yield('content')
         </div>
      </div>
   </div>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
   <script href="{{ asset('js/app.js') }}"></script>
   <script>
         $('#departureAirport, #destination').select2({
            multiple: true,
            minimumInputLength: 2,
            ajax: {
               type: 'POST',
               url: 'https://port-api.com/airport/search',
               data: function(params) {
                  return `{"search_string": "${params.term}"}`;
               },
               delay: 250,
               dataType: 'json',
               processResults: function(data) {
                  let airports = data.features.map(airport => airport.properties);

                  let results = $.map(airports, function(obj) {
                     return {
                        "id": obj.id,
                        "text": `${obj.name}, ${obj.municipality}, ${obj.country?.name}`
                     }
                  });

                  return {results};
               },
               cache: true,
               templateResult: function (result) {
                  return result.text;
               },
            }
         });
         $('#departureAirport').on('select2:select', function(e){
            $(this).val(e.params.data.id).trigger('change');
            if ($('#destination').val()[0]) {
               $('.check-flight').removeAttr('disabled');
            }
         })
         $('#destination').on('select2:select', function(e){
            $(this).val(e.params.data.id).trigger('change');
            if ($('#departureAirport').val()[0]) {
               $('.check-flight').removeAttr('disabled');
            }
         })

         $('.check-flight').attr('disabled', 'disabled');
         $('.check-flight').on('click', function(e) {
            e.preventDefault()

            let departureAirport = $('#departureAirport').val()[0]
            let destination = $('#destination').val()[0]

            if (departureAirport === destination) {
               $('#checkFlightModal').modal('show')
                  .find('p.info')
                  .text('Airport of departure and Final destination airport CANNOT be the same')
               return false
            }

            $('form#checkFlight').submit();
         })

         $('.modal-content button').on('click', function() {
            $('#checkFlightModal').modal('hide')
         })
   </script>
</body>
</html>