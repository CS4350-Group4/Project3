function myFunction() {
	
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;
	var dataString = 'username=' + username + '&password=' + password;

	if (username == '' || password == '') 
	{
		alert("Please Fill All Fields");
	} 
	else 
	{
		$.ajax({
		type: "POST",
		url: "http://localhost:8080/api/auth",
		data: dataString,
		cache: false,
		dataType:'JSON',
			statusCode:
			{
				// ok
				200: function(){
					//alert('access granted');
					document.getElementById("message").innerHTML = "access granted";
				}
				// unauthorized
				401: function(){
					//alert('access denied')
					document.getElementById("demo").innerHTML = "access denied";
					location.href = "/register.html"
				}
			}
		});
	}
}