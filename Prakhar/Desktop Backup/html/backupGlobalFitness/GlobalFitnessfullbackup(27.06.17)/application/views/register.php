<section>
<div class="container">
  <div class="row">
    <div class="col-md-12 col-sm-12">
     <div class="sign">
      <h4>Register  </h4>
     </div><!--end sign-->
    </div><!--end colm-->
  </div><!--end row-->
<form action="" method="post">
  <div class="row">
    <div class="col-md-6 col-sm-6">
      <?php 
        if(isset($error)){
          echo "<span class='spanerror'>".$error."</span>";
        } 
      ?>
        <div class="form-group">
        <label for="usr" class="name_lab"> User Name:</label>
         <input type="text" required name="username" class="form-control" id="usr">
        </div>

        <div class="form-group">
        <label for="usr" class="name_lab"> First Name:</label>
         <input type="text" required name="first" class="form-control" id="usr">
        </div>
        <div class="form-group">
        <label for="usr" class="name_lab">Middle Name:</label>
          <input type="text" required  name="middle" class="form-control" id="pwd">
        </div>
        <div class="form-group">
        <label for="usr" class="name_lab">Last Name</label>
         <input type="text"  required name="last" class="form-control" id="usr">
        </div>
        <div class="form-group">
        <label for="usr" class="name_lab">Email</label>
        <input type="email" required  name="email" class="form-control" id="usr">
        </div>

        <div class="form-group">
        <label for="pwd" class="name_lab">Password</label>
        <input type="password" required name="password"  class="form-control" id="usr">
        </div>

        <div class="radio">
          <label class="name_lab">Mr</label>
          <input type="radio" checked value="Mr"  name="title">
            <label class="name_lab1">Mrs</label>
          <input type="radio" value="Mrs" name="title">
        </div>     
    </div><!--end of colm-->


      <!--  <div class="col-md-6 col-sm-6">


       <div class="form-group">
        <label for="usr" class="name_lab"> First Name:</label>
         <input type="text" required name="first" class="form-control" id="usr">
          </div>
       <div class="form-group">
        <label for="usr" class="name_lab">Middle Name:</label>
          <input type="password" required name="middle" class="form-control" id="pwd">
      </div>
       <div class="form-group">
        <label for="usr" class="name_lab">Last Name</label>
         <input type="text" required name="last" class="form-control" id="usr">
          </div>
        <div class="form-group">
        <label for="usr" class="name_lab">Email</label>
         <input type="email" required nmae="email" class="form-control" id="usr">
          </div>

        <div class="form-group">
        <label for="pwd" class="name_lab">Password</label>
         <input type="password" required class="form-control" id="usr">
        </div>


  
    </div>-->
  </div>
  <div class="row">
  <div class="col-md-12 col-sm-12">
            <div class="form-group">        
         <input type="submit"  value="Submit" class="rgistr">
        </div>
  </div><!--end of colm-->
</div><!--end of row-->
</form>
<div class="clear"></div>
</div><!--end of container-->
</section>