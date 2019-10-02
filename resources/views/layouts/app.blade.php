<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

    <!-- HTML HEAD incluye las Hojas de Estilo, El titulo, El CSRF,  -->
    @include('layouts.partials.htmlhead')
    <!-- end HTML HEAD -->

<body>
    <div id="wrapper">

        <!-- start sidebar -->
        @include('layouts.partials.sidebar')
        <!-- end sidebar -->

        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- start header -->
                @include('layouts.partials.header1')
                <!-- end header -->
                
                <div class="container-fluid">
                    @yield('contenido') 
                </div>
            </div>
            

            
        </div>
        <!-- start toggle top area -->
        @include('layouts.partials.footer')
        <!-- end toggle top area -->
    </div>

    <!-- start scripts -->
    @include('layouts.partials.scripts')
    <!-- end scripts -->

</body>
</html>