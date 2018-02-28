<?php /* Template Name: Contact Us */?>
<?php get_header()?>


<div id="primary">
	<div id="content" role="main">
	

	
		<form id="contact_us" onSubmit="submitform()">
			<input type="text" name="firstname" id="firstname" rows="1" value="" placeholder="First Name" /><input type="button" name="firstButton" id="firstButton" value="Continue" onClick="display2()" />
			
			<input type="text" name="lastname" id="lastname" rows="1" value="" placeholder="Last Name" style="display: none"/><input type="button" name="secondButton" id="secondButton" value="Continue" style="display: none" onClick="display3()" />
			
			<input type="email" name="email" id="email" rows="1" value="" placeholder="Email" style="display: none"/>
			<input type="button" name="lastButton" id="lastButton" value="Continue" style="display: none" onClick="display4()"/>
			
			<textarea name="message" id="message" style="display: none"></textarea>
			
			<input type="submit" name="submit" id="submit" value="Submit" style="display: none"/>
		</form>
	</div>
</div>


<script>
	
	function display2() {
		document.getElementById("lastname").style.display = "inline-block";
		document.getElementById("secondButton").style.display = "inline-block";
		document.getElementById("firstname").style.display = "none";
		document.getElementById("firstButton").style.display = "none";
	}
	function display3() {
		document.getElementById("email").style.display = "inline-block";
		document.getElementById("lastButton").style.display = "inline-block";
		document.getElementById("lastname").style.display = "none";
		document.getElementById("secondButton").style.display = "none";
	}
	function display4() {
		document.getElementById("message").style.display = "inline-block";
		document.getElementById("submit").style.display = "inline-block";
		document.getElementById("email").style.display = "none";
		document.getElementById("lastButton").style.display = "none";
	}
	function submitform() {
		var name, x;
		x = document.getElementById("contact_us");
		name = x.elements["firstname"].value;
		alert("Thank you, " + name + ", for filling out the form!");
	}
	
</script>
<?php get_footer()?>

