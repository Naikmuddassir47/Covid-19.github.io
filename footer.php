<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">


</script>
<script type="text/javascript" src="https://raw.github.com/harvesthq/chosen/master/chosen/chosen.jquery.js"></script>


<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.jquery.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>






<script>
    $(document).ready(function() {


        $('#myTable').DataTable();
        $('#uTable').DataTable();
        $('#catTable').DataTable();
        $('.chosen-select').chosen();

        $('#fewrecordsTable').DataTable( {
        "paging":   false,
        "sDom": false,
        "info":     false,
        
    } );


        $(".history").click(function() {
            var id = $(this).attr("history");
            $.ajax({
                url: "a_history.php",
                data: {
                    id: id
                },
                dataType: "HTML",
                type: "POST",
                success: function(res) {
                    $("#history_form .modal-body").html(res);
                    $("#hisTable").DataTable();
                }
            });
        });


        $(".u-history").click(function() {
            var id = $(this).attr("u_history");
            $.ajax({
                url: "u_history.php",
                data: {
                    id: id
                },
                dataType: "HTML",
                type: "POST",
                success: function(res) {
                    $("#u_history_form .modal-body").html(res);
                    $("#U_Table").DataTable();
                }
            });
        });




        $(".asset-assign").click(function() {
            var id = $(this).attr("assign");

            $.ajax({

                url: "assign.php",
                data: {
                    id: id
                },
                dataType: "HTML",
                type: "POST",
                success: function(res) {
                    $("#assign_form .modal-body").html(res);
                }

            });


        });




        $(document).on('click', '.all-data', function() {

            var id = $(this).attr('my-id');

            $.ajax({

                url: "asset_detail.php",
                data: {
                    id: id
                },
                dataType: "HTML",
                type: "POST",
                success: function(modal) {
                    $('#asset_detail .modal-body').html(modal);

                }

            });




        });



    });

    $(document).ready(function(){
        $("input[type='radio']").change(function(){
        if($(this).val()=="Yes")
        {
        $("#amcprovider").show();
        }
        else
        {
        $("#amcprovider").hide();
        }
        });
    });


    $(document).ready(function(){
        $("input[type='radio']").change(function(){
        if($(this).val()=="Yes")
        {
        $("#ITamcprovider").show();
        }
        else
        {
        $("#ITamcprovider").hide();
        }
        });
    });


    $(function () {
    $('[data-toggle="popover"]').popover()
    })


    


</script>


</body>

</html>
