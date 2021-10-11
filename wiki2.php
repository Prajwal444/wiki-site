<?php
include('config.php');
if (!isset($_COOKIE['email'])) {
    if (!isset($_SESSION['user'])) {
        echo "
                <script>
                    window.location='signin.php';
                </script>
            ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('components/head.php'); ?>
</head>

<body>
    <?php include('components/navbar.php'); ?>

    <div class="container">
        <h3 class="text-center text-primary mt-3">Welcome in Contact App</h3>
        <hr>
        <div class="d-flex justify-content-evenly">
            <a class="btn btn-success" href="dashboard.php">Dashboard</a>
            <a class="btn btn-success" href="addcontact.php">Add Contact</a>
        </div>
        <hr>

        <!-- Contact List Started -->

        <div class="row">

            <?php
            if(isset($_COOKIE['email'])){
                $authEmail=$_COOKIE['email'];
            }
            else
            {
                $authEmail=$_SESSION['user']['email'];
            }

            $sql = "SELECT * FROM myplayers WHERE authEmail='$authEmail'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {                    
                    
                                       
                    echo '
         <div class="container bootstrap snippets bootdey">
<div class="panel-body inf-content">
    <div class="row">
        <div class="col-md-4">
            <img alt="" style="width:600px;" title="" class="img-circle img-thumbnail isTooltip"  src="'.$row['userProfile'].'"  data-original-title="Usuario"> 
            <ul title="Ratings" class="list-inline ratings text-center">
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-star"></span></a></li>
            </ul>
        </div>
        <div class="col-md-6">
            <strong>Information</strong><br>
            <div class="table-responsive">
            <table class="table table-user-information">
                <tbody>
                    <tr>        
                        <td>
                            <strong>
                                <span class="glyphicon glyphicon-asterisk text-primary"></span>
                                Identificacion                                                
                            </strong>
                        </td>
                        <td class="text-primary">
                            123456789     
                        </td>
                    </tr>
                    
<tr> 
 <td>
  <strong>                                                                                <span class="glyphicon glyphicon-user  text-primary"></span>                                                                                                                       Name                                                                                                                                                                                                </strong>                                                                                                                                                                       </td>                                                                                                                                                                                               <td class="text-primary">                                                                                                                                                                                                                          
                  '.$row['fullname'].'                                                                                                                                                                                                                                     </td>                                                                                                                                                                                                                                                             </tr>
  <tr> 
 <td>
  <strong>                                                                                <span class="glyphicon glyphicon-user  text-primary"></span>                                                                                                                       
   Age                                                                                                                                                                                          </strong>                                                                                                                                                                       </td>                                                                                                                                                                                               <td class="text-primary">                                                                                                                                                                                                                          
                          '.$row['age'].'                                                                                                                                                                                                                           </td>                                                                                                                                                                                                                                                             </tr>
  <tr> 
 <td>
  <strong>                                                                                <span class="glyphicon glyphicon-user  text-primary"></span>                                                                                                                       Height                                                                                                                                                                                             </strong>                                                                                                                                                                       </td>                                                                                                                                                                                               <td class="text-primary">                                                                                                                                                                                                                          
                          '.$row['height'].'                                                                                                                                                                                                                    </td>                                                                                                                                                                                                                                                             </tr>
  <tr> 
 <td>
  <strong>                                                                                <span class="glyphicon glyphicon-user  text-primary"></span>                                                                                                                       Batting                                                                                                                                                                                  </strong>                                                                                                                                                                       </td>                                                                                                                                                                                               <td class="text-primary">                                                                                                                                                                                                                          
                           '.$row['batting'].'                                                                                                                                                                                                                          </td>                                                                                                                                                                                                                                                             </tr>
  <tr> 
 <td>
  <strong>                                                                                <span class="glyphicon glyphicon-user  text-primary"></span>                                                                                                                     Bowling                                                                                                                                                                      </strong>                                                                                                                                                                       </td>                                                                                                                                                                                               <td class="text-primary">                                                                                                                                                                                                                          
                       '.$row['bowling'].'                                                                                                                                                                                                                             </td>                                                                                                                                                                                                                                                             </tr>
  <tr> 
 <td>
  <strong>                                                                                <span class="glyphicon glyphicon-user  text-primary"></span>                                                                                                                    Role                                                                                                                                                                     </strong>                                                                                                                                                                       </td>                                                                                                                                                                                               <td class="text-primary">                                                                                                                                                                                                                          
                       '.$row['role'].'                                                                                                                                                                                                                               </td>                                                                                                                                                                                                                                                             </tr>
  <tr> 
 <td>
  <strong>                                                                                <span class="glyphicon glyphicon-user  text-primary"></span>                                                                                                                     National side                                                                                                                                                                      </strong>                                                                                                                                                                       </td>                                                                                                                                                                                               <td class="text-primary">                                                                                                                                                                                                                          
                   '.$row['nation'].'                                                                                                                                                                                                                                     </td>                                                                                                                                                                                                                                                             </tr>
  <tr> 
 <td>
  <strong>                                                                                <span class="glyphicon glyphicon-user  text-primary"></span>                                                                                                                       IPL team                                                                                                                                                               </strong>                                                                                                                                                                       </td>                                                                                                                                                                                               <td class="text-primary">                                                                                                                                                                                                                          
                    '.$row['ipl'].'                                                                                                                                                                                                                                </td>                                                                                                                                                                                                                                                             </tr>





                    
                                          
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>
</div>
                                        ';  

                      
                                        echo'
                                        <address><b>Address : </b>'.$row['userAdress'].'</address>
                                        ';
                                         if($row['updated']!=null)
                                         {
                                            $date1=date_create($row['updated']);
                                            echo "<i>Contact Updated on <b>".date_format($date1,'d-M-y h:i A')."</b></i><br>";
                                         }
                                         $date=date_create($row['created']);
                                         echo "<i>Contact Created on <b>".date_format($date,'d-M-y h:i A')."</b></i>";

                                    echo"</div>
                                    <div class='modal-footer'>
                                        <button onclick='alertDelete(".$row['Id'].",".json_encode($row['userProfile']).")' class='text-decoration-none btn btn-danger'>Delete</button>
                                        <button onclick='alertUpdate(".$row['Id'].",".json_encode($row['userProfile']).")' class='text-decoration-none btn btn-primary'>Edit</button>
                                        <button type='button' class='btn btn-warning' data-bs-dismiss='modal'>Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
                }
            } 
            
            
            
            else {
                echo '<h3 class="text-center text-danger">No Contact Found</h3>';
            }
            ?>
        </div>

        <!-- Contact List Ended -->

    </div>

    <?php include('components/footer.php'); ?>

    <!-- this is script file -->
    <?php include('components/script.php'); ?>
    <script>
        function alertDelete(q,f){
            swal({
                title:"Alert",
                text:"Do you want to delete this contact ?",
                icon:"warning",
                buttons: true,
                dangerMode: true,
            })
            .then((res)=>{
                if(res)
                {
                    window.location.href="deletecontactwiki.php?q="+q+"&f="+f;
                }
                else
                {
                    swal("Your data is safe");
                }
            })
        }
        function alertUpdate(q,f){
            swal({
                title:"Alert",
                text:"Do you want to edit this contact ?",
                icon:"warning",
                buttons: true,
                dangerMode: true,
            })
            .then((res)=>{
                if(res)
                {
                    window.location.href="editcontact.php?q="+q+"&f="+f;
                }
            })
        }
    </script>
</body>

</html>
