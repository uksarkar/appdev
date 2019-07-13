<!-- CoreUI and necessary plugins-->
<script src="{{ asset("vendors/jquery/js/jquery.min.js") }}"></script>
<script src="{{ asset("vendors/popper.js/js/popper.min.js") }}"></script>
<script src="{{ asset("vendors/bootstrap/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("vendors/pace-progress/js/pace.min.js") }}"></script>
<script src="{{ asset("vendors/perfect-scrollbar/js/perfect-scrollbar.min.js") }}"></script>
<script src="{{ asset("vendors/@coreui/coreui/js/coreui.min.js") }}"></script>
<!-- Plugins and scripts required by this view-->
<script src="{{ asset("vendors/chart.js/js/Chart.min.js") }}"></script>
<script src="{{ asset("vendors/@coreui/coreui-plugin-chartjs-custom-tooltips/js/custom-tooltips.min.js") }}"></script>
<script src="{{ asset("js/main.js") }}"></script>
@if(Route::is("products.create") || Route::is("products.edit") || Route::is("users.create") || Route::is("users.edit"))
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });

        $(document).ready(function(){
            $("#deletesubmit").click(function(e){
                e.preventDefault();
                $(this).prop('disabled', true);
                $("#deleteform").submit();
            });
            $("form").submit(function(e) {
                // submit more than once return false
                $(this).submit(function(e) {
                    e.preventDefault();
                });
                // submit once return true
                $(".submitButton").prop('disabled', true);
            });
        });
    </script>
@endif
@if(Route::is("products.show") || Route::is("products.index"))
    <script>
        $(document).ready(function() {
            $(".subbtn").click(function(){
                $(".formsub").submit();
                $(this).prop("disabled", true);
            });
        });
    </script>
@endif
