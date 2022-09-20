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



<script>
						let comment1;
						if(painScore >= 5) {
							comment1 = 'Monitored in 30 mins!'
						} else{
							comment1 = 'Patient is fine!'
						}
						document.getElementById("painScore").innerHTML = comment1;
					</script>
					<tr>
						<td>Has the Patients Temperature increased or decreased by 2+ Degrees Celcius?</td>
						<td>
							<label>Yes/No</label>
							<input type="text" id="tempQuestion" name="tempQuestion"
								placeholder="Enter Yes/No"></input>
						</td>
					</tr>
					<script>
						let comment2;
						if(tempQuestion == 'Yes') {
							comment2 = 'Monitored in 30 mins!'
						} else{
							comment2 = 'Temperature is normal!'
						}
						document.getElementById("tempQuestion").innerHTML = comment2;
					</script>
					<tr>
						<td>Has the Patient's heart rate increased OR is it abnormal?</td>
						<td><label>Yes/No</label>
							<input type="text" id="heartRateQuestion" name="heartRateQuestion"
								placeholder="Enter Yes/No"></input>
						</td>
					</tr>
					<script>
						let comment3;
						if(hearRateQuestion == 'Yes') {
							comment3 = 'Monitored in 30 mins!'
						} else{
							comment3 = 'Heart rate is normal!'
						}
						document.getElementById("heartRateQuestion").innerHTML = comment3;
					</script>
				</table>
			</li>
			<li>
      	<label for="additionalObservationNotes">Additional Observation Notes:</label>
				<textarea id="additionalObservationNotes" name="additionalObservationNotes"
					placeholder="Enter any addtional notes about the Observation (Especially if the above Observation table is not applicable)"></textarea>
			</li>
			<li>
				<div class="buttonHolder">
					<input type="submit" value="Record Observation / Treatment">
				</div>
			</li>
	</ul>
	</form>
</body>

</html>




