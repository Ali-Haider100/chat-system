function validate(e,l){var t=document.getElementById(l);e.length>0&&""!=l&&("email"==l?e.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g)?t.style.color="green":t.style.color="red":"pwd"==l?e.match(/^(?=.*\d)(?=.*[@#$%^&*()_+!])(?=.*[a-z])(?=.*[A-Z]).{8,}$/g)?t.style.color="green":t.style.color="red":"ip"==l&&(e.match(/^[\d]{1,3}\.[\d]{1,3}\.[\d]{1,3}\.[\d]{1,3}$/g)?t.style.color="green":t.style.color="red"))}


  /// javascript unminify
function validate(str, abc) {
  //var str = "aABC2_"; 
  var value = document.getElementById(abc);
 if(str.length > 0 && abc != ""){
     if(abc == "email"){
       if(!str.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g)){
           value.style.color = "red";
          }else{
            value.style.color = "green";
          }
    //  }else if(abc == "pwd"){ GOOD ONE 
    //      if(!str.match(/^(?=.*\d)(?=.*[@#$%^&*()_+!])(?=.*[a-z])(?=.*[A-Z]).{8,}$/g)){
    //         value.style.color = "red";
    //       }else{
    //         value.style.color = "green";
    //       }
    //  }else if(abc == "ip"){
         if(!str.match(/^[\d]{1,3}\.[\d]{1,3}\.[\d]{1,3}\.[\d]{1,3}$/g)){
            value.style.color = "red";
          }else{
            value.style.color = "green";
          }
     }

 }
}
// url : ^http(s)?\:\/\/[^._-\W][a-zA-Z0-9-.]+[^._-\W]$  THIS IS FOR URL ..  PATTERN IS YOUR REQUIREMENT SOMETIMES ... 
// YOU CAN ADD AS MANY VALIDATIONS YOU WANT. 
