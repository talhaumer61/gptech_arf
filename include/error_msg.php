<?php
//---------------------------------------------------
if(isset($_SESSION['msg'])) { 
    echo'
    <script>
        $().ready(function() 
        {
            toastr.options = 
            {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": true,
                "positionClass": "toast-bottom-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": 300,
                "hideDuration": 1000,
                "timeOut": 5000,
                "extendedTimeOut": 1000,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            } 

              '.$_SESSION['msg']['status'].'
        }); 
    </script>';
    unset($_SESSION['msg']);
}
//---------------------------------------------------
?>