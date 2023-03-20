@extends('auth.layout.app')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<main class="mdl-layout__content mdl-color--grey-100">
 <style>
    .modal-backdrop.in {
    filter: alpha(opacity=50);
    opacity: 0; 
}
 </style> 
  
<div class="container">
	<div class="row">
		
        
        <div class="col-md-12">
          <a href="{{ url('create-author') }}" class="btn btn-primary" style="float:right">Add Author</a>
        <h4>Author List </h4>
      <div id="table" style="width: 100%;"></div>
            
        </div>
	</div>
</div>
</main> 
<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">User Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="#" method="post">
        @csrf
        <input type="hidden" name="user_id" id="user_id">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
        
    </div>    
    <div class="form-group">
        <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="mobile">Mobile</label>
    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
  </div>
  <div class="form-group">
    <label for="state">State</label>
    <input type="text" class="form-control" id="state" name="state" placeholder="State">
  </div>
  <div class="form-group">
    <label for="city">City</label>
    <input type="text" class="form-control" id="city" name="city" placeholder="City">
  </div>
  <div class="form-group">
    <label for="address">Address</label>
    <input type="text" class="form-control" id="address" name="address" placeholder="Address">
  </div>
  <div class="form-group">
    <label for="zip">Zip Code</label>
    <input type="text" class="form-control" id="zip" name="zip_code" placeholder="Zip Code">
  </div>
  <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
</form>
      </div>
    </div>
  </div>
</div>
<!-- Delete  Modal -->
<div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5><b> Are You Sure Delete This User </b></h5>
        <form action="#" method="post">
            @csrf
            <input type="hidden" name="delete_id" id="delete_id">
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Delete</button>
      </div>
        </form>    
      </div>
     
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-body p-3">
      <h4 class="text-center">Do you want to delete your record ?</h4>
      </div>
      <form id="register_form">
        <input type="hidden" name="delete_id" id="delete_id">
        <div class="d-flex justify-content-center">   
          <button type="submit" class="btn save-btn btn btn-danger mr-2" class="view-all-btn-border">Delete</button>
<button type="button" class="view-all-btn-border p-1 btn btn-secondary"  data-dismiss="modal">Cancel</button>
       
           
       </div>

       <span id="success_message" class="text-success text-center"></span>
      </form>
    </div>
  </div>
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
   $('document').ready(function() {
    //alert('okk');
            var sendInfo = {
        orderBy: "id",
        direction: "ASC",
        limit: "12",
        page: "1"
      };
        var accesstoken = localStorage.getItem('access_token')??'';
        $.ajax({
            url: "{{ url('https://symfony-skeleton.q-tests.com/api/v2/authors') }}",
            method:"GET",
            data: JSON.stringify(sendInfo),
            dataType: "json",
            contentType:"application/json",
            headers: {
            "Authorization" : "Bearer "+ accesstoken
        },
            success: function(response) {
                var temp = "";
            var i=1;
            temp+="<table class='table float-left' style='width: 100%;' id='example' cellpadding='3' cellspacing='1' border='0'>";
            temp+="<thead>";
            temp+="<tr>";
            temp+="<th scope='col'>S.No</th>";
            temp+="<th scope='col'>First name</th>";
            temp+=" <th scope='col'>Last name</th>";
            temp+=" <th scope='col'>Birthday</th>";
            temp+=" <th scope='col'>Gender</th>";
            temp+="  <th scope='col'>Birth Place</th>";
            temp+="  <th scope='col'>Action</th>"
            temp+=" </tr>";
            temp+="  </thead>";
            temp += "<tbody>";
            response.items.forEach((itemData) => {
            temp += "<tr >";
            temp += "<td>" + i++ + "</td>";
            temp += "<td>"+itemData.first_name+"</td>";
            temp += "<td>"+itemData.last_name+"</td>";
            var birth_date = itemData.birthday.split("T");
            temp += "<td>"+birth_date[0]+"</td>";
            temp += "<td>" + itemData.gender + "</td>";
            temp += "<td>" + itemData.place_of_birth + "</td>";
            temp += "<td>" + "<a href='view-author/"+itemData.id+"' class='btn btn-success'>" + "View" + "<i class='bi bi-pen'>"+"</i>" + "</a>" + "<a href='edit-author/"+itemData.id+"' class='btn btn-primary'>" + "Edit" + "<i class='bi bi-pen'>"+"</i>" + "</a>" + "<a href='#' class='btn btn-danger' onclick='DeleteAuthor("+itemData.id+")'>" + "Delete" + "<i class='bi bi-pen'>"+"</i>" + "</a>" +  "</td>"; 
            temp +=  "</tr>";
          });
          temp+="</tbody>";
            temp+="</table>";
        
          document.getElementById('table').innerHTML = temp;  
            },
            error: function (request, status, error) {
          
                alert("error");
            }
        });
    });
    function DeleteAuthor(id){
        $.ajax({
            url: 'https://symfony-skeleton.q-tests.com/api/v2/authors/'+id,
            method:"DELETE",
            dataType: "json",
            contentType:"application/json",
            headers: {
            "Authorization" : "Bearer "+ accesstoken
        },
            success: function(data) {
                alert("delete successfull"); 
                location.reload();
            },
            error: function (request, status, error) {
          
                alert("error");
            }
        });
    }
</script>
@endsection    