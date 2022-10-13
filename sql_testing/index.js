var xmlhttp;
if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
}
else{// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
xmlhttp.onreadystatechange=function(){
  if (xmlhttp.readyState==4 && xmlhttp.status==200){
      var response = JSON.parse(xmlhttp.responseText);
      var select = '<select class='dropdown'>';

      for( var index in response ){
          select = select + "<option value='"+ index +"'>"+response[index]+"</option>";
      }
      select += "</select>";
      document.getElementById("send2").innerHTML= select;
  }
};
function changeSend() {
   var selectBox = document.getElementById("sender");
   var selectedValue = selectBox.options[selectBox.selectedIndex].value;
   if (selectedValue===0) {
       xmlhttp.open("GET","yourFile.php",true);
       xmlhttp.send();
   } 
   else { 
     $('#send2').html('');
   }
}