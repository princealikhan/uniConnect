  
	
    <div class="container">
	 <!--Header -->
	 
	 <div class="row">
        <div class="col-xs-6">
    <img src="images/icons/png/logo.png"alt="logo">
		</div>
		 

      <div class="col-xs-6" align="right">
        <div class="row">
          <div class="col-xs-9">
            <?php @session_start(); echo $_SESSION['Name'];?>
          <div class="row">
          <div class="col-xs-12">
            <a href="logout.php">Logout!</a>
          </div>
        </div>
          </div>

          <div class="col-xs-2" align="right">
          <?php echo $user_pic;?>

          </div>
</div>
		  </div>
     
		  </div>
		
	   <!-- Navigation Bar for Landing Page -->
    <div class="row">
        <div class="col-ls-12">
<nav class="navbar navbar-inverse navbar-embossed" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
      <span class="sr-only">Toggle navigation</span>
    </button>
    <a class="navbar-brand" href="#">UniConnect</a>
  </div>
  <div class="collapse navbar-collapse" id="navbar-collapse-01">
    <ul class="nav navbar-nav">           
      <?php $id = $_SESSION['Reg_No'];?>
      <li class=""><a href="home.php?Reg_No=<?php echo $id?>">Home</a></li>
      <li><a href="edit.php">Profile</a></li>
      <li><a href="friend.php">Friend</a></li>
    </ul>      
          
    <form class="navbar-form navbar-left" role="search" id="form3" name="form3" method="post" action="search.php">
      <div class="form-group">
        <div class="input-group">
          <input class="form-control" name="fname" id="fname" type="search" placeholder="Search">
          <span class="input-group-btn">
            <button type="submit" name="button3" type="submit" id="button3" class="btn"><span class="fui-search"></span></button>
          </span>            
        </div>
      </div>   
                <input type="hidden" name="listByq" value="by_firstname" />
            
    </form>	
  
  </div><!-- /.navbar-collapse -->
</nav>
    </div>
	<!-- /navbar -->
	
	
	</div>
