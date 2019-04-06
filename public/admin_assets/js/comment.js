//adding comment dynamically
$(document).ready(function(){
  var url='/comments/';
  var post_id=$('meta[name=postid]').attr("content");

  var comment="";

  //onclik function
  $('.csb').click(function(){
    comment=$('.cst').val();
    addComment(post_id,url,comment);
  });

  //update comment ui
  function updateComment(data) {
    var newComment="<tr><td>"+data+"</td></tr>";
    $("#commentsTable tbody").append(newComment);
    $('.cst').val("");
  }

  //push comment to db
  function addComment(id,url,comment){
    //updateComment(comment);
    $.post( url,
          { '_token':"{{csrf_token()}}",
            'post_id':post_id,
            'comment':comment
          },
            function(data,status,jqXHR){
              if(data!=0)
                updateComment(comment);
              else {
                //alert("offensive content");
              }
              console.log(data);
            }
          )
    }
});


//handling button block for users insight
function toggleUserState() {
  var userId=$('meta[name=userid]').attr("content");
  var userStatus=$('meta[name=userstatus]').attr("content");
  var url="/admin/block/users/"+userId+"/"+userStatus;

  window.location.href = url;
}
