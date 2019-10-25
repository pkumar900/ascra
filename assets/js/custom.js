

function delete_data(url,id) {
    swal({
        title: "Are you sure?",
        text: "You will not be able to recover this file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel ",
        closeOnConfirm: false,
        closeOnCancel: false
    }, function (isConfirm) {
        if (isConfirm) {
              jQuery.ajax({
              type: 'POST',
                  url: url,
                  data: {id: id},
                  success: function (data) {
                    if(data.trim()=='1')
                    {

                       swal("Deleted!", "Your file has been deleted.", "success");
                       $("#row" + atob(id)).remove();
                      
                    }
                    else
                    {
                       swal("Oops!", "Some thing went wrong.", "error");
                    }
                    
                      
                      
                  },
                  error: function (e) {
//                                $("#loading").hide();
                      // Error
                  }
              });
           
        } else {
            swal("Cancelled", "Your file is safe :)", "error");
        }
    });
}
$("#school").validate({
  rules: {
    name: {
      required: true,
      // step: 10
    },
   
  },
  errorPlacement: function (error, element) {
    if (element.prop("type") == "text") {
      error.insertAfter($(element).parent('div'));
    } 
  }
});

$("#course").validate({
  rules: {
    name: {
      required: true,
      // step: 10
    },
   
  },
  errorPlacement: function (error, element) {
    if (element.prop("type") == "text") {
      error.insertAfter($(element).parent('div'));
    } 
  }
});


$("#school_course").validate({

  rules: {
    school_id: {
      required: true,
      // step: 10
    },
    course_id: {
      required: true,
    },
    
  },
  errorPlacement: function (error, element) {
    if (element.prop("type") == "text") {
      error.insertAfter($(element).parent('div'));
    } 
    else if (element.prop("type") == "select-one") {
      error.insertAfter($(element).parent('div'));
    } 
  }
});

