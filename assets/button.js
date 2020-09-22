
$( document ).ready(function(){
   for(var i = 1; i<=10 ; i++){
          $("#mandatory"+(i+1)+" #owner").attr('name',"owner"+(i+1));
        }
});
