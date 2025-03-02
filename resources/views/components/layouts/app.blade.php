<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Resume - Start Bootstrap Theme</title>
    <link rel="icon" type="image/x-icon" href="assets/img/logoCar.png" />

    {{-- <link rel="stylesheet" href="{{ asset(css/styles.css) }}"> --}}
    {{--
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}"> --}}

    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    {{-- <link rel="stylesheet"  href="{{asset('public/css/styles.css')}}" /> --}}

</head>
<body id="page-top">

    <!-- Navigation-->
    @include('components.layouts.partials.navbar')



    <!-- Page Content-->
    <div class="container-fluid p-0">

        <!--Inicio-->
        <section class="secciones">
            {{-- class="resume-section" id="about" --}}
            @if (request()->routeIs('start'))
            {{$slot}}
            @endif
        </section>

        <!--Grupos-->
        <section class="secciones2">
            @if (request()->routeIs('group'))
            {{$slot}}
            @endif
        </section>


    </div>
    {{-- script --}}
    @include('components.layouts.partials.script')

    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('close-modal', (idModal) => {
                $('#' + idModal).modal('hide');
            });
        });

        // document.addEventListener('livewire:init', () => {
        //     Livewire.on('close-modal', (modalId) => {
        //         $('#' + modalId).modal('hide');
        //         $('body').removeClass('modal-open');
        //         $('.modal-backdrop').remove();
        //     });
        // });


        document.addEventListener('livewire:init', () => {
            Livewire.on('open-modal', (idModal) => {
                $('#' + idModal).modal('show');
            });
        });

    </script>


</body>
</html>
