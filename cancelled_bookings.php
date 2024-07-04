<?php
include('includes/checklogin.php');
check_login();
?>
<!DOCTYPE html>
<html lang="en">
<?php @include("includes/head.php");?>
<body>

  <div class="container-scroller">
    
    <?php @include("includes/header.php");?>
    
    <div class="container-fluid page-body-wrapper">
      
      
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="modal-header">
                  <h5 class="modal-title" style="float: left;">New Bookings</h5>
                </div>

                
                
              
              <div id="editData4" class="modal fade">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">View Booking details</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" id="info_update4">
                     <?php @include("view_newbooking.php");?>
                   </div>
                   <div class="modal-footer ">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>
                  
                </div>
                
              </div>
              
            </div>
            
          <div class="table-responsive p-3">
            <table class="table align-items-center table-flush table-hover" id="dataTableHover">
              <thead>
                <tr>
                 <th class="text-center"></th>
                 <th>Booking ID</th>
                 <th class="d-none d-sm-table-cell">Cutomer Name</th>
                 <th class="d-none d-sm-table-cell">Mobile Number</th>
                 <th class="d-none d-sm-table-cell">Email</th>
                 <th class="d-none d-sm-table-cell">Booking Date</th>
                 <th class="d-none d-sm-table-cell">Event Starting Time</th>
                 <th class="d-none d-sm-table-cell">Event Finish Time</th>
                 <th class="d-none d-sm-table-cell">Venue Address</th>
                 <th class="d-none d-sm-table-cell">Type of Event</th>
                 <th class="d-none d-sm-table-cell">Name of Service</th>
                 <th class="d-none d-sm-table-cell">Event Minimum Guests</th>
                 <th class="d-none d-sm-table-cell">Event Maximum Guests</th>
                 <th class="d-none d-sm-table-cell">Additional Information</th>
                 <th class="d-none d-sm-table-cell">Status</th>
                 <th class=" Text-center" style="width: 15%;">Action</th>
               </tr>
             </thead>

<tbody>
               <?php
               $sql="SELECT * from tblbooking where Status='Cancelled'";
               $query = $dbh -> prepare($sql);
               $query->execute();
               $results=$query->fetchAll(PDO::FETCH_OBJ);

               $cnt=1;
               if($query->rowCount() > 0)
               {
                foreach($results as $row)
                  {               ?>
                    <tr>
                      <td class="text-center"><?php echo htmlentities($cnt);?></td>
                      <td class="font-w600"><?php  echo htmlentities($row->BookingID);?></td>
                      <td class="font-w600"><?php  echo htmlentities($row->Name);?></td>
                      <td class="font-w600"><?php  echo htmlentities($row->MobileNumber);?></td>
                      <td class="font-w600"><?php  echo htmlentities($row->Email);?></td>
                      <td class="font-w600"><?php  echo htmlentities($row->BookingDate);?></td>
                      <td class="font-w600"><?php  echo htmlentities($row->EventStartingTime);?></td>
                      <td class="font-w600"><?php  echo htmlentities($row->EventFinishTime);?></td>
                      <td class="font-w600"><?php  echo htmlentities($row->VenueAddress);?></td>
                      <td class="font-w600"><?php  echo htmlentities($row->TypeofEvent);?></td>
                      <td class="font-w600"><?php  echo htmlentities($row->NameofService);?></td>
                      <td class="font-w600"><?php  echo htmlentities($row->EventMinimumGuests);?></td>
                      <td class="font-w600"><?php  echo htmlentities($row->EventMaximumGuests);?></td>
                      <td class="font-w600"><?php  echo htmlentities($row->AdditionalInformation);?></td>
                      <td class="font-w600">
                        <span class="badge badge-info"><?php  echo htmlentities($row->BookingDate);?></span>
                      </td>
                      <?php if($row->Status=="")
                      { 
                        ?>
                        <td class="font-w600"><?php echo "Not Updated Yet"; ?></td>
                        <?php 
                      } else { ?>
                        <td class="d-none d-sm-table-cell">
                          <span class="badge badge-info"><?php  echo htmlentities($row->Status);?></span>
                        </td>
                        <?php 
                      } ?> 
                      <td class=" text-center"><a href="#"  class=" edit_data4 btn btn-info rounded" id="<?php echo  ($row->ID); ?>" title="click to edit"><i class="mdi mdi-eye" aria-hidden="true"></i></a>
                      </td>
                    </tr>
                    <?php
                    $cnt=$cnt+1;
                  }
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
  <?php @include("includes/footer.php");?>
  
</div>

</div>

</div>

<?php @include("includes/foot.php");?>


<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.edit_data4',function(){
      var edit_id4=$(this).attr('id');
      $.ajax({
        url:"view_newbookings.php",
        type:"post",
        data:{edit_id4:edit_id4},
        success:function(data){
          $("#info_update4").html(data);
          $("#editData4").modal('show');
        }
      });
    });
  });
</script>
</body>

</html>