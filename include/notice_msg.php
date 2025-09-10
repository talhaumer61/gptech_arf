<div id="show_div">
    
</div>
<script>
    $(document).ready(function(){
        $("#notice_close").click(function() {
            var staticBackdrop = $('#staticBackdrop');
            staticBackdrop.css("display", "none")
        });

        function loadNotice(){

            $.ajax({

                url : "include/notice_query.php",

                data : { 

                        flag : "true"

                        },

                success : function(data){
                    if (data != "")
                    {
                        alert(data);
                        $('#show_div').html(data); 

                    }
                }
            }); 
        }

        loadNotice();

    });
</script>
