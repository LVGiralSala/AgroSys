<!-- Bootstrap core JavaScript-->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}" type="text/javascript"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}" type="text/javascript"></script>

<!-- Page level plugins -->
<script src="{{ asset('vendor/chart.js/Chart.min.js') }}" type="text/javascript"></script>

<!-- Page level demo scripts -->
<script src="{{ asset('js/demo/chart-area-demo.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/demo/chart-pie-demo.js') }}" type="text/javascript"></script>

<!-- datepicker scripts -->
<script src="{{ asset('js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap-datepicker.es.js') }}" type="text/javascript"></script>

<!-- mask scripts -->
{{-- <script src="{{ asset('js/jquery.mask.js') }}"></script> --}}

<!-- custom scripts -->
<script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> --}}







<!-- functions-->


<script>
    $(document).ready(function() {
        $('.datetimepicker').datepicker({
            format: "yyyy-mm-dd",
            language: "es",
            autoclose: true,
        });
    });

    function calcPatrimonio(){
                ac = document.getElementById("activos").value;
                // document.getElementById("activos"). value = "$ " + ac;
                pa = document.getElementById("pasivos").value;
                // document.getElementById("pasivos"). value = "$ " + pa;
                totalPat = ac - pa;
                document.getElementById("patrimonio").placeholder = totalPat;
            }

    // function searchRegister(numIdenti){
    //     alert("Hello! I am an alert box!" + numIdenti);
    // }
</script>
