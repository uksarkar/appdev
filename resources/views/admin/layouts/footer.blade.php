<!-- CoreUI and necessary plugins-->
<script src="{{ asset("vendors/jquery/js/jquery.min.js") }}"></script>
<script src="{{ asset("vendors/popper.js/js/popper.min.js") }}"></script>
<script src="{{ asset("vendors/bootstrap/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("vendors/pace-progress/js/pace.min.js") }}"></script>
<script src="{{ asset("vendors/perfect-scrollbar/js/perfect-scrollbar.min.js") }}"></script>
<script src="{{ asset("vendors/@coreui/coreui/js/coreui.min.js") }}"></script>
@if(Route::is('home'))
    <!-- Plugins and scripts required by this view-->
    <script src="{{ asset("vendors/chart.js/js/Chart.min.js") }}"></script>
    <script src="{{ asset("vendors/@coreui/coreui-plugin-chartjs-custom-tooltips/js/custom-tooltips.min.js") }}"></script>
    <script src="{{ asset("js/main.js") }}"></script>
@endif
@if(Route::is("products.create") || Route::is("products.edit") || Route::is("users.create") || Route::is("users.edit") || Route::is("shops.create") || Route::is("shops.edit"))
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
<script>
    $(document).ready(function() {
        $("#productSub").click(function(){
            $("#SubForm").submit();
            $(this).prop("disabled", true);
        });
        let email_input = $("#login-email");
        function emailCheck() {
            let email = email_input.val();
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if(regex.test(email)) {
                email_input.removeClass('is-invalid');
                email_input.addClass('is-valid');
            }else{
                email_input.removeClass('is-valid');
                email_input.addClass('is-invalid');
            }
        }
        email_input.on('input', emailCheck);

        //submitting form from list

        $(".subbtn").click(function () {
            let subForm = $(this).data().sub;
            $('.formsub[data-sub='+subForm+']').submit();
            $(this).prop('disabled', true);
        })

        //Show and hiding price edit form

        $(".formShowBtn").click(function () {
            let editForm = $(this).data().edit;
            $("tr[data-tr="+editForm+"]").hide();
            $("tr[data-edit="+editForm+"]").fadeIn();
        })

        $(".xbtn").click(function () {
            let editForm = $(this).data().edit;
            $("tr[data-tr="+editForm+"]").fadeIn();
            $("tr[data-edit="+editForm+"]").hide();
        })

        //Generating random data on form and submit it

        $(".sButton").click(function () {
            $(this).prop('disabled', true);
            let editArea = $(this).data().info;
            let id = editArea.replace('e','');
            let amounts = $('input[data-info='+editArea+']').val();
            let description = $('textarea[data-info='+editArea+']').val();
            let form = $('#edit-form-bottom');
            form.children('input[name=amounts]').val(amounts);
            form.children('textarea[name=description]').html(description);
            form.prop('action','/price/'+id);
            form.submit();
        })

    });
</script>
