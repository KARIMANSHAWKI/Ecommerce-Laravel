    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 3 | Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        
        {{-- ************ Include style ********** --}}
        @include('admin.commomn.style')
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            @include('admin.commomn.navbar')

           @include('admin.commomn.sidebar')

            <div class="content-wrapper">
                <div class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1 class="m-0 text-dark">{{ __('messages.Welcome Admin') }}:)</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">{{ __('messages.home') }}</a></li>
                                    <li class="breadcrumb-item active">{{ __('messages.Dashboard') }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                </section>
            </div>
         @include('admin.commomn.footer')

            <aside class="control-sidebar control-sidebar-dark">
            </aside>
        </div>

  @include('admin.commomn.script')

        <script>
            $(document).ready(function() {
                $(window).on('studentAdded', function() {
                    $('#newsModel').modal('hide');
                })
            })

        </script>


    </body>

    </html>
