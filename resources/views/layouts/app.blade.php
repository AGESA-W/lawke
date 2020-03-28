<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

         <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/typewriter.js') }}" defer></script>
        <script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
    
        <script src="https://js.pusher.com/5.0/pusher.min.js"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/font/flaticon.css') }}" type="text/css" rel="stylesheet">
        
    </head>
    <body>
        <div id="app">
            @include('partials.navbar')
            @include('partials.messages')
            <main>
                <div class="container mt-3">
                    @yield('content')
                </div>
            </main>
            @include('partials.footer')
        </div>
    </body>
    <script>
        $(document).ready(function (){
            $('#edit').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var school = button.data('school_name') // Extract info from data-* attributes
            var degree = button.data('degree') // Extract info from data-* attributes
            var graduation = button.data('graduation') // Extract info from data-* attributes
            var attorney_id = button.data('attorney_id') // Extract info from data-* attribute
            var ed_id = button.data('education_id') // Extract info from data-* attribute

            var modal = $(this)
            modal.find('.modal-body #school_name').val(school);
            modal.find('.modal-body #degree').val(degree);
            modal.find('.modal-body #graduation').val(graduation);
            modal.find('.modal-body #attorney_id').val(attorney_id);
            modal.find('.modal-body #education_id').val(ed_id);

            })

            $('#editReview').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var title = button.data('title') // Extract info from data-* attributes
            var description = button.data('description') // Extract info from data-* attributes
            var rev_id = button.data('review_id') // Extract info from data-* attribute
            

            var modal = $(this)
            modal.find('.modal-body #headline').val(title);
            modal.find('.modal-body #description').val(description);
            modal.find('.modal-body #review_id').val(rev_id);

            


            
            })
        });
    </script>
</html>
