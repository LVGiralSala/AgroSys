<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<!-- HTML HEAD -->
@include('layouts.partials.htmlhead')
<!-- end HTML HEAD -->

    <body>
        <!-- HEADER -->
        @include('layouts.partials.header_log')
        <!-- end HEADER -->
        <h1>HOME</h1>
        <!-- SCRIPTS -->
        @include('layouts.partials.scripts')
        <!-- end SCRIPTS -->
    </body>
</html>
