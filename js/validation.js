function validateform() {
  var reName = new RegExp("^[a-zA-Z\b ]+$");
  var fname = document.forms.form1.fname.value;
  var lname = document.forms.form1.lname.value;
  if (reName.exec(fname) == null) {
    alert("Only Alphabet and spaces are allowed in First Name.");
    return false;
  }
  if (reName.exec(lname) == null) {
    alert("Only Alphabet and spaces are allowed in Last Name.");
    return false;
  }

  var rePh = /\+?(88)?0[1][356789][0-9]{8}\b/g;
  var phone = document.forms.form1.phone.value;
  if(!rePh.test(phone)) {
    alert("Enter a Bangladeshi Number");
    return false;
  }

  var reEmail = /[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}/igm;
  var email = document.forms.form1.email.value;
  if(!reEmail.test(email)) {
    alert("Enter a valid email");
    return false;
  }

  var pwd = document.forms.form1.pwd.value;
  var pwd2 = document.forms.form1.pwd2.value;
  if(pwd != pwd2) {
    alert("Password Does not Match");
    return false;
  }
  if(pwd.length < 6 || pwd.length > 20) {
    alert("Password length with in 6-20 character");
    return false;
  }

}
