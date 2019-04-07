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
function toggleContentState(type,id,status) {
  var url="/admin/block/"+type+"/"+id+"/"+status;
  console.log(url);
  window.location.href = url;
}


//user insight
var ctx = $('#userInsightRadar');

var myRadarChart = new Chart(ctx, {
    type: 'pie',
    data:{
          labels: ['Positive','negative','neutral'],
          datasets: [{
                data:JSON.parse($('meta[name=usersentiment]').attr("content")),
                backgroundColor: ['#4bc0c0','#ff6384','#36a2eb']
          }]
        },
    options: {
        rotation: 1 * Math.PI,
    }
});
