# clinicalTestingWebsite
 Standalone repo to see if that clears up errors

 <!DOCTYPE html>
<html>
<body>

<h2>JavaScript Confirm Box</h2>

<h2> All questions and answers </h2>


<button onclick="myFunction()">Automatically Mark Answers</button>

<p id="demo"></p>

<script>
function myFunction() {
  var txt;
  if (confirm("Answer's have been automatically marked")) {
  	if ($painScore >= 5)
    {
    	 txt = "Pain Score is above 5. Monitor patient for 30min"
    }
  }
  document.getElementById("demo").innerHTML = txt;
}
</script>

</body>
</html>
