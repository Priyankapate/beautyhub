<?php 
 session_start();
 if(!isset($_SESSION['username_admin' ])){
  header('location: login_admin.php');
 }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Simple Admin Panel</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.4/dist/bootstrap-table.min.css" rel="stylesheet">

      <style>
        .nav-link {
            color: grey;
        }
        .nav-link.active,
        .nav-link:hover {
            color: white;
        }
    </style>
    </head>
 

 <body class="">
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
           <div class="bg-dark" id="sidebar-wrapper">
            <div class="sidebar-heading bg-dark text-white">Admin Panel</div>
     

        <div class="list-group list-group-flush pt-2 ps-1">
       
           <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">
                    <i class="fas fa-home" style="font-size:14px;"></i>
                    <span data-feather="home ml-2"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="user_profile.html">
                    <i class="fas fa-user" style="font-size:14px;"></i>
                    User Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="notification.html">
                    <i class="fas fa-bell" style="font-size:14px;"></i>
                    Notification
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="client.html">
                    <i class="fas fa-users" style="font-size:14px;"></i>
                    Clients
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="beautician.html">
                    <i class="fas fa-female" style="font-size:14px;"></i>
                    Beautician
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="admin.html">
                    <i class="fas fa-user-secret" style="font-size:14px;"></i>
                    Admin
                </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                  <i class="fas fa-user-secret" style="font-size:14px;"></i>
                  Admin
              </a>
          </li>
        </ul>
      </div>
        </div>
            <div id="page-content-wrapper">
             <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom">
                <div class="container-fluid">
                   
                <button class="navbar-toggler" id="sidebarToggle" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>    
                    <div class="ml-auto">
                      <ul class="navbar-nav navbar-right">
                          <li class="nav-item text-nowrap">
                              <a class="nav-link px-3" href="#"><?php echo $_SESSION['username_admin']; ?></a>
                          </li>
                      </ul>
                  </div>          
                    <div class="ml-auto">
                        <ul class="navbar-nav navbar-right">
                            <li class="nav-item text-nowrap">
                                <a class="nav-link px-3" href="logout_admin.php">Sign out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="container-fluid">
               <div class="row mt-4">
                  <div class="col-md-3 mb-2">
                    <div class="card text-bg-secondary mb-3">
                      <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-users"></i> Users</h5>
                        <p class="card-text">Total users: 1000</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 mb-2">
                    <div class="card text-bg-primary mb-3">
                      <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-user"></i> Clients</h5>
                        <p class="card-text">10,000</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 mb-2">
                    <div class="card text-bg-danger mb-3">
                      <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-female"></i> Beauticians</h5>
                        <p class="card-text">Visitors today: 500</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 mb-2">
                    <div class="card text-bg-success mb-3">
                      <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-user-secret"></i> Admin</h5>
                        <p class="card-text">Content for the new card</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="alert alert-primary" role="alert">
                  Verify Beautician Below
                </div>
                <div class="row" style="height: 70vh; overflow: auto;">
                  <table
                  id="table"
                  data-toggle="table"
                  data-pagination="true"
                  data-page-list="[5, 10, 20, 50]"
                  data-escape-title="Your Escape Title"
                  data-search="true"  class="table-striped">
                  <thead>
                    <tr>
                      <th data-field="id">ID</th>
                      <th data-field="name">Name</th>
                      <th data-field="email">Email</th>
                      <th data-field="phone">Phone Number</th>
                      <th data-field="address">Address</th>
                      <th data-field="view">User Details</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                          <td>Name</td>
                          <td>Email</td>
                          <td>Phone Number</td>
                          <td>123 Main St, Anytown, USA</td>
                          <td><a href="beautician_details.html">View Details</a></td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td><img src="https://ui-avatars.com/api/?name=Jane+Smith&size=30&rounded=true" alt="Jane Smith" style="border-radius: 50%; width: 30px; height: 30px;"></td>
                          <td>Jane Smith</td>
                          <td>jane.smith@example.com</td>
                          <td>456 Elm St, Othertown, USA</td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td><img src="https://ui-avatars.com/api/?name=Michael+Johnson&size=30&rounded=true" alt="Michael Johnson" style="border-radius: 50%; width: 30px; height: 30px;"></td>
                          <td>Michael Johnson</td>
                          <td>michael.johnson@example.com</td>
                          <td>789 Oak St, Another town, USA</td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td><img src="https://ui-avatars.com/api/?name=Emily+Brown&size=30&rounded=true" alt="Emily Brown" style="border-radius: 50%; width: 30px; height: 30px;"></td>
                          <td>Emily Brown</td>
                          <td>emily.brown@example.com</td>
                          <td>101 Pine St, Somewhereville, USA</td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td><img src="https://ui-avatars.com/api/?name=David+Lee&size=30&rounded=true" alt="David Lee" style="border-radius: 50%; width: 30px; height: 30px;"></td>
                          <td>David Lee</td>
                          <td>david.lee@example.com</td>
                          <td>543 Maple St, Newville, USA</td>
                        </tr>
                        <tr>
                          <td>6</td>
                          <td><img src="https://ui-avatars.com/api/?name=Sarah+Garcia&size=30&rounded=true" alt="Sarah Garcia" style="border-radius: 50%; width: 30px; height: 30px;"></td>
                          <td>Sarah Garcia</td>
                          <td>sarah.garcia@example.com</td>
                          <td>222 Chestnut St, Oldtown, USA</td>
                        </tr>
                        <tr>
                          <td>7</td>
                          <td><img src="https://ui-avatars.com/api/?name=Robert+Martinez&size=30&rounded=true" alt="Robert Martinez" style="border-radius: 50%; width: 30px; height: 30px;"></td>
                          <td>Robert Martinez</td>
                          <td>robert.martinez@example.com</td>
                          <td>777 Walnut St, Downtown, USA</td>
                        </tr>
                        <tr>
                          <td>8</td>
                          <td><img src="https://ui-avatars.com/api/?name=Olivia+Hernandez&size=30&rounded=true" alt="Olivia Hernandez" style="border-radius: 50%; width: 30px; height: 30px;"></td>
                          <td>Olivia Hernandez</td>
                          <td>olivia.hernandez@example.com</td>
                          <td>456 Pineapple St, Beachtown, USA</td>
                        </tr>
                        <tr>
                          <td>9</td>
                          <td><img src="https://ui-avatars.com/api/?name=William+Young&size=30&rounded=true" alt="William Young" style="border-radius: 50%; width: 30px; height: 30px;"></td>
                          <td>William Young</td>
                          <td>william.young@example.com</td>
                          <td>999 Cherry St, Hilltown, USA</td>
                        </tr>
                        <tr>
                          <td>10</td>
                          <td><img src="https://ui-avatars.com/api/?name=Sophia+King&size=30&rounded=true" alt="Sophia King" style="border-radius: 50%; width: 30px; height: 30px;"></td>
                          <td>Sophia King</td>
                          <td>sophia.king@example.com</td>
                          <td>321 Apple St, Orchardtown, USA</td>
                        </tr>
                        <tr>
                          <td>11</td>
                          <td><img src="https://ui-avatars.com/api/?name=Ethan+White&size=30&rounded=true" alt="Ethan White" style="border-radius: 50%; width: 30px; height: 30px;"></td>
                          <td>Ethan White</td>
                          <td>ethan.white@example.com</td>
                          <td>444 Orange St, Fruitville, USA</td>
                        </tr>
                        <tr>
                          <td>12</td>
                          <td><img src="https://ui-avatars.com/api/?name=Emma+Lopez&size=30&rounded=true" alt="Emma Lopez" style="border-radius: 50%; width: 30px; height: 30px;"></td>
                          <td>Emma Lopez</td>
                          <td>emma.lopez@example.com</td>
                          <td>567 Grape St, Winetown, USA</td>
                        </tr>
                        <tr>
                          <td>13</td>
                          <td><img src="https://ui-avatars.com/api/?name=James+Perez&size=30&rounded=true" alt="James Perez" style="border-radius: 50%; width: 30px; height: 30px;"></td>
                          <td>James Perez</td>
                          <td>james.perez@example.com</td>
                          <td>888 Lemon St, Citrustown, USA</td>
                        </tr>
                        <tr>
                          <td>14</td>
                          <td><img src="https://ui-avatars.com/api/?name=Ava+Turner&size=30&rounded=true" alt="Ava Turner" style="border-radius: 50%; width: 30px; height: 30px;"></td>
                          <td>Ava Turner</td>
                          <td>ava.turner@example.com</td>
                          <td>777 Plum St, Orchardtown, USA</td>
                        </tr>
                      </tbody>
                    </table>
                    
                  </div>
                </div>
              </div>
        </div>
        <script src="./js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-table@1.22.4/dist/bootstrap-table.min.js"></script>
        
</body>
</html>
