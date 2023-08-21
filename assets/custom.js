jQuery( document ).ready(function() {
    jQuery('.alert button.alert_close').click(function(){
        jQuery('.container-fluid.custom_cont.alert').hide();
       localStorage.setItem('notification','alert_seen');
    });
    var check = localStorage.getItem('notification');
    if(check == 'alert_seen'){
        console.log('Already seen');
    } else {
        console.log('Not seen');
        jQuery('.container-fluid.custom_cont.alert').show();
    }

    var checkCloseX = 0;
        $(document).mousemove(function (e) {
            if (e.pageY <= 5) {
                checkCloseX = 1;
            }
            else { checkCloseX = 0; }
        });

        window.onbeforeunload = function (event) {
            if (event) {
                if (checkCloseX == 1) {

                    //alert('1111');
                    localStorage.removeItem('notification');
                }
            }
        };

});
