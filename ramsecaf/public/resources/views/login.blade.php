<!DOCTYPE html>
<html>
    
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</head>

<body>
@include('sweetalert::alert')
	<section class="vh-100" style="background-color: #0600FF;">
		<div class="container py-5 h-100">
		  <div class="row d-flex justify-content-center align-items-center h-100">
			<div class="col-12 col-md-8 col-lg-6 col-xl-5">
			  <div class="card shadow-2-strong" style="border-radius: 1rem;">
				<div class="card-body p-5 text-center">
					<h3><img src="images/RAMSECAFNOTEXT.png" alt=""></h3>
	  
				  <h3 class="mb-5">Sign in with Office 365</h3>
	  			  <form novalidate class="needs-validation" method="post" enctype="multipart/form-data" action="{{url('userlogin')}}">
				  @csrf
				  <div class="form-outline mb-4">
					<input type="email" name="email" id="email" class="form-control form-control-lg" required/>
					<label class="form-label" for="email">Email</label>
				  </div>
	  
				  <div class="form-outline mb-4">
					<input type="password" name="password" id="password" class="form-control form-control-lg" required/>
					<label class="form-label" for="password">Password</label>
				  </div>
	  				
				  <!-- Checkbox -->
				  <!-- <div class="form-check d-flex justify-content-start mb-4">
					<input class="form-check-input" type="checkbox" value="" id="form1Example3" />
					<label class="form-check-label" for="form1Example3">  Remember password </label>
				  </div> -->
				  <a href="#policy" data-bs-toggle="modal" data-bs-target="#policy" class="btn btn-primary btn-lg btn-block">Login</a>
				  <div class="modal fade" id="policy" tabindex="-1" aria-labelledby="policyLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-4" id="exampleModalLabel"> Data Privacy Notice: </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>


          <div class="modal-body fs-6">
			<p>APC collects and maintains personal data as part of its records management process include other purpose, if any in accordance with Republic Act 10173, or the Data Privacy Act (DPA) of 2012.</p>
           <p>For details, please refer to APC Data Privacy Policy: <a href="https://www.apc.edu.ph/privacy-policy/" target="_blank">https://www.apc.edu.ph/privacy-policy/</a></p>
          </div>


			<div class="input-group ">
			<div class="input-group-text">
			<input  type="checkbox" onclick="enablebutton(this)" class="input-group-text" id="inputGroup-sizing-sm">	
			</div>
			<input type="text" class="form-control" aria-label="Text input with checkbox" placeholder="I, comply to the data privacy notice of Asia Pacific College.">
			</div>

			
			

          <div class="modal-footer">
            <a href="{{url('/signout')}}">
              <button type="submit" class="btn btn-warning " id="button" data-bs-dismiss="modal" disabled>Okay</button>
            </a>
			<script>
			function enablebutton(checkbox){
				if(checkbox.checked){
					document.getElementById("button").disabled=false;
				}
				else{
					document.getElementById("button").disabled=true;
				}
			}
			</script>
          </div>

		  


        </div>
      </div>
    </div>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </section>
	  
	</form>



<script> 
// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
</html>
