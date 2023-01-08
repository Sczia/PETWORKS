@extends('Petworks.admin.index')
@section('tab-title')
    Change Password
@endsection
@section('contents')


<div class="row d-flex justify-content-center">

@if (session('update'))
      <div class="alert alert-success alert-dismissible fade show w-50 d-flex justify-content-center" role="alert">
        {{ session('update') }}
      </div>
@endif


  <div class="card" style="width: 50rem;">
    <div class="card-body">
      <h5 class="card-title">Change Password</h5>
        <form action="{{ route('admin.changepass.update', Auth::guard('admin')->user()->id) }}" method="POST">
              @method('PUT')
              @csrf
                <p>Username</p>
                <input type="text" class="form-control mb-3"  id="name" name="name" value="{{ Auth::guard('admin')->user()->name }}" required>

                <p>Email</p>
                <input type="email" class="form-control mb-3"  id="email" name="email" value="{{ Auth::guard('admin')->user()->email }}" required>

                <p>Password</p>
                <input type="password" class="form-control mb-3" id="password" name="password" autocomplete="off" required>
                <p>Confirm Password</p>
                <input type="password" class="form-control mb-3" id="confirm_password" autocomplete="off" required>
                
                <input type="checkbox" onclick="myFunction()"> Show Password
        
          <div class="row">      
              <div class="col d-flex justify-content-center">
                <input type="submit" class="btn col-8 mt-3 text-white" style="background-color:#7ba0c5;" value="Save">
              </div>      
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>


<script>
var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>

<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script>
$(".alert").delay(4000).fadeOut(200, function() {
          $(this).alert('close');
});
</script>


@endsection
