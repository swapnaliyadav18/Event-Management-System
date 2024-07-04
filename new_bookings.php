<?php
include('includes/checklogin.php');
check_login();


include('includes/dbconnection.php');

if(isset($_POST['submit']))
{
  $bid=$_POST['bookingid'];
  $name=$_POST['name'];
  $mobnum=$_POST['contact'];
  $email=$_POST['email'];
  $edate=$_POST['eventdate'];
  $est=$_POST['est'];
  $eetime=$_POST['eetime'];
  $vaddress=$_POST['address'];
  $eventtype=$_POST['eventtype'];
  $servicename=$_POST['tblservice'];
  $minGuests=$_POST['maxGuests'];
  $maxGuests=$_POST['minGuests'];
  $addinfo=$_POST['info'];
  $bookingid=mt_rand(100000000, 999999999);

  $sql="INSERT INTO `tblbooking`(`BookingID`, `ServiceID`, `Name`, `MobileNumber`, `Email`, `EventDate`, `EventStartingtime`, `EventEndingtime`, `VenueAddress`, `EventType`, `ServiceName`, `minGuests`, `maxGuests`, `AdditionalInformation`) VALUES (:bookingid,:bid,:name,:mobnum,:email,:edate,:est,:eetime,:vaddress,:eventtype,:servicetype,:minGuests,:maxGuests,:addinfo)";
  $query=$dbh->prepare($sql);
  $query->bindParam(':bookingid',$bookingid,PDO::PARAM_STR);
  $query->bindParam(':bid',$bid,PDO::PARAM_STR);
  $query->bindParam(':name',$name,PDO::PARAM_STR);
  $query->bindParam(':mobnum',$mobnum,PDO::PARAM_STR);
  $query->bindParam(':email',$email,PDO::PARAM_STR);
  $query->bindParam(':edate',$edate,PDO::PARAM_STR);
  $query->bindParam(':est',$est,PDO::PARAM_STR);
  $query->bindParam(':eetime',$eetime,PDO::PARAM_STR);
  $query->bindParam(':vaddress',$vaddress,PDO::PARAM_STR);
  $query->bindParam(':eventtype',$eventtype,PDO::PARAM_STR);
  $query->bindParam(':servicetype',$servicename,PDO::PARAM_STR);
  $query->bindParam(':minGuests',$maxGuests,PDO::PARAM_STR);
  $query->bindParam(':maxGuests',$minGuests,PDO::PARAM_STR);
  $query->bindParam(':addinfo',$addinfo,PDO::PARAM_STR);

  $query->execute();
  $LastInsertId=$dbh->lastInsertId();
  if ($LastInsertId>0) {
    echo '<script>alert("Booking Request Has Been added.");</script>';
    echo "<script>window.location.href ='new_bookings.php';</script>";
  }
  else
  {
    echo '<script>alert("Something Went Wrong. Please try again");</script>';
  }

}

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
                   <div class="card-tools" style="float: right;">
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#AddData4" ><i class="fas fa-plus" ></i> Add Bookings
                    </button>
                  </div>    
                </div>

                
                
              
              <div id="AddData4" class="modal fade">
                <div class="modal-dialog modal-xl">
                  <div class="modal-content">
                    <div class="modal-header">
                      
                       
                      <form method="post" action="back.php" id="contactForm" name="contactForm" class="contactForm">
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label class="label" for="bookingid">Booking Id<span style="color:red">*</span></label>
                          <input type="text" class="form-control" name="bookingid" id="bookingid" placeholder="Booking Id" required="true" maxlength="10" pattern="[0-9]+" >
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="label" for="name">Name<span style="color:red">*</span></label>
                          <input type="text" class="form-control" name="name" id="name" placeholder="Name" required="true">
                        </div>
                      </div>
                      <div class="col-md-6"> 
                        <div class="form-group">
                          <label class="label" for="email">Email Address<span style="color:red">*</span></label>
                          <input type="email" class="form-control" required="true" name="email" id="email" placeholder="Email" required="true">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="label" for="name">Contact No<span style="color:red">*</span></label>
                          <input type="text" class="form-control" name="contact" required="true" maxlength="10" pattern="[0-9]+" id="contact" placeholder="contact">
                        </div>
                      </div>
                      <div class="col-md-6"> 
                        <div class="form-group">
                          <label class="label">Event Date<span style="color:red">*</span></label>
                          <input type="date" class="form-control" name="eventdate" id="eventdate" placeholder="Event Date" required="true">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="label">Event Starting Time<span style="color:red">*</span></label>
                          <div><select type="time" class="form-control" name="est" id="est" required="true" placeholder="Event Starting Time">
                            <option value="">Select Starting Time</option>
                            <option value="1 a.m">1 a.m</option>
                            <option value="2 a.m">2 a.m</option>
                            <option value="3 a.m">3 a.m</option>
                            <option value="4 a.m">4 a.m</option>
                            <option value="5 a.m">5 a.m</option>
                            <option value="6 a.m">6 a.m</option>
                            <option value="7 a.m">7 a.m</option>
                            <option value="8 a.m">8 a.m</option>
                            <option value="9 a.m">9 a.m</option>
                            <option value="10 a.m">10 a.m</option>
                            <option value="11 a.m">11 a.m</option>
                            <option value="12 p.m">12 p.m</option>
                            <option value="1 p.m">1 p.m</option>
                            <option value="2 p.m">2 p.m</option>
                            <option value="3 p.m">3 p.m</option>
                            <option value="4 p.m">4 p.m</option>
                            <option value="5 p.m">5 p.m</option>
                            <option value="6 p.m">6 p.m</option>
                            <option value="7 p.m">7 p.m</option>
                            <option value="8 p.m">8 p.m</option>
                            <option value="9 p.m">9 p.m</option>
                            <option value="10 p.m">10 p.m</option>
                            <option value="10 p.m">10 p.m</option>
                            <option value="12 a.m">12 a.m</option>
                          </select>
                        </div>
                        </div>
                      </div>
                      <div class="col-md-6"> 
                        <div class="form-group">
                          <label class="label">Event Finish Time<span style="color:red">*</span></label>
                          <select type="time" class="form-control" name="eetime"  id="eetime" required="true" placeholder="Event Finish Time">
                            <option value="">Select Finish Time</option>
                            <option value="1 a.m">1 a.m</option>
                            <option value="2 a.m">2 a.m</option>
                            <option value="3 a.m">3 a.m</option>
                            <option value="4 a.m">4 a.m</option>
                            <option value="5 a.m">5 a.m</option>
                            <option value="6 a.m">6 a.m</option>
                            <option value="7 a.m">7 a.m</option>
                            <option value="8 a.m">8 a.m</option>
                            <option value="9 a.m">9 a.m</option>
                            <option value="10 a.m">10 a.m</option>
                            <option value="11 a.m">11 a.m</option>
                            <option value="12 p.m">12 p.m</option>
                            <option value="1 p.m">1 p.m</option>
                            <option value="2 p.m">2 p.m</option>
                            <option value="3 p.m">3 p.m</option>
                            <option value="4 p.m">4 p.m</option>
                            <option value="5 p.m">5 p.m</option>
                            <option value="6 p.m">6 p.m</option>
                            <option value="7 p.m">7 p.m</option>
                            <option value="8 p.m">8 p.m</option>
                            <option value="9 p.m">9 p.m</option>
                            <option value="10 p.m">10 p.m</option>
                            <option value="10 p.m">10 p.m</option>
                            <option value="12 a.m">12 a.m</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="label" for="#">Venue Address<span style="color:red">*</span></label>
                          <textarea name="address" class="form-control" id="address" cols="30" rows="4" placeholder="Venue Address" required="true"></textarea>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="label">Type of Event:<span style="color:red">*</span></label>
                          <select type="text" class="form-control" name="eventtype" id="eventtype" required="true" placeholder="Type of Event:">
                            <option value="">Choose Event Type</option>
                            <?php 

                            $sql2 = "SELECT * from   tbleventtype ";
                            $query2 = $dbh -> prepare($sql2);
                            $query2->execute();
                            $result2=$query2->fetchAll(PDO::FETCH_OBJ);

                            foreach($result2 as $row)
                            {          
                              ?>  
                              <option value="<?php echo htmlentities($row->EventType);?>"><?php echo htmlentities($row->EventType);?></option>
                            <?php } ?>
                          </select>
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="form-group">
                          <label class="label" for="tblservice">Name of Service:<span style="color:red">*</span></label>
                          <select type="text" class="form-control" name="tblservice" id="tblservice" required="true" placeholder="Name of Service:">
                            <option value="">Choose Service Name</option>
                            <?php 
                            include 'dbconnection.php';
                             $sql="SELECT * from tblservice";
                             $query = $dbh -> prepare($sql);
                             $query->execute();
                             $results=$query->fetchAll(PDO::FETCH_OBJ);
                            
                               foreach($results as $row)
                               {    
                                 ?>
                              <option value="<?php echo htmlentities($row->ServiceName);?>"><?php echo htmlentities($row->ServiceName);?></option>
                            <?php } ?>
                          </select>
                        </div>
                        </div>
                      <div class="col-md-6"> 
                        <div class="form-group">
                          <label class="label" for="email">Event Minimum Guests<span style="color:red">*</span></label>
                          <select type="int" class="form-control" name="minGuests" id="minGuests" required="true" placeholder="Event Minimum Guests">
                            <option value="">Select maxGuests</option>
                            <option value="50 Guest">50 Guest</option>
                            <option value="100 Guest">100 Guest</option>
                            <option value="150 Guest">150 Guest</option>
                            <option value="200 Guest">200 Guest</option>
                            <option value="250 Guest">250 Guest</option>
                            <option value="300 Guest">300 Guest</option>
                            <option value="350 Guest">350 Guest</option>
                            <option value="400 Guest">400 Guest</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6"> 
                        <div class="form-group">
                          <label class="label">Event Maximum Guests<span style="color:red">*</span></label>
                          <select type="int" class="form-control" name="maxGuests" id="maxGuests" required="true" placeholder="Event Maximum Guests">
                            <option value="">Select maxGuests</option>
                            <option value="500 Guest">500 Guest</option>
                            <option value="1000 Guest">1000 Guest</option>
                            <option value="1500 Guest">1500 Guest</option>
                            <option value="2000 Guest">2000 Guest</option>
                            <option value="2500 Guest">2500 Guest</option>
                            <option value="3000 Guest">3000 Guest</option>
                            <option value="3500 Guest">3500 Guest</option>
                            <option value="4000 Guest">4000 Guest</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="label" for="#">Additional Information</label>
                          <textarea name="info" class="form-control" id="info" cols="30" rows="4" placeholder="Additional Information"></textarea>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <input type="submit" value="Book" name="submit" id="submit" class="btn btn-sm btn-info">
                          <div class="submitting"></div>
                        </div>
                      </div>
                    </div>
                  </form>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" id="info_update4">
                     <?php @include("view_newbooking.php");?>
                   </div>
                   
                  
                </div>
                
              </div>
              
            </div>
            
            <div id="newbid_action" class="modal fade">
              <div class="modal-dialog ">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Take Action</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body" id="info_update2">
                   <?php @include("newbooking_action.php");?>
                 </div>
                 <div class="modal-footer ">
                  
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
               $sql="SELECT * from tblbooking";
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
                      <td class="font-w600"><?php  echo htmlentities($row->EventStartingtime);?></td>
                      <td class="font-w600"><?php  echo htmlentities($row->EventEndingtime);?></td>
                      <td class="font-w600"><?php  echo htmlentities($row->VenueAddress);?></td>
                      <td class="font-w600"><?php  echo htmlentities($row->EventType);?></td>
                      <td class="font-w600"><?php  echo htmlentities($row->ServiceName);?></td>
                      <td class="font-w600"><?php  echo htmlentities($row->minGuests);?></td>
                      <td class="font-w600"><?php  echo htmlentities($row->maxGuests);?></td>
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
                          <span ><?php  echo htmlentities($row->Status);?></span>
                        </td>
                        <?php 
                      } ?> 
                      <td class=" text-center">
                       
                        <a href="#"  class="edit_data2 btn btn-purple rounded" id="<?php echo  ($row->ID); ?>" ><i class="mdi mdi-pencil-box-outline " aria-hidden="true" title="Take action"></i></a>
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
<script type="text/javascript">
  $(document).ready(function(){
    $(document).on('click','.edit_data2',function(){
      var edit_id2=$(this).attr('id');
      $.ajax({
        url:"newbooking_action.php",
        type:"post",
        data:{edit_id2:edit_id2},
        success:function(data){
          $("#info_update2").html(data);
          $("#newbid_action").modal('show');
        }
      });
    });
  });
</script>
</body>

</html>