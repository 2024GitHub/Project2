function validate() {
  var emriStd = /^[a-zA-Z]+/;
  var emri = document.getElementById("emri").value;
  if (!emriStd.test(emri)) {
    alert("Emri duhet te kete vetem karaktere");
    document.getElementById("emri").focus();
  }
}

function validate1() {
  var passw = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{6,12})/;
  var pass = document.getElementById("pass").value;
  if (!passw.test(pass)) {
    alert(
      "Passwordi duhet te mbaje shkronja te medha, te vogla, karaktere special dhe numra.Kujdes: Lejohen 6 deri ne 12 karaktere"
    );
    document.getElementById("pass").focus();
  }
}

function validate2() {
  var EmailStd = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
  var email = document.getElementById("email").value;
  if (!EmailStd.test(email)) {
    alert("Vendosni emailin sipas formatit te duhur");
    document.getElementById("email").focus();
  }
}

function validate3() {
  var mbiemriStd = /^[a-zA-Z]+/;
  var mbiemri = document.getElementById("mbiemri").value;
  if (!mbiemriStd.test(mbiemri)) {
    alert("Mbiemri juaj duhet te kete vetem karaktere");
    document.getElementById("mbiemri").focus();
  }
}

function validate4() {
  var numriStd = /^\+?([0-9]{3})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{5})$/;
  var numri = document.getElementById("numriTel").value;
  if (!numriStd.test(numri)) {
    alert("Plotesoni numrin ne formatin : +355-xxxx-xxxxx");
    document.getElementById("numriTel").focus();
  }
}

function validate5() {
  var atesiaStd = /^[a-zA-Z]+/;
  var atesia = document.getElementById("atesia").value;
  if (!atesiaStd.test(atesia)) {
    alert("Plotesoni formen vetem me karaktere");
    document.getElementById("atesia").focus();
  }
}

function validate6() {
  var vitiStd = /^([0-9]{4})[_]?([0-9]{4})$/;
  var viti = document.getElementById("viti").value;
  if (!vitiStd.test(viti)) {
    alert("Plotesoni formen ne formatin viti_viti");
    document.getElementById("viti").focus();
  }
}
