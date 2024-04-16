<?php include 'header.php';?>
<?php
     $query="select * from restaurant";
     $res=mysqli_query($con,$query);
?>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="../assets/FrontAssets/images/slider-01.jpg" alt="First slide" height="600px">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="../assets/FrontAssets/images/slider-02.jpg" alt="Second slide" height="600px">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="../assets/FrontAssets/images/slider-03.jpg" alt="Third slide" height="600px">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <div class="container-fluid ">
      <h1 class="text-center pt-5">Restaurants</h1>
      <hr class="w-25 mx-auto">
      <div class="row">
      <?php
        while($row=mysqli_fetch_array($res))
        {
        ?>  
        <div class="col-lg-3 col-md-3  col-12 mt-4">
          <div class="card" style="cursor:pointer">
          <a href="details.php?id=<?php echo $row['Restaurant_id']?>">
          <?php if($row["Restaurant_image"]) {?><img class="card-img-top" style=" max-height: 200px; max-width: 400px;" src="http://localhost/mealbox/admin/images/<?php echo $row["Restaurant_image"];?>"/><?php }?>
            <!-- <img class="card-img-top" src="https://source.unsplash.com/400x200/?restaurants,foods" alt="Card image cap"> -->
            </a>
            <div class="card-body">
                <h4 style="color:#bd2130"><?php echo $row["Restaurant_name"];?></h4>
              <p class="card-text"><?php echo $row["Restaurant_address"];?></p>
            </div>
            
          </div>
        </div>
        <?php
            }
        ?>
      
        
      </div>
    </div>


   
    <footer class="footer bg-dark">
      <div class="container">
        <span class="text-muted">@copyright Meal Box 2021 </span>
      </div>
    </footer>  
   
  </body>
</html>

<?php include 'footer.php';?>

