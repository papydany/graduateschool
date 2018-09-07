$("#faculty_id").change( function() {

$("#myModal").modal();
$("#myModal").modal('hide'); 

var id =$(this).val();
//$("#lga").hide();
   $.getJSON("/depart/"+id, function(data, status){
    var $d = $("#department_id");
             $d.empty();
               $d.append('<option value="">Select Department</option>');
                $.each(data, function(index, value) {
                    $d.append('<option value="' +value.id +'">' + value.name + '</option>');
                });
                
    });
$("#myModal").modal('hide');	

});
//  assign deparment.
$("#faculty").change( function() {

$("#myModal").modal();
$("#myModal").modal('hide'); 
var id =$(this).val();
//$("#lga").hide();
   $.getJSON("/getassigndepartment/"+id, function(data, status){
    var $d = $("#department");
             $d.empty();
               $d.append('<option value="">Select Department</option>');
                $.each(data, function(index, value) {
                    $d.append('<option value="' +value.id +'">' + value.name + '</option>');
                });
                
    });
$("#myModal").modal('hide'); 

});

$("#department_id").change( function() {
 $("#myModal").modal(); 
var id =$(this).val();
  $.getJSON("/fos/"+id, function(data, status){   
  var $d = $("#aos_id"); 
  $d.empty();
    $.each(data, function(index, value) {
    	$d.append('<p>');
                    $d.append('<input type="checkbox" name="aos_id[]"  value="'+value.id +'"> '+ value.name);
                    $d.append('</p>');
                });
               
                   });
$("#myModal").modal('hide'); 
});

//  assign deparment.
$("#d_id").change( function() {
$("#myModal").modal();
$("#myModal").modal('hide'); 
var id =$(this).val();
//$("#lga").hide();
   $.getJSON("/getassignaos/"+id, function(data, status){
    var $d = $("#aos");
             $d.empty();
               $d.append('<option value="">Select AOS</option>');
                $.each(data, function(index, value) {
                    $d.append('<option value="' +value.id +'">' + value.name + '</option>');
                });
                
    });
$("#myModal").modal('hide'); 

});



$("#f_id").change( function() {

$("#myModal").modal();
$("#myModal").modal('hide'); 

var id =$(this).val();
//$("#lga").hide();
   $.getJSON("/getdepart/"+id, function(data, status){
    var $d = $("#dept_id");
             $d.empty();
               $d.append('<option value="">Select Department</option>');
                $.each(data, function(index, value) {
                    $d.append('<option value="' +value.id +'">' + value.name + '</option>');
                });
                
    });
$("#myModal").modal('hide'); 

});

$("#dept_id").change( function() {
$("#myModal").modal();
var id =$(this).val();

   $.getJSON("/getaos/"+id, function(data, status){
    var $d = $("#aos");
             $d.empty();
               $d.append('<option value="">Select AOS</option>');
                $.each(data, function(index, value) {
                    $d.append('<option value="' +value.id +'">' + value.name + '</option>');
                });
                
    });


});

// students select all
$("#all_ids").change(function(){  //"select all" change 
    var status = this.checked; // "select all" checked status
    $('.ids').each(function(){ //iterate all listed checkbox items
        this.checked = status; //change ".checkbox" checked status
    });
});
// course select all
$("#all_idc").change(function(){  //"select all" change 
    var status = this.checked; // "select all" checked status
    $('.idc').each(function(){ //iterate all listed checkbox items
        this.checked = status; //change ".checkbox" checked status
    });
});

