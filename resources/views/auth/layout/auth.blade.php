<script>
    var accesstoken = localStorage.getItem('access_token')??'';
    if(accesstoken===''){
        location.href="login";
    }
    toastr='';
    $.ajax({
        url : "{{ url('https://symfony-skeleton.q-tests.com/api/v2/me') }}",
        method : "GET",
        headers: {
            "Authorization" : "Bearer "+ accesstoken
        },
        success: function(data){
            localStorage.setItem('userdata',JSON.stringify(data));
        },
        error: function(jqXHR, textStatus, errorThrown){
               location.href="login";
        }
    });
</script>