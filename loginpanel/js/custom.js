function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
};
$(document).ready(function(){
    $("#phone,#pin,#prfid,#phone1").each(function(){
  $(this).keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: Ctrl+C
            (e.keyCode == 67 && e.ctrlKey === true) ||
             // Allow: Ctrl+X
            (e.keyCode == 88 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    })
  });
    $('.uploading').hide();
    $("#limages").change(function () {
        var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            alert("Only formats are allowed : "+fileExtension.join(', '));
            $("#limages").val('');
            return false;
        }
        // console.log($("#images")[0].files);
        $.each( $("#limages")[0].files, function( key, value ) {
        var si = parseFloat(value.size / 1024).toFixed(2);
        if(si>1024){
          alert('Only images less than 1MB size is allowed.');
          $("#limages").val('');
          return false;
        }
        });
    });

    $("#images").change(function () {
        var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            alert("Only formats are allowed : "+fileExtension.join(', '));
            $("#images").val('');
            return false;
        }
        // console.log($("#images")[0].files);
        $.each( $("#images")[0].files, function( key, value ) {
        var si = parseFloat(value.size / 1024).toFixed(2);
        if(si>1024){
          alert('Only images less than 1MB size is allowed.');
          $("#images").val('');
          return false;
        }
        });
    });
    // $('#images').on('change',function(){
    $('#submit').on('click',function(e){
        e.preventDefault();
        var lim = $("#limages").val();
                var im = $("#images").val();

        var category = $("#category").val();
        if (lim == '' || im == '' || category=='') {
        alert('You must provide all the requested details. Please try again');
        return false;
        }
        
        $('#multiple_upload_form').ajaxForm({
            //display the uploaded images
            // target:'#images_preview',
            beforeSubmit:function(e){
                $('.uploading').show();
            },
            success:function(e){
                $('.uploading').hide();
                $(this).closest('form').find("input[type=text],input[type=email],input[type=tel], textarea").val("");
                $("#limages").val('');
                                $("#images").val('');

                alert(e);
                location.replace("gallery.php");
                $('#myModal').modal('hide');

            },
            error:function(e){
                alert("error");
            }
        }).submit();
    });
});
function chphase(i){
    var val=$("#cphase-"+i).val();
    var val2=$('#pro_id-'+i).val();
    var val3=$('#mem_id-'+i).val();
    // alert(val);
    var dataString = 'n_phase='+ val + '&pro_id='+ val2 + '&mem_id=' + val3;
    // alert(dataString);
        $.ajax({
            type: "POST",
            url: "phase_change.php",
            data: dataString,
            cache: false,
            success: function(result){
                alert(result);
                // $('#refDiv').load(document.URL +  ' #refDiv');
                window.location.reload();
                //$(this).closest('form').find("input[type=text],input[type=email],input[type=tel], textarea").val("");
            }
        });
}
