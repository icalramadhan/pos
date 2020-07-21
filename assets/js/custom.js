// on change is_active user
$(document).ready(function() {
    //set initial state.
    // $('#textbox1').val(this.checked);

    $('.checkbox').change(function() {
        // alert("test");
        // if(this.checked) {
            // var returnVal = confirm("Are you sure?");
            // $(this).prop("checked", returnVal);
            let id = $(this).attr( "data");
            let status = $(this).attr( "active");
            var post = {
                status: status,
                id: id
            };
            // if(returnVal) {
                $.post( BASE_URL + "user/update_status", post, function( data ) {
                    // $( ".result" ).html( data );
                    location.reload();
                    console.log(data);
                });
            // }
        // }
        // $('.textbox').val(this.checked);        
    });
});