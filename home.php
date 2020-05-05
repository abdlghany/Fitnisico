<?php
session_start();
//loogedin is true if a user has logged in. default value is false.
$connect = mysqli_connect("localhost", "admin", "admin", "gym");
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Fitnisico</title>
  <link rel="shortcut icon" href="images/favicon.png">
  <!-- adding fonts and icons from google library. material_style from materialize. bootstrap from https://getbootstrap.com/. -->
  <link rel="stylesheet" href="css/fonts.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/material_style.css">
</head>

<body class="body-s">
  <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header mdl-layout__header--scroll">
      <div class="mdl-layout--large-screen-only mdl-layout__header-row">
      </div>
      <div class="mdl-layout--large-screen-only mdl-layout__header-row">
        <div class="col-sm-10">
          <img class="icon" width="5%" src="images/faviconW.png" />
          <h3>Fitnisico</h3>
        </div>
        <div class="col-sm-2">
          <h5>Call Us:<br />0111 1915 179</h5>
        </div>
      </div>
      <div class="mdl-layout--large-screen-only mdl-layout__header-row">

        <?php
		  if(isset($_SESSION['loggedin'])){
		   echo '<div class="col-sm-10">
            <h5>&nbspWelcome '.$_SESSION['name'].'.</h5></div>';
		  }else {
              echo '
              <div class="col-sm-10"></div>
          <div class="col-sm-2">
          <h6>or login to make a booking</h6>
          </div>';
          }
		  ?>

      </div>
      <div class="mdl-layout__tab-bar mdl-js-ripple-effect mdl-color--primary-dark">
        <a href="#home" class="mdl-layout__tab">Home</a>
        <a href="#coaches" class="mdl-layout__tab">Coaches</a>
        <a href="#equipment" class="mdl-layout__tab">Equipment</a>
        <?php 
          if(isset($_SESSION['loggedin'])){
		  echo '
          <a href="#booking" class="mdl-layout__tab">Booking</a>
		  ';
		  }
		  echo '<a href="#about" class="mdl-layout__tab">About us</a>';
          if(isset($_SESSION['userisadmin'])){
              echo '<a href="#manage" class="mdl-layout__tab">manage site</a>';
          }
		  if (isset($_SESSION['loggedin'])){
			  echo '<a href="php/logout.php" class="mdl-layout__tab">Log out</a>'; 
		  }
		  ?>
        <button href="#addWalkIn" data-target="#addWalkIn" class="mdl-layout__tab" style="display:none;" id="addWalkInB"></button>
      </div>
    </header>
    <main class="mdl-layout__content">
      <div class="mdl-layout__tab-panel ml-5 mr-5" id="home">
        <section class="container-fluid mdl-grid mdl-grid--no-spacing d-flex justify-content-center mb-5">
          <div class="mdl-card mdl-cell mdl-cell--9-col-desktop ">
            <div class="mdl-card__supporting-text">
              <h4 class="text-center">Welcome to <b>Fitnisico</b></h4>
            </div>
            <h5 class="text-center">Where you can practice alongside friends</h5>
            <img class="mb-5" src="images/equipment/ex.jpg" width="100%">
            <h5 class="text-center">Using the most advanced tools</h5>
            <img class="mb-5" src="images/equipment/latest.png" width="100%">
            <h5 class="text-center">with the help of our qualified instructors</h5>
            <img class="mb-5" src="images/coach1.png" width="100%">
          </div>
        </section>
      </div>
        
      <div class="mdl-layout__tab-panel" id="coaches">
        <section class="section--center mdl-grid mdl-shadow--3dp">
          <div class="mdl-cell mdl-cell--4-col">
            <img src="images/icecube.jpg" class="img-fluid circle" />
          </div>
          <div class="mdl-cell mdl-cell--8-col-desktop">
            <h4>Ice Cube</h4>
            <p>Born in 15 June 1969, Ice Cube is one of our best coaches.</p>
            <p><b>"I think the worst thing you can do about a situation is nothing."</b></p>
            <div class="mdl-card__actions">
              <a target="_blank" class="mdl-button" href="https://www.brainyquote.com/quotes/ice_cube_404448">- Ice Cube</a>
            </div>
          </div>
        </section>

        <section class="section--center mdl-grid mdl-shadow--3dp">
          <div class="mdl-cell mdl-cell--4-col">
            <img src="images/BelaKarolyi.jpg" class="img-fluid circle" />
          </div>
          <div class="mdl-cell mdl-cell--8-col-desktop">
            <h4>IBéla Károlyi</h4>
            <p>Born on 13 September, 1942 Ibela is an extremely expienced coach.</p>
            <p><b>"My gymnasts are always the best-prepared in the world. And they win. In the end, that's what matters."</b></p>
            <div class="mdl-card__actions">
              <a target="_blank" class="mdl-button" href="https://www.brainyquote.com/authors/bela-karolyi-quotes">- IBéla Károlyi</a>
            </div>
          </div>
        </section>

        <section class="section--center mdl-grid mdl-shadow--3dp">
          <div class="mdl-cell mdl-cell--4-col">
            <img src="images/ChanningTatum.jpg" class="img-fluid circle" />
          </div>
          <div class="mdl-cell mdl-cell--8-col-desktop">
            <h4>Channing Tatum</h4>
            <p>Channing Matthew Tatum 26 April 1980, Channing excels at many types of sports and gymnastics.</p>
            <p><b>"My parents couldn't handle my energy so they enrolled me in every sport the school was offering. I didn't resent it because I loved sports and picked them up easily."</b></p>
            <div class="mdl-card__actions">
              <a target="_blank" class="mdl-button" href="https://www.brainyquote.com/quotes/channing_tatum_410656">- Channing Tatum</a>
            </div>
          </div>
        </section>

        <section class="section--center mdl-grid mdl-shadow--3dp mb-5">
          <div class="mdl-cell mdl-cell--4-col">
            <img src="images/jonahhill.webp" class="img-fluid circle" />
          </div>
          <div class="mdl-cell mdl-cell--8-col-desktop">
            <h4>Jonah Hill</h4>
            <p>Jonah Hill Feldstein was born on 20 December 1983, he will understand your needs and support you as you go on.</p>
            <p><b>"I assume everything I do in life is gonna be a failure, and then if it turns up roses, then I'm psyched."</b></p>
            <div class="mdl-card__actions">
              <a target="_blank" class="mdl-button" href="https://www.brainyquote.com/quotes/jonah_hill_487703">- Jonah Hill</a>
            </div>
          </div>
        </section>
      </div>
        
      <div class="mdl-layout__tab-panel" id="equipment">
        <section class="section--center mdl-grid mdl-shadow--3dp mb-5">
          <div class="mdl-cell mdl-cell--4-col">
            <img src="images/equipment/1.png" class="img-fluid" />
          </div>
          <div class="mdl-cell mdl-cell--8-col-desktop">
            <h4>Upright bike (indoor bike)</h4>
            <p>The indoor bike will work your lungs and lower body in equal
              measure, in fact, it targets every muscle in the lower body
              (especially at higher resistances.)</p>
          </div>
        </section>
        <section class="section--center mdl-grid mdl-shadow--3dp mb-5">
          <div class="mdl-cell mdl-cell--4-col">
            <img src="images/equipment/2.png" class="img-fluid" />
          </div>
          <div class="mdl-cell mdl-cell--8-col-desktop">
            <h4>Pec deck machine (fly machine)</h4>
            <p>You’ll be targeting the chest muscles on their own when you use
              the pec deck, seat positioning will determine which part of the pec
              you access.</p>
          </div>
        </section>
        <section class="section--center mdl-grid mdl-shadow--3dp mb-5">
          <div class="mdl-cell mdl-cell--4-col">
            <img src="images/equipment/3.png" class="img-fluid" />
          </div>
          <div class="mdl-cell mdl-cell--8-col-desktop">
            <h4>The treadmill (running machine)</h4>
            <p>It is a great way to practice walking or jogging at
              any pace you’re comfortable with, in an indoor setting – it is
              fantastic if you prefer indoor based exercise or if you
              aren’t confident running outside.</p>
          </div>
        </section>
        <section class="section--center mdl-grid mdl-shadow--3dp mb-5">
          <div class="mdl-cell mdl-cell--4-col">
            <img src="images/equipment/4.png" class="img-fluid" />
          </div>
          <div class="mdl-cell mdl-cell--8-col-desktop">
            <h4>Workout Station</h4>
            <p>Using this workout station you can target almost every muscle in your
              body, if used correctly.</p>
          </div>
        </section>
        <section class="section--center mdl-grid mdl-shadow--3dp mb-5">
          <div class="mdl-cell mdl-cell--4-col">
            <img src="images/equipment/5.png" class="img-fluid" />
          </div>
          <div class="mdl-cell mdl-cell--8-col-desktop">
            <h4>Standard barbell (with adjustable weights)</h4>
            <p>
          </div>
        </section>
        <section class="section--center mdl-grid mdl-shadow--3dp mb-5">
          <div class="mdl-cell mdl-cell--4-col">
            <img src="images/equipment/6.png" class="img-fluid" />
          </div>
          <div class="mdl-cell mdl-cell--8-col-desktop">
            <h4>Olympic weight bench (Olympic bench)</h4>
            <p>You can target the chest, triceps, and shoulders using maximal
              loads due to the specially designed bench frame.</p>
          </div>
        </section>
        <section class="section--center mdl-grid mb-5 d-flex justify-content-center">
          <div class="mdl-cell mdl-cell--8-col-desktop text-center">
            <h4>AND MANY MORE!</h4>
            <p>come visit us so you can test them yourself.</p>
          </div>
        </section>
      </div>
        
      <div class="mdl-layout__tab-panel" id="booking">
        <div class="container">
          <h3>Please select one of the following booking options:</h3>
          <div class="container mb-5">
            <div class="row justify-content-center">
              <div class="booking-form">
                <form action="php/book.php" method="post">
                  <div class="form-group">
                    <div class="col text-center">
                      <span class="form-label mb-5">
                        <h3>Daily walk-in</h3>
                      </span>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-checkbox">
                          <span class="form-label">Would you like a coach</span>&nbsp; &nbsp; &nbsp; &nbsp;
                          <label for="withcoach">
                            <input type="radio" id="withcoach" name="coachs" onClick="disa2()" value="yes" checked=true>
                            <span></span>Yes
                          </label>
                          <label for="nocoach">
                            <input type="radio" id="nocoach" name="coachs" onClick="disa()" value="no">
                            <span></span>No thanks
                          </label>
                        </div>
                      </div>
                      <div class="col">
                        <div id="disa">
                          <span class="form-label">Select Coach</span>
                          <select class="form-control" name="coach" id="coachselection" required>
                            <option value="" selected disabled hidden>Please Select a coach...</option>
                            <option>Ice Cube</option>
                            <option>IBela Karolyi</option>
                            <option>Channing Tatum</option>
                            <option>Jonah Hill</option>
                          </select>
                          <span class="select-arrow"></span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="form-group">
                        <span class="form-label">Date</span>
                        <input class="form-control" type="date" name="bookdate" required>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <span class="form-label">From</span>
                        <input class="form-control" type="time" name="bookfrom" min="09:00" max="23:00" value="10:00" required>
                        <span class="select-arrow"></span>
                      </div>
                    </div>
                    <div class="col">
                      <div class="form-group">
                        <span class="form-label">To</span>
                        <input class="form-control" type="time" name="bookto" value="22:00" required>
                        <span class="select-arrow"></span>
                      </div>
                    </div>
                  </div>
                  <span class="form-label mb-5 text-primary">
                    <p><b>*payment is upon arrival, RM5 per walk-in without subscription.</b></p>
                  </span>
                  <div class="form-btn">
                    <button class="submit-btn">Book</button>
                  </div>

                </form>
              </div>
            </div>
          </div>

          <div class="container mb-5">
            <div class="row justify-content-center">
              <div class="booking-form">
                <form action="php/mbook.php" method="post">
                  <div class="form-group">
                    <div class="col text-center">
                      <span class="form-label mb-5">
                        <h3>Monthly Subscription</h3>
                      </span>
                    </div>
                    <ul class="list-group  mb-4">
                      <li class="list-group-item text-white bg-dark">Pay 50% less than walk-in, RM75 for the whole month!</li>
                      <li class="list-group-item">Includes personal trainer (if you want one)</li>
                      <li class="list-group-item text-white bg-dark">Walk-in as many time as you want during the month</li>
                      <li class="list-group-item">Gain access to baths, closets and more!</li>
                    </ul>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <span class="form-label">Start Date</span>
                          <input class="form-control text-center" type="date" name="date" required>
                        </div>
                      </div>
                    </div>
                    <span class="form-label mb-5 text-primary">
                      <p><b>*payment is upon arrival (on the first time), RM75 for a whole month.</b></p>
                    </span>
                    <div class="form-btn">
                      <button class="submit-btn">Subscribe Today</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
        
      <div class="mdl-layout__tab-panel" id="about">
        <section class="section--center mdl-grid mdl-shadow--3dp mb-5 p-4">
          <div class="mdl-cell mdl-cell--12-col-desktop text-center">
            <h2 class="mb-4">Contact us</h2>
            <h4><b>Front-Desk</b></h4>
            <h5 class="mb-3">Call or WhatsApp:<a class="mdl-button" href="tel:+601111915179"><b>+601111915179</b></a></h5>
            <h5 class="mb-4">E-mail:<a class="mdl-button" href="mailto:abdalghany@windowslive.com"><b>abdalghany@windowslive.com</b></a></h5>
            <h4><b>Management</b></h4>
            <h5 class="mb-3">Call or WhatsApp:<a class="mdl-button" href="tel:+601165503712"><b>+601165503712</b></a></h5>
            <h5 class="mb-3">E-mail:<a class="mdl-button" href="mailto:abdalghanyy1996@gmail.com"><b>abdalghanyy1996@gmail.com</b></a></h5>
          </div>
        </section>
        <section class="section--center mdl-grid mdl-shadow--3dp mb-5 p-5">
          <div class="mdl-cell mdl-cell--12-col-desktop text-center">
            <h2 class="mb-4">Suggestions & Inquiries</h2>
            <p>any suggestion or feedback is much appreciated</p>
            <form action="php/inquiry.php" method="post">
              <input type="email" class="form-control mb-4" id="suggemail" name="email" <?php
       //automatically fill out the email field when the user is logged in, for more convinience
		if(isset($_SESSION['email'])){
			echo ' value="'.$_SESSION["email"].'" ';
		}
		?>placeholder="Please enter your E-mail address" required />
              <textarea class="form-control mb-3" name="inquiry" placeholder="Your inquiry here..." rows="11" required></textarea>
              <button type="submit" class="btn mdl-color--primary text-white btn-lg btn-block mb-2">Submit inquiry</button>
            </form>
          </div>
        </section>
        <section class="section-fluid mdl-grid mdl-shadow--3dp m-5">
          <div class="row d-flex justify-content-center">
            <h2 class="mb-4">Gym Location</h2><br>
            <img class="mb-5 p-3 rounded" width="100%" src="images/location.png" />
            <div class="mdl-card__actions">
              <a target="_blank" class="mdl-button" href="https://goo.gl/maps/wjvV4VVfmwubD46X7">63000 3, Persiaran Harmoni, Cyber 9, 62000 Cyberjaya, Selangor</a>
            </div>
          </div>
        </section>
      </div>
        
      <div class="mdl-layout__tab-panel" id="manage">
        <div id="exTab3">
          <ul class="nav nav-pills d-flex justify-content-center">
            <li class="active p-4 mdl-color--primary rounded-left border-right border-dark"><a href="#walk_in" data-toggle="tab">Walk-in Bookings</a>
            </li>
            <li class="p-4 mdl-color--primary border-right border-dark"><a href="#monthly" data-toggle="tab">Monthly Subscriptions</a>
            </li>
            <li class="p-4 mdl-color--primary"><a href="#suggestions" data-toggle="tab">Feedback & Suggestions</a>
            </li>
            <li class="p-4 mdl-color--primary rounded-right border-left border-dark"><a href="#useraccounts" data-toggle="tab">User Accounts</a>
            </li>
          </ul>
          <div class="tab-content clearfix">
            <div class="tab-pane" id="walk_in">
              <div class="d-flex m-0">
                <div class="container-fluid mdl-grid justify-content-center">
                  <div class="col-sm-11">
                    <h6><b>Walk-in Reservation Details</b></h6>
                  </div>
                  <div class="col-sm-1">
                    <button class="btn border-dark mt-3" title="Make a new walk-in reservation" onclick="addwalk_in()" id="addwalk_inB"><img alt="" src="images/add-24px.svg" /><b> Add New</b></button>
                    <button class="btn border-dark mt-3" title="Cancel" onclick="cancelwalk_in()" id="cancelwalk_in" style="display:none;"><img alt="" src="images/close-24px.svg" /><b> Cancel</b></button>
                  </div>
                  <div class="panel panel-default" id="addwalk_in" style="display:none;">
                    <div class="container mb-5">
                      <div class="row justify-content-center">
                        <div class="booking-form">
                          <form id="addwalk_inF" action="php/addwalk_in.php" method="post">
                            <div class="form-group">
                              <div class="col text-center">
                                <span class="form-label mb-5">
                                  <h3>New Walk-in Reservation</h3>
                                </span>
                              </div>
                              <div class="row">
                                <?php
                                echo '<div class="col">
                                <span class="form-label">ID</span>
                                <select class="form-control" name="id" id="walk_in_id" onchange="walk_in_id_changed();" required>
                                <option selected disabled hidden>Select ID</option>
                                ';
                                $query0 = "SELECT id from accounts order by id asc;";
                                $result0 = mysqli_query($connect, $query0);
                                while($row = mysqli_fetch_array($result0))
                                {
                                  echo '<option>'.$row["id"].'</option>';  
                                }
                                echo'</select></div>
                                <div class="col">
                                <span class="form-label">Name</span>
                                <select class="form-control" name="name" id="walk_in_name" onchange="walk_in_name_changed();">
                                <option selected disabled hidden>Select name</option>
                                ';
                                $query0 = "SELECT name from accounts order by id asc;";
                                $result0 = mysqli_query($connect, $query0);
                                while($row = mysqli_fetch_array($result0))
                                {
                                  echo '<option>'.$row["name"].'</option>';  
                                }
                                echo'</select></div>
                                <div class="col">
                                <span class="form-label">E-mail</span>
                                <select class="form-control" name="email" id="walk_in_email" onchange="walk_in_email_changed();">
                                <option selected disabled hidden>Select E-mail</option>
                                ';
                                $query0 = "SELECT email from accounts order by id asc;";
                                $result0 = mysqli_query($connect, $query0);
                                while($row = mysqli_fetch_array($result0))
                                {
                                  echo '<option>'.$row["email"].'</option>';  
                                }
                                echo'
                                </select></div>';
                                ?>
                              </div>
                              <div class="row">
                                <div class="col">
                                  <span class="form-label">Do they want a coach</span>
                                  <select class="form-control" name="coachs" id="coachstatus" onchange="getIndex();" required>
                                    <option>Yes</option>
                                    <option>No</option>
                                  </select></div>
                                <div class="col">
                                  <div id="admindisa">
                                    <span class="form-label">Select Coach</span>
                                    <select class="form-control" name="coach" id="admincoachselection" required>
                                      <option selected disabled hidden>Select a coach...</option>
                                      <option>Ice Cube</option>
                                      <option>IBela Karolyi</option>
                                      <option>Channing Tatum</option>
                                      <option>Jonah Hill</option>
                                    </select>
                                    <span class="select-arrow"></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <span class="form-label">Date</span>
                                  <input class="form-control" type="date" name="bookdate" required>
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <span class="form-label">From</span>
                                  <input class="form-control" type="time" name="bookfrom" min="09:00" max="23:00" value="10:00" required>
                                  <span class="select-arrow"></span>
                                </div>
                              </div>
                              <div class="col">
                                <div class="form-group">
                                  <span class="form-label">To</span>
                                  <input class="form-control" type="time" name="bookto" value="22:00" required>
                                  <span class="select-arrow"></span>
                                </div>
                              </div>
                            </div>
                            <div class="form-btn">
                              <button class="submit-btn">ADD</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <br />
                    <table id="editable_table" class="table table-hover table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>ID</th>
                          <th>E-mail</th>
                          <th>Requires coach</th>
                          <th>Coach</th>
                          <th>Day</th>
                          <th>From</th>
                          <th>To</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
         $query = "SELECT booking.email,booking.coachs,booking.coach,booking.inc ,booking.day,booking.fromT,booking.toT,accounts.id 
            FROM `booking`,`accounts` WHERE booking.email = accounts.email order by booking.inc asc;";
         $result = mysqli_query($connect, $query);
     while($row = mysqli_fetch_array($result))
     {
      echo '
      <tr id="'.$row["inc"].'">
        <td scope="row">'.$row["inc"].'</td>
        <td>'.$row["id"].'</td>
        <td>'.$row["email"].'</td>
        <td>'.$row["coachs"].'</td>
        <td>'.$row["coach"].'</td>
        <td>'.$row["day"].'</td>
        <td>'.$row["fromT"].'</td>
        <td>'.$row["toT"].'</td>
      </tr>
      ';
     }
     ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="monthly">
              <div class="d-flex m-0">
                <div class="container-fluid mdl-grid justify-content-center">
                  <div class="col-sm-11">
                    <h6><b>Monthly Subscription Details</b></h6>
                  </div>
                  <div class="col-sm-1">
                    <button class="btn border-dark mt-3" title="Create a new monthly subscription" onclick="addmonthly()" id="addmonthlyB"><img alt="" src="images/add-24px.svg" /><b> Add New</b></button>
                    <button class="btn border-dark mt-3" title="Cancel" onclick="cancelmonthly()" id="cancelmonthly" style="display:none;"><img alt="" src="images/close-24px.svg" /><b> Cancel</b></button>
                  </div>
                  <div class="panel panel-default" id="addmonthly" style="display:none;">
                    <div class="container mb-5">
                      <div class="row justify-content-center">
                        <div class="booking-form">
                          <form id="addmonthlyF" action="php/addmonthly.php" method="post">
                            <div class="form-group">
                              <div class="col text-center">
                                <span class="form-label mb-5">
                                  <h3>New Monthly Subscription</h3>
                                </span>
                              </div>
                              <div class="row">
                                <?php
                                echo '<div class="col">
                                <span class="form-label">ID</span>
                                <select class="form-control" name="id" id="monthly_id" onchange="monthly_id_changed();" required>
                                <option selected disabled hidden>Select ID</option>
                                ';
                                $query0 = "SELECT id from accounts order by id asc;";
                                $result0 = mysqli_query($connect, $query0);
                                while($row = mysqli_fetch_array($result0))
                                {
                                  echo '<option>'.$row["id"].'</option>';  
                                }
                                echo'</select></div>
                                <div class="col">
                                <span class="form-label">Name</span>
                                <select class="form-control" name="name" id="monthly_name" onchange="monthly_name_changed();">
                                <option selected disabled hidden>Select name</option>
                                ';
                                $query0 = "SELECT name from accounts order by id asc;";
                                $result0 = mysqli_query($connect, $query0);
                                while($row = mysqli_fetch_array($result0))
                                {
                                  echo '<option>'.$row["name"].'</option>';  
                                }
                                echo'</select></div>
                                <div class="col">
                                <span class="form-label">E-mail</span>
                                <select class="form-control" name="email" id="monthly_email" onchange="monthly_email_changed();">
                                <option selected disabled hidden>Select E-mail</option>
                                ';
                                $query0 = "SELECT email from accounts order by id asc;";
                                $result0 = mysqli_query($connect, $query0);
                                while($row = mysqli_fetch_array($result0))
                                {
                                  echo '<option>'.$row["email"].'</option>';  
                                }
                                echo'
                                </select></div>';
                                ?>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col">
                                <div class="form-group">
                                  <span class="form-label">Subscription Date</span>
                                  <input class="form-control" type="date" name="date" required>
                                </div>
                              </div>
                            </div>
                            <div class="form-btn">
                              <button class="submit-btn">ADD</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <br />
                    <table id="editable_table2" class="table table-hover table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>ID</th>
                          <th>E-mail</th>
                          <th>Subscription Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
         $query = "SELECT mbooking.inc, mbooking.date, accounts.id, accounts.email
            FROM `mbooking`,`accounts` WHERE mbooking.id = accounts.id order by mbooking.inc asc;";
         $result = mysqli_query($connect, $query);
     while($row = mysqli_fetch_array($result))
     {
      echo '
      <tr id="'.$row["inc"].'">
        <td scope="row">'.$row["inc"].'</td>
        <td>'.$row["id"].'</td>
        <td>'.$row["email"].'</td>
        <td>'.$row["date"].'</td>
      </tr>
      ';
     }
     ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="suggestions">
              <div class="d-flex m-0">
                <div class="container-fluid mdl-grid justify-content-center">
                  <div class="col-sm-11">
                    <h6><b>Feedback & Suggestions</b></h6>
                  </div>
                  <div class="table-responsive">
                    <br />
                    <table id="editable_table3" class="table table-hover table-striped">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>E-mail</th>
                          <th>Inquiry</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
         $query = "SELECT inc, inquiry, email
            FROM `inquiry` order by inc asc;";
         $result = mysqli_query($connect, $query);
     while($row = mysqli_fetch_array($result))
     {
      echo '
      <tr id="'.$row["inc"].'">
        <td scope="row">'.$row["inc"].'</td>
        <td>'.$row["email"].'</td>
        <td>'.$row["inquiry"].'</td>
      </tr>
      ';
     }
     ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="useraccounts">
              <div class="d-flex m-0">
                <div class="container-fluid mdl-grid justify-content-center">
                  <div class="col-sm-11">
                    <h6><b>User Accounts Details</b></h6>
                  </div>
                  <div class="col-sm-1">
                    <button class="btn border-dark mt-3" title="Make a new walk-in reservation" onclick="adduseraccount()" id="adduseraccountB"><img alt="" src="images/add-24px.svg" /><b> Add New</b></button>
                    <button class="btn border-dark mt-3" title="Cancel" onclick="canceluseraccount()" id="canceluseraccount" style="display:none;"><img alt="" src="images/close-24px.svg" /><b> Cancel</b></button>
                  </div>
                  <div class="panel panel-default" id="adduseraccount" style="display:none;">
                    <div class="container mb-5">
                      <div class="row justify-content-center">
                        <div class="booking-form">
                          <form id="adduseraccountF" action="php/adduseraccount.php" method="post">
                            <h2 class="mb-4 text-white">Register a new account</h2>
                            <span class="form-label">Full Name</span>
                            <input type="text" class="form-control mb-3" placeholder="Enter Full Name" name="name" required autofocus>
                            <span class="form-label">E-mail</span>
                            <input type="email" class="form-control mb-3" placeholder="Enter E-mail" name="email" required>
                            <span class="form-label">Password</span>
                            <input type="password" class="form-control mb-3" placeholder="Create a New Password" name="password" required>
                            <span class="form-label">Re-Password</span>
                            <input type="password" class="form-control mb-3" placeholder="Re-enter Password" name="password2" required>
                            <span class="form-label">Mobile</span>
                            <input type="number" class="form-control mb-3" placeholder="Mobile Number" name="mobile" required>
                            <span class="form-label">Admin?</span>
                            <select class="form-control mb-4" name="admin" required>
                              <option selected>no</option>
                              <option>yes</option>
                            </select>
                            <button class="submit-btn">Register</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <br />
                    <table id="editable_table4" class="table table-hover table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Full Name</th>
                          <th>E-mail</th>
                          <th>Password</th>
                          <th>Mobile</th>
                          <th>Is It an admin</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
         $query = "SELECT * FROM accounts order by id;";
         $result = mysqli_query($connect, $query);
     while($row = mysqli_fetch_array($result))
     {
      echo '
      <tr id="'.$row["id"].'">
        <td scope="row">'.$row["id"].'</td>
        <td>'.$row["name"].'</td>
        <td>'.$row["email"].'</td>
        <td>'.$row["password"].'</td>
        <td>'.$row["mobile"].'</td>
        <td>'.$row["admin"].'</td>
      </tr>
      ';
     }
     ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        
      <?php
//below forms (login and registration) are hidden by default, the only way to access them is through this id=login-button.
//hiding it should make them all unaccessable.(when a user logs in)
 if(!isset($_SESSION['loggedin'])){
     echo '
		<button id="login-button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--accent mdl-color-text--accent-contrast rounded" 
		onclick="openlogin()">Login / Register</button>';
		}
?>
      <div class="form-popup bg-dark mdl-color-text--accent-contrast rounded" id="loginform">
        <div class="container my-3">
          <form action="php/login_action.php" method="post">
            <h2 class="mb-2">Login</h2>
            <input type="email" class="form-control mb-3" id="email" placeholder="Enter E-mail" name="email" autofocus required>
            <input type="password" class="form-control mb-3" id="passsword" placeholder="Enter Password" name="password" required>
            <button type="submit" class="btn mdl-color--primary text-white btn-lg btn-block mb-2">Login</button>
            <div class="mdl-card__actions mb-3 ml-2"><a class="mdl-button" onClick="openregister()">or click here to register</a></div>
            <button type="button" class="btn mdl-color--accent text-white btn-lg btn-block" onclick="closelogin()">Close</button>
          </form>
        </div>
      </div>
      <div class="form-popup bg-dark mdl-color-text--accent-contrast rounded" id="registerform">
        <div class="container my-3">
          <form action="php/register_action.php" method="post">
            <h2 class="mb-4">Register</h2>
            <input type="text" class="form-control mb-3" id="name" placeholder="Enter Your Full Name" name="name" required autofocus>
            <input type="email" class="form-control mb-3" id="email" placeholder="Enter Your E-mail" name="email" required>
            <input type="password" class="form-control mb-3" id="passsword" placeholder="Create a New Password" name="password" required>
            <input type="password" class="form-control mb-3" id="passsword" placeholder="Re-enter Your Password" name="password2" required>
            <input type="number" class="form-control mb-3" id="mobile" placeholder="Enter Your Mobile Number" name="mobile" required>
            <button type="submit" class="btn mdl-color--primary text-white btn-lg btn-block mb-2">Register</button>
            <div class="mdl-card__actions mb-3 ml-2"><a class="mdl-button" onClick="openlogin()">or click here to login</a></div>
            <button type="button" class="btn mdl-color--accent text-white btn-lg btn-block" onclick="closeregister()">Close</button>
          </form>
        </div>
      </div>
    </main>
    <footer class="mdl-mega-footer" id="footer0">
      <div class="container">
        <h1 class="mdl-mega-footer--heading text-center">Gym Operation Hours</h1>
        <table class="table table-borderless text-white">
          <!--used "width" property do specify table header's width because col(from bootstrap) needs 'd-flex' in every single table row in order to work properly in Google Chrome.-->
          <tr>
            <th width="33.3333333333%" class=" mdl-color--primary">Day</th>
            <th width="33.3333333333%" class=" mdl-color--primary-dark">From</th>
            <th width="33.3333333333%" class="mdl-color--primary">To</th>
          </tr>
          <tr>
            <td class=" mdl-color--primary-dark">Saturday & Sunday</td>
            <td class=" mdl-color--primary">9:00</td>
            <td class="mdl-color--primary-dark">00:00</td>
          </tr>
          <tr>
            <td class=" mdl-color--primary">Monday - Friday</td>
            <td class=" mdl-color--primary-dark">10:00</td>
            <td class="mdl-color--primary">23:00</td>
          </tr>
        </table>
        <div class="mdl-mega-footer--bottom-section">
          <div class="mdl-logo">
            For more information E-mail us at:
          </div>
          <ul class="mdl-mega-footer--link-list">
            <li><a href="mailto:abdalghany@windowslive.com">abdalghany@windowslive.com</a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
  <!--display a success message after registering, error after failed login,
    passwords unmatch while registering, E-mail already registered....
    (Error handling, some success messages.)	
	Note: jQuery, bootstrap.min are used for this modal only, 
	while javascript.js was added to keep everything in home.php in order 
	(Home - Coaches- Equipment - Booking - ABOUT US require javascript to run 
	correctly as intended, one page website.) 
    //using multiple versions of bootstrap.js because each one of them contains different functions (edited functions).
	-->
<?php
if(isset($_SESSION['booking'])){
echo '<script>
              document.getElementById("booking").className += " is-active";
              document.getElementById("walk_in").className += " active";
      </script>';
	   unset($_SESSION['booking']);
}else if(isset($_SESSION['about_us'])){
echo '<script>
              document.getElementById("about").className += " is-active";
              document.getElementById("walk_in").className += " active";
      </script>';
	   unset($_SESSION['about_us']);
}else if(isset($_SESSION['manage_site_walk_in'])){
echo '<script>
document.getElementById("manage").className += " is-active";
document.getElementById("walk_in").className += " active";
      </script>';
	   unset($_SESSION['manage_site_walk_in']);
}else if(isset($_SESSION['manage_site_monthly'])){
echo '<script>
document.getElementById("manage").className += " is-active";
document.getElementById("monthly").className += " active";
      </script>';
	   unset($_SESSION['manage_site_monthly']);
}/**else if(isset($_SESSION['manage_site_suggestions'])){
echo '<script>
document.getElementById("manage").className += " is-active";
document.getElementById("suggestions").className += " active";
      </script>';
	   unset($_SESSION['manage_site_suggestions']);
}*/else if(isset($_SESSION['manage_site_user_accounts'])){
echo '<script>
document.getElementById("manage").className += " is-active";
document.getElementById("useraccounts").className += " active";
      </script>';
	   unset($_SESSION['manage_site_user_accounts']);
}else {
  echo '<script>
              document.getElementById("home").className += " is-active";
              document.getElementById("walk_in").className += " active";
      </script>';
    if(isset($_SESSION['home']))
	   unset($_SESSION['home']);  
};
      ?>
  <script src="js/jQuery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/javascript.js"></script>
  <script src="js/bootstrap.min.3.2.0.js"></script>
  <script>
    function disa() {
      document.getElementById("coachselection").required = false;
      document.getElementById("disa").style.display = "none";
    }

    function disa2() {
      document.getElementById("disa").style.display = "block";
      document.getElementById("coachselection").required = true;
    }

    function walk_in_id_changed() {
      var selectedId = document.getElementById("walk_in_id").options.selectedIndex;
      document.getElementById("walk_in_email").selectedIndex = selectedId;
      document.getElementById("walk_in_name").selectedIndex = selectedId;
    }

    function walk_in_name_changed() {
      var selectedName = document.getElementById("walk_in_name").options.selectedIndex;
      document.getElementById("walk_in_email").selectedIndex = selectedName;
      document.getElementById("walk_in_id").selectedIndex = selectedName;
    }

    function walk_in_email_changed() {
      var selectedEmail = document.getElementById("walk_in_email").options.selectedIndex;
      document.getElementById("walk_in_name").selectedIndex = selectedEmail;
      document.getElementById("walk_in_id").selectedIndex = selectedEmail;
    }

    function monthly_id_changed() {
      var selectedId = document.getElementById("monthly_id").options.selectedIndex;
      document.getElementById("monthly_email").selectedIndex = selectedId;
      document.getElementById("monthly_name").selectedIndex = selectedId;
    }

    function monthly_name_changed() {
      var selectedName = document.getElementById("monthly_name").options.selectedIndex;
      document.getElementById("monthly_email").selectedIndex = selectedName;
      document.getElementById("monthly_id").selectedIndex = selectedName;
    }

    function monthly_email_changed() {
      var selectedEmail = document.getElementById("monthly_email").options.selectedIndex;
      document.getElementById("monthly_name").selectedIndex = selectedEmail;
      document.getElementById("monthly_id").selectedIndex = selectedEmail;
    }
  </script>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#acs" style="display:none;" id="registerb">invisible button</button>
  <div class="modal fade" id="acs">
    <div class=" modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <h5>Account Created Successfully!</h5>
          <p>You may login now</p>
        </div>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#up" style="display:none;" id="loginfb">invisible button</button>
  <div class="modal fade" id="up">
    <div class=" modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <h5>Incorrect E-mail or Password!</h5>
        </div>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#bsu" style="display:none;" id="booksuccess">invisible button</button>
  <div class="modal fade" id="bsu">
    <div class=" modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <h5>Booking Successful!</h5>
          <p>We will be excpecting you &#128513;</p> <!-- &#128513 is a smiling emoji -->
        </div>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#isu" style="display:none;" id="inqusuccess">invisible button</button>
  <div class="modal fade" id="isu">
    <div class=" modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <h5>Feedback Submitted Successfully!</h5>
          <p>Thank you for your inquiry.</p>
        </div>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#lf" style="display:none;" id="unmpass">invisible button</button>
  <div class="modal fade" id="lf">
    <div class=" modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <h5>Your passwords don't match!</h5>
          <p>Please try again</p>
        </div>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#ee" style="display:none;" id="accexist">invisible button</button>
  <div class="modal fade" id="ee">
    <div class=" modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <h5>This E-mail already exists!</h5>
        </div>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  <!--set up messages to be displayed in case of a success/failed attempt at a login/register and some other forms of.-->
  <?php        
if(isset($_SESSION['emailExists'])){
echo '<script>
              $(document).ready(function(){ 
                  $("#accexist").click();
              });
      </script>';
	   unset($_SESSION['emailExists']);
};
if(isset($_SESSION['registermessage'])){
echo '<script>
              $(document).ready(function(){ 
                  $("#registerb").click();
              });
      </script>';
	   unset($_SESSION['registermessage']);
};
if(isset($_SESSION['unmatchedpasswords'])){
echo '<script>
              $(document).ready(function(){ 
                  $("#unmpass").click();
              });
      </script>';
	   unset($_SESSION['unmatchedpasswords']);
};
if(isset($_SESSION['loginfailed'])){
echo '<script>
              $(document).ready(function(){ 
                  $("#loginfb").click();
              });
      </script>';
	   unset($_SESSION['loginfailed']);
};
if(isset($_SESSION['bookingsuccess'])){
echo '<script>
              $(document).ready(function(){ 
                  $("#booksuccess").click();
              });
      </script>';
	   unset($_SESSION['bookingsuccess']);
};
if(isset($_SESSION['inquirysuccess'])){
echo '<script>
              $(document).ready(function(){ 
                  $("#inqusuccess").click();
              });
      </script>';
	   unset($_SESSION['inquirysuccess']);
};
?>
  <script>
    function addwalk_in() {
      document.getElementById("addwalk_in").style.display = "block";
      document.getElementById("addwalk_inB").style.display = "none";
      document.getElementById("cancelwalk_in").style.display = "block";
    }

    function cancelwalk_in() {
      document.getElementById("addwalk_inF").reset();
      document.getElementById("addwalk_in").style.display = "none";
      document.getElementById("addwalk_inB").style.display = "block";
      document.getElementById("cancelwalk_in").style.display = "none";
    }

    function addmonthly() {
      document.getElementById("addmonthly").style.display = "block";
      document.getElementById("addmonthlyB").style.display = "none";
      document.getElementById("cancelmonthly").style.display = "block";
    }

    function cancelmonthly() {
      document.getElementById("addmonthlyF").reset();
      document.getElementById("addmonthly").style.display = "none";
      document.getElementById("addmonthlyB").style.display = "block";
      document.getElementById("cancelmonthly").style.display = "none";
    }

    function adduseraccount() {
      document.getElementById("adduseraccount").style.display = "block";
      document.getElementById("adduseraccountB").style.display = "none";
      document.getElementById("canceluseraccount").style.display = "block";
    }

    function canceluseraccount() {
      document.getElementById("adduseraccountF").reset();
      document.getElementById("adduseraccount").style.display = "none";
      document.getElementById("adduseraccountB").style.display = "block";
      document.getElementById("canceluseraccount").style.display = "none";
    }
    /* https://www.w3schools.com/howto/howto_js_popup_form.asp */
    //modified the code to make login disappear when register is visible, and the other way around. 
    function openlogin() {
      document.getElementById("loginform").style.display = "block";
      document.getElementById("registerform").style.display = "none";
    }

    function closelogin() {
      document.getElementById("loginform").style.display = "none";
    }

    function openregister() {
      document.getElementById("loginform").style.display = "none";
      document.getElementById("registerform").style.display = "block";
    }

    function closeregister() {
      document.getElementById("registerform").style.display = "none";
    }

    function getIndex() {
      var actualSelectedIndex = document.getElementById("coachstatus").selectedIndex;
      if (actualSelectedIndex == 0) {
        document.getElementById("admindisa").style.display = "block";
        document.getElementById("admincoachselection").required = true;
      } else {
        document.getElementById("admincoachselection").required = false;
        document.getElementById("admindisa").style.display = "none";
      }
    }
  </script>
  <script src="js/ajax.min.2.2.0.js"></script>
  <script src="js/bootstrap3.3.6.js"></script>
  <script src="js/jquery.tabledit.min.js"></script>
  <script>
    //adds Delete and Edit actions to the table with the ID=editable_table...
    $(document).ready(function() {
      $('#editable_table').Tabledit({
        url: 'php/tabledit.php',
        columns: {
          identifier: [0, "inc"],
          editable: [
            [2, 'email'],
            [3, 'coachs'],
            [4, 'coach'],
            [5, 'day'],
            [6, 'fromT'],
            [7, 'toT']
          ]
        },
        restoreButton: false,
        onSuccess: function(data, textStatus, jqXHR) {
          if (data.action == 'delete') {
            $('#' + data.inc).remove();
          }
        },
        onFail: function(jqXHR, textStatus, errorThrown) {
          if (data.action == 'delete') {
          alert("tabledit.php Error: " + errorThrown+ "an error has happened when deleting from the database");
            }else {
                alert("tabledit.php Error: " + errorThrown + "an error has happened when attempting to edit the database");
            }
        }
      });
    });
  </script>
  <script>
    //adds Delete and Edit actions to the table with the ID=editable_table2...     
    $(document).ready(function() {
      $('#editable_table2').Tabledit({
        url: 'php/tabledit2.php',
        columns: {
          identifier: [0, "inc"],
          editable: [
            [3, 'date']
          ]
        },
        restoreButton: false,
        onSuccess: function(data, textStatus, jqXHR) {
          if (data.action == 'delete') {
            $('#' + data.inc).remove();
          }
        },
        onFail: function(jqXHR, textStatus, errorThrown) {
          if (data.action == 'delete') {
          alert("tabledit2.php Error: " + errorThrown+ "an error has happened when deleting from the database");
            }else {
                alert("tabledit2.php Error: " + errorThrown + "an error has happened when attempting to edit the database");
            }
        }
      });
    });
  </script>
  <script>
    //adds Delete action to the table with the ID=editable_table3... 
    //inserted an empty column ([3,null]) (non existant one) because editable property is Required as per the documentation of Tabledit 
    //Source: http://markcell.github.io/jquery-tabledit/#documentation
    $(document).ready(function() {
      $('#editable_table3').Tabledit({
        url: 'php/tabledit3.php',
        columns: {
          identifier: [0, "inc"],
          editable: [
            [3, 'null']
          ]
        },
        restoreButton: false,
        onSuccess: function(data, textStatus, jqXHR) {
          $('#' + data.inc).remove();
        },
        onFail: function(jqXHR, textStatus, errorThrown) {
          if (data.action == 'delete') {
          alert("tabledit3.php Error: " + errorThrown+ "an error has happened when deleting from the database");
            }else {
                alert("tabledit3.php Error: " + errorThrown + "an error has happened when attempting to edit the database");
            }
        },
        editButton: false
      });
    });
  </script>
  <script>
    //adds Delete and Edit actions to the table with the ID=editable_table4...     
    $(document).ready(function() {
      $('#editable_table4').Tabledit({
        url: 'php/tabledit4.php',
        columns: {
          identifier: [0, "id"],
          editable: [
            [1, 'name'],
            [2, 'email'],
            [3, 'password'],
            [4, 'mobile'],
            [5, 'admin']
          ]
        },
        restoreButton: false,
        onSuccess: function(data, textStatus, jqXHR) {
          if (data.action == 'delete') {
            $('#' + data.id).remove();
          }
        },
        onFail: function(jqXHR, textStatus, errorThrown) {
            if (data.action == 'delete') {
          alert("tabledit4.php Error: " + errorThrown+ "an error has happened when deleting from the database");
            }else {
                alert("tabledit4.php Error: " + errorThrown + "an error has happened when attempting to edit the database");
            }
        }
      });
    });
  </script>
</body>

</html>
<!--
Sourcse:
http://markcell.github.io/jquery-tabledit/
-->