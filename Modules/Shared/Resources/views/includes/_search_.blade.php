<div class="form-inline d-flex justify-content-center md-form form-sm active-purple active-purple-2 mt-2">
    <i class="fas fa-search active" aria-hidden="true" style="color: #663399"></i>
    <input class="form-control form-control-sm ml-3 w-75" id="tableSearch" type="text"
           placeholder="{{ __('shared::commons.search_here') }}"
           aria-label="Search">
</div>


@section('scripting...')
    <script>
        $(document).ready(function(){
            $("#tableSearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection


@section('styling...')
    <style>
        .active-pink-2 input.form-control[type=text]:focus:not([readonly]) {
            border-bottom: 1px solid #f48fb1;
            box-shadow: 0 1px 0 0 #f48fb1;
        }
        .active-pink input.form-control[type=text] {
            border-bottom: 1px solid #f48fb1;
            box-shadow: 0 1px 0 0 #f48fb1;
        }
        .active-purple-2 input.form-control[type=text]:focus:not([readonly]) {
            border-bottom: 1px solid #663399;
            box-shadow: 0 1px 0 0 #ce93d8;
        }
        .active-purple input.form-control[type=text] {
            border-bottom: 1px solid #663399;
            box-shadow: 0 1px 0 0 #ce93d8;
        }
        .active-cyan-2 input.form-control[type=text]:focus:not([readonly]) {
            border-bottom: 1px solid #4dd0e1;
            box-shadow: 0 1px 0 0 #4dd0e1;
        }
        .active-cyan input.form-control[type=text] {
        .active-pink-2 input[type=text]:focus:not([readonly]) {
            border-bottom: 1px solid #f48fb1;
            box-shadow: 0 1px 0 0 #f48fb1;
        }
        .active-pink input[type=text] {
            border-bottom: 1px solid #f48fb1;
            box-shadow: 0 1px 0 0 #f48fb1;
        }
        .active-purple-2 input[type=text]:focus:not([readonly]) {
            border-bottom: 1px solid #663399;
            box-shadow: 0 1px 0 0 #ce93d8;
        }
        .active-purple input[type=text] {
            border-bottom: 1px solid #663399;
            box-shadow: 0 1px 0 0 #ce93d8;
        }
        .active-cyan-2 input[type=text]:focus:not([readonly]) {
            border-bottom: 1px solid #4dd0e1;
            box-shadow: 0 1px 0 0 #4dd0e1;
        }
        .active-cyan input[type=text] {
        >>>>>>> a4aa806f2249bdbbafeb0960ea8e3a5e30d54161
        border-bottom: 1px solid #4dd0e1;
            box-shadow: 0 1px 0 0 #4dd0e1;
        }
        .active-cyan .fa, .active-cyan-2 .fa {
            color: #4dd0e1;
        }
        .active-purple .fa, .active-purple-2 .fa {
            color: #ce93d8;
        }
        .active-pink .fa, .active-pink-2 .fa {
            color: #f48fb1;
        }
    </style>
@endsection