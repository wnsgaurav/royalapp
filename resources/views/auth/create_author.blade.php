@extends('auth.layout.app')
@section('content')
<main class="mdl-layout__content mdl-color--grey-100">
  <div class="mdl-grid demo-content">
  <div class="col-6">
  <form id="form">
    @csrf
    <h5>Add Author</h5>
  <div class="form-row col-12">
  <div class="form-group col-md-6">
      <label for="first_name">First_name</label>
      <input type="text" class="form-control" id="first_name" name="first_name" value="">
      
       
    </div>
    <div class="form-group col-md-6">
      <label for="last_name">Last Name</label>
      <input type="text" class="form-control" id="last_name" name="last_name" value="">
     
    </div>
    
  </div>
  <div class="form-row col-12">
  <div class="form-group col-md-6">
      <label for="birthday">birthday</label>
      <input type="date" class="form-control" id="birthday" name="birthday" value=""> 
     
    </div>
    <div class="form-group col-md-6">
      <label for="biography">biography</label>
      <input type="text" class="form-control" id="biography" name="biography" value=""> 
     
    </div>
    <div class="form-group col-md-6">
      <label for="gender">Gender</label>
      <select id="gender" class="form-control" name="gender">
        <option>Choose Gender</option>
        <option value="male">Male</option>
        <option value="female">FeMale</option>
      </select>
     
    </div>
    
  </div>
  <div class="form-group">
    <label for="place_of_birth">Birth Place</label>
    <input type="text" class="form-control" id="place_of_birth" placeholder="1234 Main St" name="place_of_birth" value="">
   
  </div>
  
  <button type="button" name="button" class="btn btn-primary" id="add_author">add</button>
</form>
</div>

</div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
   $(document).on('click', '#add_author', function() {
          place_of_birth=$('#place_of_birth').val();
            first_name=$('#first_name').val();
            last_name=$('#last_name').val();
            gender=$('#gender').val();
            biography=$('#biography').val();
            birthday=$('#birthday').val();
            var sendInfo = {
         place_of_birth: place_of_birth,
         first_name: first_name,
         gender:gender,
         last_name: last_name,
         biography: biography,
         birthday:birthday
      };
        var accesstoken = localStorage.getItem('access_token')??'';
        $.ajax({
            url: "{{ url('https://symfony-skeleton.q-tests.com/api/v2/authors') }}",
            method:"POST",
            data: JSON.stringify(sendInfo),
            dataType: "json",
            contentType:"application/json",
            headers: {
            "Authorization" : "Bearer "+ accesstoken
        },
            success: function(data) {
                location.href = 'author_list'; 
            },
            error: function (request, status, error) {
          
                alert("error");
            }
        });
    });
</script>
@endsection