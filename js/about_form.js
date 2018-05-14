function mySubmitFunction(){
  var e = document.getElementById('email').value;
  var re = /\S+@\S+\.\S+/;
  var s = true;
  var x = document.getElementsByClassName("required");
  for (var i = 0; i < x.length; i++) {
    if (x[i].value == "") {
      x[i].classList.add("error");
      s = false;
    }
    if (x[i].value != "" && x[i].classList.contains("error")) {
      x[i].classList.remove("error");
      s = true;
    }
  }
if(s && re.test(e)){
alert("Submitted");
}else{
alert("Please fill in all required information");
}
}
