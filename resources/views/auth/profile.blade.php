@extends('auth.layout.app')
@section('content')
<main class="mdl-layout__content mdl-color--grey-100">
  <div class="mdl-grid demo-content">
  <div class="col-6">
  <form>
    @csrf
    <h5>Profile Settings</h5>
    <input type="hidden" name="user_id">
  <div class="form-row col-12">
  <div class="form-group col-md-6">
      <label for="first_name"> First Name</label>
      <input type="text" class="form-control" id="first_name" name="first_name" value="">
      
    </div>
    <div class="form-group col-md-6">
      <label for="last_name">Last Name</label>
      <input type="text" class="form-control" id="last_name" name="last_name" value="">
      
    </div>
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" id="email" name="email" value="">
     
    </div>
    
  </div>
  <div class="form-row col-12">
    <div class="form-group col-md-6">
      <label for="gender">Gender</label>
      <select id="gender" class="form-control" name="gender">
        <option>Choose Gender</option>
        <option value="male">Male</option>
        <option value="female">FeMale</option>
      </select>
      
    </div>
    
  </div>
  
  <button type="button" class="btn btn-primary">Update</button>
</form>
</div>
</div>
</main>
<script type="text/javascript">
  $('document').ready(function(){
    var response = JSON.parse(localStorage.getItem('userdata'));
        $('#gender').val(response.gender);
        $('#first_name').val(response.first_name);
        $('#last_name').val(response.last_name)
        $('#email').val(response.email);
      });
</script>
@endsection