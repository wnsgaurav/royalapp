@extends('auth.layout.app')
@section('content')
<main class="mdl-layout__content mdl-color--grey-100">
  <div class="mdl-grid demo-content">
  <div class="col-6">
     <input type="hidden" value="{{ $id }}" id="author" name="author">
     <h3 id="first_name" class="float-center"></h3>
      <div id ="details"></div>
      
     <h4> Books - </h4> 
     <div id="books"></div>
    

</div>

</div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
   $('document').ready(function(){
    author = $('#author').val();
      var accesstoken = localStorage.getItem('access_token')??'';
        $.ajax({
            url:'https://symfony-skeleton.q-tests.com/api/v2/authors/'+author,
            method:"GET",
            dataType: "json",
            contentType:"application/json",
            headers: {
            "Authorization" : "Bearer "+ accesstoken
          },
            success: function(data) {
              var tempDetails = "";
               var dateFormateV = data.birthday.split('T'); 
              tempDetails += "<h6> Birth Date - "+dateFormateV[0]+"</h6>"; 
                tempDetails += "<h6> Gender - "+data.gender+"</h6>";
                 tempDetails += "<h6> Place Of Birth - "+data.place_of_birth+"</h6>";
              first_name=$('#first_name').text(data.first_name + " " + data.last_name);
              var temp = "";
              data.books.forEach((itemData) => {
                temp += "<h5>Title -"+ itemData.title +"</h5>"
                temp+="<h6> Release Date - "+itemData.release_date.split("T")[0]+"</h6>";
                temp+="<h6> Isbn - "+itemData.isbn+"</h6>";
                temp+="<h6> Format - "+itemData.format+"</h6>";
                temp+="<h6> Description - "+itemData.description+"</h6>";
                temp+="<h6> Number of pages - "+itemData.number_of_pages+"</h6>";
                temp += "<hr>";
              }); 
              document.getElementById('books').innerHTML = temp;
              document.getElementById('details').innerHTML = tempDetails;

              
            },
            error: function (request, status, error) {
          
                alert("Error");
            }
        });
   });
</script>
@endsection