<div class="m-portlet m-portlet--full-height  m-portlet--unair">
  <div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Edit Slider Images
				</h3>
			</div>
		</div>
  </div>

  <div class="m-portlet__body">
    <div class="images-gallery">

        <ul id="images">

          <?php
            include "../DB_Connect.php";
            $queryy = "SELECT * FROM slide";
            $sqll = $con->prepare($queryy);
            $sqll->execute();
            $result = $sqll->fetchAll();
            //$sqll = mysqli_query($con,$queryy);
            foreach($result as $row) {
          ?>
          <li data-id= <?php echo $row['id'] ?> >
            <a href="images/Slider/<?php echo $row['img']; ?>" class="thumbnail">
            <img class ="img-fluid" src="images/Slider/<?php echo $row['img']; ?>" class="img-fluid"/>
            </a>

            <span class="delete-image"><i class="flaticon-delete"></i></span>
          </li>
           <?php }
          ?>
        </ul>

    </div>

    <div id="fileuploader">Upload</div>
    <div id="upload" class="btn btn-primary">
      upload
    </div>
  </div>
</div>

<div class="m-portlet m-portlet--full-height  m-portlet--unair">
  <div class="m-portlet__head">
		<div class="m-portlet__head-caption">
			<div class="m-portlet__head-title">
				<h3 class="m-portlet__head-text">
					Edit Homepage Content
				</h3>
			</div>
		</div>
  </div>

  <div class="m-portlet__body">
    <div class="form-group m-form__group">

      <form action="home-page_data.php" id="welcome_message_form" method="post">

        <?php
            $queryy = "SELECT text FROM paragraphs  WHERE `paragraphs`.`id` = 1";
            $sqll = $con->prepare($queryy);
            $sqll->execute();
            $result = $sqll->fetch();
          ?>

        <label for="exampleTextarea">Edit Welcome Message</label>
        <textarea class="form-control m-input" name="welcome_message" id="exampleTextarea" rows="7">
              <?php echo $result['text']; ?>
        </textarea>

        <input type="hidden" name="field_type" value="update_welcome_message" />
        <button class="btn btn-primary submit-btn">Update</button>
      </form>
		</div>

    <hr />

    <div class="form-group m-form__group">
      <form action="" method="post" id="recent_vehicles_message_form" >
         <?php
            $queryy = "SELECT text FROM paragraphs  WHERE `paragraphs`.`id` = 2";
            $sqll = $con->prepare($queryy);
            $sqll->execute();
            $result = $sqll->fetch();
          ?>
        <label for="exampleTextarea">Edit Recent Vehicles Message</label>
        <textarea class="form-control m-input" name="recent_vehicles_message" id="exampleTextarea" rows="7">
             <?php echo $result['text']; ?>
        </textarea>

        <input type="hidden" name="field_type" value="update_recent_vehicles_message" />
        <button class="btn btn-primary submit-btn">Update</button>

      </form>

    </div>

    <hr />

    <div class="form-group m-form__group">

      <form action="home-page_data.php" id="about_us_message_form" method="post">
          <?php
            $queryy = "SELECT text FROM paragraphs  WHERE `paragraphs`.`id` = 3";
            $sqll = $con->prepare($queryy);
            $sqll->execute();
            $result = $sqll->fetch();
          ?>
        <label for="exampleTextarea">Edit About Us Message</label>
        <textarea class="form-control m-input" name="about_us_message" id="exampleTextarea" rows="7">
           <?php echo $result['text']; ?>
        </textarea>

        <input type="hidden" name="field_type" value="update_about_us_message" />
        <button class="btn btn-primary submit-btn">Update</button>
      </form>
		</div>

    <hr />

    <h3>Edit Statistics</h3>
    <form action="" method="post" id="statistics_form" >
      <div class="row">
          <div class="col-sm-6 col-md-3">
            <div class="form-group m-form__group">

              <?php
                $queryy = "SELECT * FROM hp_statistics  WHERE `hp_statistics`.`id` = 0";
                $sqll = $con->prepare($queryy);
                $sqll->execute();
                $result = $sqll->fetch();
                $cars_sold = $result['cars'];
                $amount = $result['amount'];
                $satisfaction = $result['satisfaction'];
                $oil = $result['changes'];
              ?>
              <label for="Cars_Sold">Cars Sold</label>
  						<input type="number" class="form-control m-input m-input--air" name="cars_sold" id="Cars_Sold" value=<?php echo $cars_sold?> >
            </div>
          </div>

          <div class="col-sm-6 col-md-3">
            <div class="form-group m-form__group">
              <label for="Amount_Sold">Amount Sold</label>
  						<input type="number" class="form-control m-input m-input--air" name="amount_sold" id="Amount_Sold" value=<?php echo $amount?>>
            </div>
          </div>

          <div class="col-sm-6 col-md-3">
            <div class="form-group m-form__group">
              <label for="Customer_Satisfaction">Customer Satisfaction</label>
  						<input type="number" max="100" class="form-control m-input m-input--air" name="customer_satisfaction" id="Customer_Satisfaction" value=<?php echo $satisfaction?>>
            </div>
          </div>

          <div class="col-sm-6 col-md-3">
            <div class="form-group m-form__group">
              <label for="Oil_Changes">Oil Changes</label>
  						<input type="number" class="form-control m-input m-input--air" name="oil_changes" id="Oil_Changes" value= <?php echo $oil?>>
            </div>
          </div>

          <div class="col-sm-6 col-md-3">
            <input type="hidden" name="field_type" value="update_statistics" />
            <button class="btn btn-primary submit-btn">Update</button>
          </div>


      </div>

    </form>

    <hr />

    <h3>Website Info</h3>

    <form action="" method="post" id="info_form" >
      <?php
        $queryy = "SELECT * FROM `webside_info`  WHERE `webside_info`.`id` = 1";
        $sqll = $con->prepare($queryy);
        $sqll->execute();
        $result = $sqll->fetch();
        $email = $result['email'];
        $phone = $result['phone'];
        $address = $result['address'];
        $map_loc = $result['map_loc'];
      ?>
      <div class="row">
          <div class="col-sm-6 col-md-3">
            <div class="form-group m-form__group">
              <label for="email">Email Address</label>
              <input type="email" class="form-control m-input m-input--air" name="email" id="email" value=<?php echo $email?>>
            </div>
          </div>

          <div class="col-sm-6 col-md-3">
            <div class="form-group m-form__group">
              <label for="phone">Phone Number</label>
              <input type="phone" class="form-control m-input m-input--air" name="phone" id="phone" value=<?php echo $phone?>>
            </div>
          </div>

          <div class="col-sm-6 col-md-3">
            <div class="form-group m-form__group">
              <label for="address">Adrress</label>
              <input type="text" max="100" class="form-control m-input m-input--air" name="address" id="address" value=<?php echo $address?>>
            </div>
          </div>

          <div class="col-sm-6 col-md-3">
            <div class="form-group m-form__group">
              <label for="map_loc">Map Location</label>
              <input type="text" class="form-control m-input m-input--air" name="map_loc" id="map_loc" value=<?php echo $map_loc?> value=>
            </div>
          </div>

          <div class="col-sm-6 col-md-3">
            <input type="hidden" name="field_type" value="update_info" />
            <button class="btn btn-primary submit-btn">Update</button>
          </div>


      </div>

    </form>


  </div>

</div>
