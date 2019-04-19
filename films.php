<table style="width:100%">
              <thead>
                  <tr>
                      <th>
                          Title
                      </th>
                      <th>
                          Description
                      </th>
                      <th>
                          Category
                      </th>
                      <th>
                          Price
                      </th>
                      <th>
                          Length
                      </th>
                      <th>
                          Rating
                      </th>
                      <th>
                          Actors
                      </th>
                  </tr>
              </thead>
              <tbody>
                    <?php
                   require('db.php');
                    
                   //$sql = "SELECT * FROM employees";
                   $sql = "SELECT title, description, category, price, length, rating, actors from sakila.film_list order by FID";
                   $result = $conn->query($sql);
                   
                   if ($result->num_rows > 0) {
                       // output data of each row
                       while($row = $result->fetch_assoc()) {
                           echo "<tr><td>".$row["title"]."</td><td>".$row["description"]."</td><td>".$row["category"]."</td><td>".$row["price"]."</td><td>".$row["length"]."</td><td>".$row["rating"]."</td><td>".$row["actors"]."</td></tr>";
                       }
                   } else {
                       echo "0 results";
                   }
                   
                   $conn->close();
                    ?> 
              </tbody>
          </table>