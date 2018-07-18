<script>
window.onbeforeunload = function (example) {
   example = example || window.event;
   // For IE and Firefox prior to version 4
   if (example) {
      example.returnValue = 'Are you sure you want to close the Tab?';
   }
   // For Safari
   return 'Are you sure you want to close the Tab?';
};
</script>
<section id="main-content">
  <section class="wrapper site-min-height">
 <?php if($this->session->flashdata('msg')): ?>
  <div class="alert alert-success  alert-block fade in">
              <button data-dismiss="alert" class="close close-sm" type="button">
                <i class="fa fa-times"></i>
              </button>
              <h4>
                <i class="fa fa-ok-sign"></i>
                <?php echo $this->session->flashdata('msg'); ?>
              </h4>
        </div> 
<?php endif; ?> 
    <!-- page start-->
    <section class="panel">
    <header class="panel-heading"> <?php echo $name;?>( <?php echo count($result); ?> )</header>
    <div class="panel-body">    	
      <div class="adv-table table-responsive">
        <?php echo form_open('Dashboard/UpdateValues'); ?> 
        <table cellpadding="0" cellspacing="0" border="0" class="display table table-bordered" id="hidden-table-info">
          <thead>
            <tr>
              <th>ID</th>
              <th>Carousel Title</th>
              <th>Carousel SubTitle</th>
              <th>Carousel Image Small</th>
              <th>Carousel Image Medium</th>
              <th>Carousel Image Large</th>
              <th>Carousel Image Title Atribute</th>
              <th>Carousel Hyperlink</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>                  
          	<?php     
            $counter = 1;
            foreach ($result as $products) {
               ?>
              <tr>
                <td><?php echo $counter; ?></td>
                <td><?php echo $products->CarouselTitle; ?></td>                
                <td><?php echo $products->CarouselSubTitle; ?></td>                
                <td><?php echo $products->IndexCarouselImageSmall; ?></td>                
                <td><?php echo $products->IndexCarouselImageMedium; ?></td>               
                <td><?php echo $products->IndexCarouselImageLarge; ?></td>                
                <td><?php echo $products->CarouselImageTitleAtribute; ?></td>                
                <td><?php echo $products->CarouselHyperlink; ?></td>                
                 <td class="testing" id="myreturn<?php echo $counter; ?>"><?php if($products->IsActive=="1") echo "Activated"; else echo "Deactivated"; ?></td> 
           <td><button type="button" onclick="myheavydata(<?php echo $products->id; ?>,'<?php echo $name; ?>',<?php echo $counter; ?>)" >Change Status</button> </td>           
              </tr>
            <?php 
               $counter++;
              } 
            ?>            
          </tbody>
        </table>
         </form>
      </div>
    </div>
    </section>
    <!-- page end-->
  </section>
</section>
<script type="text/javascript">
  function myheavydata(id,name,counter){
    var ids = id;    
    var nam = name;
    
 $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Dashboard/UpdateValues",
        data: "id="+ids+"&table="+name,

        success: function(dataS) {
            console.log(dataS);
            // return false;
              if(dataS == 'yellow'){
              $('#myreturn'+counter).html('Deactivated');
              }
              if(dataS == 'one')
              {
                $('.testing').html('Deactivated');
                $('#myreturn'+counter).html('Activated');           
              }
              if(dataS =='two'){
                // $('.testing').html('Activated');
                $('#myreturn'+counter).html('Deactivated');
              }
              if(dataS == 'three')
              {
                alert('Max Limit Reached');
                return false;
              }  
              if(dataS == 'yellow'){
               $('#myreturn'+counter).html('Activated');
              }
              if(dataS =='red'){  
               $('#myreturn'+counter).html('Deactivated');
              }
              if(dataS =='active'){  
               $('#myreturn'+counter).html('Activated');
              }
              if(dataS =='deactive'){  
               $('#myreturn'+counter).html('Deactivated');
              }

          },

    });

}


</script>
