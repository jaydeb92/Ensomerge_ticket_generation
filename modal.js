var modalBtns = [...document.querySelectorAll(".btn")];
modalBtns.forEach(function(btn){
  btn.onclick = function() {
    console.log('hala kela');
    var modal = btn.getAttribute('data-modal');
    document.getElementById(modal).style.display = "block";
  }
});

var closeBtns = [...document.querySelectorAll(".closex")];
closeBtns.forEach(function(btn){
  btn.onclick = function() {
    var modal = btn.closest('#myModalx');
    modal.style.display = "none";
  }
});

window.onclick = function(event) {
  if (event.target.className === "modalx") {
    event.target.style.display = "none";
  }
}

$(document).ready(function(){
       
    $(document).on('click', '#myBtnx', function(){
        console.log('hala madrid');
       var user_id = $(this).attr("name");
       console.log(user_id);
       $.ajax({
           url:"fetch_single.php",
           method:"POST",
           data:{user_id:user_id},
           dataType:"json",
           success:function(data)
           {
               // $('.modal').modal('show');
               // $('#first_name').val(data.first_name);
               $('#emails').text(data.email);
               $('#GST').text(data.GST);
               $('#GSTIN').text(data.GSTIN);
               $('#address').text(data.address);
               $('#phones').text("9809987653");
               $('#modalx-text').text(data.company);
               $('#user_id').val(user_id);
               // $('#user_uploaded_image').html(data.user_image);
               // $('#action').val("Edit");
               // $('#operation').val("Edit");
           }
       })
   });
   
   
});