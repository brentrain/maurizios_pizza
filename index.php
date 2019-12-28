<?php
  include('config/db_connect.php');

  //write query for all pizzas
  $sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

  //make query and get result
  $result = mysqli_query($conn, $sql);


  //fetch the resulting rows
  $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

  //free results
  mysqli_free_result($result);
  //close database
  mysqli_close($conn);

  //explode(',',$pizzas[0]['ingredients'])
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <?php include('templates/header.php'); ?>
      <h4 class = 'center grey-text'>Pizzas</h4>
      <div class="container">
        <div class="row">

          <?php foreach($pizzas as $pizza): ?>
              <div class="col s6 md3">
                <div class="card blue lighten 1 z-depth-0">
                  <img src="img/pizza.svg" class='pizza' alt="">
                    <div class="card-content center">
                      <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                      <ul>
                        <?php foreach(explode(',',$pizza['ingredients']) as $ing): ?>
                          <li><?php echo htmlspecialchars($ing); ?></li>
                        <?php endforeach; ?>
                      </ul>
                    </div>
                    <div class = 'card-action right-align'>
                      <a class = 'brand-text' href="details.php?id=<?php echo $pizza['id']?>">More Info</a>
                    </div>
                </div>
              </div>
          <?php endforeach; ?>

          <?php if(count($pizzas) >= 3): ?>
				        <p class = 'center'>There are more than 3 pizzas</p>
			    <?php else: ?>
				        <p>There are fewer than 3 pizzas</p>
			    <?php endif; ?>
        </div>
      </div>
   <?php include('templates/footer.php'); ?>

 </html>
