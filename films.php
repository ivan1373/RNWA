<table>
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
                   $sql = "SELECT title, description, category, price, length, rating, actors from sakila.film_list order by FID limit 10";
                   $result = $conn->query($sql);
                   
                   if ($result->num_rows > 0) {
                       // output data of each row
                       while($row = $result->fetch_assoc()) {
                           echo "<tr><td data-label=".'Title'.">".$row["title"]."</td><td data-label=".'Description'.">".$row["description"]."</td><td data-label=".'Category'.">".$row["category"]."</td><td data-label=".'Price'.">".$row["price"]."</td><td data-label=".'Length'.">".$row["length"]."</td><td data-label=".'Rating'.">".$row["rating"]."</td><td data-label=".'Actors'.">".$row["actors"]."</td></tr>";
                       }
                   } else {
                       echo "0 results";
                   }
                   
                   $conn->close();
                    ?> 
              </tbody>
          </table>