<header class="demo-drawer-header">
         
          <div class="demo-avatar-dropdown">
            <span class="text-capitalize" id="name"> </span>
            <div class="mdl-layout-spacer"></div>
          </div>
</header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">

          <a class="mdl-navigation__link" href="{{ url('author_list') }}"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Author List</a>
          <a class="mdl-navigation__link" href="{{ url('book-list') }}"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">people</i>Book List</a>
          <div class="mdl-layout-spacer"></div>
          <a class="mdl-navigation__link" href=""><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">help_outline</i><span class="visuallyhidden">Help</span></a>
        </nav>
 <script type="text/javascript">
  $('document').ready(function(){
    var userdata = JSON.parse(localStorage.getItem('userdata'));
        username = userdata.first_name +' '+userdata.last_name;
        name = $('#name').text(username);


      });
</script>       