@extends('auth.layout.app')
@section('content')
<main class="mdl-layout__content mdl-color--grey-100">
  <div class="mdl-grid demo-content">
  <div class="col-6">
  <form id="form">
    @csrf
    <h5>Edit Book</h5>
  <div class="form-row col-12">
     <input type="hidden" value="{{ $id }}" id="book" name="book">
    <div class="form-group col-md-6">
      <label for="title">title</label>
      <input type="text" class="form-control" id="title" name="title">
     
    </div>
    
  </div>
  <div class="form-row col-12">
  <div class="form-group col-md-6">
      <label for="release_date">release_date</label>
      <input type="date" class="form-control" id="release_date" name="release_date"> 
     
    </div>
    <div class="form-group col-md-6">
      <label for="isbn">isbn</label>
      <input type="isbn" class="form-control" id="isbn" name="biography" value=""> 
     
    </div>
    <div class="form-group col-md-6">
      <label for="author">author</label>
      <select id="author" class="form-control" name="author">
      
      </select>
     
    </div>
    
  </div>
  <div class="form-group">
    <label for="format">format</label>
    <input type="text" class="form-control" id="format" name="format" value="" >
   
  </div>
  <div class="form-group">
    <label for="number_of_pages">number_of_pages</label>
    <input type="number" class="form-control" id="number_of_pages"  name="number_of_pages" value="">
   
  </div>
  <div class="form-group">
    <label for="description">description</label><br>
    <textarea id="description" name="description" class-="form-control"></textarea>
   
  </div>
  <button type="button" name="button" class="btn btn-primary" id="edit_book">add</button>
</form>
</div>

</div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

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
                //alert(response);
                var temp = "";
                response.items.forEach((itemData) => {
              temp += "<option value='"+itemData.id+"'>" + itemData.first_name + "</option>";
              });
          document.getElementById('author').innerHTML = temp; 
            },
            error: function (request, status, error) {
          
                alert("error");
            }
        });
    });
    $('document').ready(function(){
    book_id = $('#book').val();
      var accesstoken = localStorage.getItem('access_token')??'';
        $.ajax({
            url:'https://symfony-skeleton.q-tests.com/api/v2/books/'+book_id,
            method:"GET",
            dataType: "json",
            contentType:"application/json",
            headers: {
            "Authorization" : "Bearer "+ accesstoken
          },
            success: function(data) {
               console.log(data);   
                title=$('#title').val(data.title);
              number_of_pages=$('#number_of_pages').val(data.number_of_pages);
              description=$('#description').val(data.description);
              isbn=$('#isbn').val(data.isbn);
              format=$('#format').val(data.format); 
              author=$('#author').val(data.author.id);  
              var dateFormateV = data.release_date.split('T');    

              $('#release_date').val(dateFormateV[0]);   
            },
            error: function (request, status, error) {
          
                alert("Error");
            }
        });
   });
   $(document).on('click', '#edit_book', function() {
          title=$('#title').val();
          book_id=$('#book').val();
          author=$('#author').val();
            number_of_pages=$('#number_of_pages').val();
            release_date=$('#release_date').val();
            alert(release_date);
            description=$('#description').val();
            isbn=$('#isbn').val();
            format=$('#format').val();
            var sendInfo = {
         author:{
          id : Number(author)
         },     
         title: title,
         release_date: release_date,
         description:description,
         format: format,
         isbn: isbn,
         number_of_pages:Number(number_of_pages)
      };
      console.log(sendInfo);
        var accesstoken = localStorage.getItem('access_token')??'';
        $.ajax({
            url: 'https://symfony-skeleton.q-tests.com/api/v2/books/'+book_id,
            method:"PUT",
            data: JSON.stringify(sendInfo),
            dataType: "json",
            contentType:"application/json",
            headers: {
            "Authorization" : "Bearer "+ accesstoken
        },
            success: function(data) {
              alert("successfull update book");
                history.back(); 
            },
            error: function (request, status, error) {
          
                alert("error");
            }
        });
    });
 

</script>
@endsection