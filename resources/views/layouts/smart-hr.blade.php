
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
            <meta name="description" content="GK">
        <meta name="keywords" content="GK">
        <meta name="robots" content="noindex, nofollow">
        <title> BodaBoda Association of Kenya </title>

		@include('layouts.partials.common-style')

    </head>
    
    <body>

        <!-- Main Wrapper -->
        <div class="main-wrapper">

			@include('layouts.partials.header')

			@include('layouts.partials.side-bar-min')

            @yield('content')

        </div>
        <!-- /Main Wrapper -->

		@include('layouts.partials.common-js')
		@yield('custom_js')


        <script>


            $('#edit').on('show.bs.modal', function (event) {

                var button = $(event.relatedTarget)
                var title = button.data('mytitle')
                var description = button.data('mydescription')
                var cat_id = button.data('catid')
                var modal = $(this)

                modal.find('.modal-body #title').val(title);
                modal.find('.modal-body #des').val(description);
                modal.find('.modal-body #cat_id').val(cat_id);
          })


            $('#delete').on('show.bs.modal', function (event) {

                var button = $(event.relatedTarget)

                var cat_id = button.data('catid')
                var modal = $(this)

                modal.find('.modal-body #cat_id').val(cat_id);
          })


          </script>
    </body>
</html>
