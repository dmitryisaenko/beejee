$(document).ready(function() {
   $('.row-checkbox').click(function(){
     var checkbox_id = ($(this).attr('id'));
     var checkbox_status = ($(this).is(":checked"));
     $.ajax({
      url: 'table/post_ajax',
      type: "POST",
      data: {checkbox_id: checkbox_id, checkbox_status: checkbox_status},
      success: function(res){
         // $('#modal-saved').modal(show);
         $("#mes-edit").text(res).fadeIn(1000, function(){
            $("#mes-edit").delay(1000).fadeOut();
         });
      },
      error: function(){
         alert("Error");
      }
   });
   });

		

});
