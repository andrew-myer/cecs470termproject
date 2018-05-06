function setBackground(e){
if(e.type=="focus"){
  e.target.style.backgroundColor = "#FFE393";
}
else if (e.type == "blur"){
  e.target.style.backgroundColor="white";
}
}

function subCheck(){
  var reqSelector=document.getElementsByClassName("required");
  var error=true;
  for(var i=0;i<reqSelector.length;i++)
  {
    if(reqSelector[i].value=="")
    {
      reqSelector[i].classList.add("error1");
      error=false;
    }
    else {
      reqSelector[i].setAttribute("class","required");
    }
  }
  return error;
}

window.addEventListener("load",function(){
  var selector = ".hilightable";
  var fields = document.querySelectorAll(selector);
  for(var i=0; i<fields.length;i++)
  {
    fields[i].addEventListener("focus", setBackground);
    fields[i].addEventListener("blur", setBackground);
  }
})
