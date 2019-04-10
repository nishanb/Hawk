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
                $('.cst').val("");
                alert("offensive content");
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
try{
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
}catch(e){
  console.log("user insight");
}



//post insights
//emotions
var ctx1=$("#postInsightRadar");
var postInsightData=JSON.parse($('meta[name=postEmotions]').attr("content"));

try{
  var postRadarChart = new Chart(ctx1, {
      type: 'radar',
      data:{
            labels: ['bored','sad','angry','happy','fear','excited'],
            datasets: [{
                  data:postInsightData
            }]
          },
  });
}catch(e){
  console.log("Radar Chart")
}

//sentiment
var postSentiment=$('#postInsightBar');
var postSentimentData=JSON.parse($('meta[name=postSentiments]').attr("content"));

try{
  var postBarChart = new Chart(postSentiment, {
      type: 'pie',
      data:{
            labels: ['Positive','negative','neutral'],
            datasets: [{
                  data:postSentimentData,
                  backgroundColor: ['#4bc0c0','#ff6384','#36a2eb']
            }]
          },
      options: {
          rotation: 1 * Math.PI,
      }
  });
}catch(e){
  console.log("Pie chart")
}
