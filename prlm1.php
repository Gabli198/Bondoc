<?php
    //first variables created
    $name = "Coffee Hall";
    $city = "Angeles";
    $tagline = "Progress is a cup away";
    $opening_time = 8;
    $closing_time = 22;
    $open_hours = "From " . $opening_time . "AM to " . ($closing_time - 12) . "PM";

    //Arrays
    $product_names = ["Americano", "Spanish Latte", "Cafe Latte", "Hot Chocolate", "Seasalt Latte", "Cappuccino", "Mocha Javachip", "Barley Tea", "Green Tea"];

    $prices = [90, 135, 110, 150, 140, 140, 170, 120, 120];

    $product_notes = ["Hot or iced", "Sweet and creamy", "Brewed just right", "Warm and cozy", "Moderately salted", "Classic option", "Creamy and sweet", "Detox feeling", "Healthy living"];

    $stock = [15, 2, 0, 17, 6, 10, 10, 20, 30];

    $quantity = [2, 3, 1, 1, 2, 3, 2, 3, 1];

    //Subtotal
    $subtotal = 0;

    $count = 9;

    //calculation of the product
    for ($i = 0; $i < $count; $i++){
       if ($stock[$i] == 0) { //stock status: label and class depend on how many are left
            $labels[$i] = "Sold out";
            $classes[$i] = "out";
        } elseif ($stock[$i] <= 5) {
            $labels[$i] = "Low stock";
            $classes[$i] = "low";
        } else {
            $labels[$i] = "Available";
            $classes[$i] = "ok";
        }

        //can only be ordered if there is stock and quantity does not exceed stock
        if ($stock[$i] > 0 && $quantity[$i] <= $stock[$i]) {
              $order_qty[$i] = $quantity[$i];
          } else {
              $order_qty[$i] = 0;
          }

        //line adds up
        $line_total[$i] = $prices[$i] * $order_qty[$i];

        //adds each line to the subtotal
        $subtotal += $line_total[$i];
    }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $name; ?></title>
    <style>
      body {
        margin: 0;
        padding: 56px 20px 40px;
        color: #111111;
        font-family: "Segoe UI", Arial, sans-serif;
        background: linear-gradient(180deg, #ececec 0%, #fafafa 60%);
        min-height: 100vh;
      }

      .container{
        max-width: 880px;
        margin: 0 auto;
      }

      h1 {
        margin: 0 0 16px;
        padding-bottom: 12px;
        font-family: "Georgia", serif;
        font-size: 2.6rem;
        border-bottom: 4px solid #c8102e;
        display: inline-block;
      }

      .tagline {
        margin: 0 0 4px;
        font-size: 1.1rem;
        color: #6b6b6b;
      }

      .hours {
          margin: 0 0 32px;
          color: #6b6b6b;
      }

      .table-box {
          background: #ffffff;
          border: 1px solid #d9d9d9;
          border-radius: 8px;
          overflow-x: auto;
      }

      table {
          width: 100%;
          border-collapse: collapse;
          min-width: 640px;
      }

      th {
          background: #111111;
          color: #ffffff;
          text-align: left;
          padding: 14px 12px;
          font-weight: 600;
      }

      td {
          padding: 14px 12px;
          border-bottom: 1px solid #d9d9d9;
      }


      tbody tr:last-child td { border-bottom: 0; }
      tbody tr:nth-child(even) { background: #f5f5f5; }

      th:nth-child(3), td:nth-child(3),
      th:nth-child(4), td:nth-child(4),
      th:nth-child(6), td:nth-child(6),
      th:nth-child(7), td:nth-child(7) {
          text-align: right;
      }


      .ok  { color: #6b6b6b; }
      .low { color: #111111; font-weight: 700; }
      .out { color: #c8102e; font-weight: 700; }


      .subtotal {
          text-align: right;
          font-size: 1.2rem;
          font-weight: 700;
          margin-top: 20px;
      }

      footer {
          margin-top: 48px;
          padding-top: 16px;
          border-top: 1px solid #d9d9d9;
          color: #6b6b6b;
          font-size: 0.85rem;
      }

    </style>
</head>
<body>
  <div class="container">
    <h1><?php echo $name; ?></h1>
    <p class="tagline"><?php echo $tagline; ?></p>
    <p class="hours"><?php echo $open_hours; ?></p>

    <!-- Product Table Goes Here -->
    <div class="table-box">
      <table>
        <thead>
          <tr>
            <th>Item</th>
            <th>Note</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Status</th>
            <th>Ordered</th>
            <th>Total</th>
          </tr>
          
        </thead>
        <tbody>                  
          <?php for ($i = 0; $i < $count; $i++) { ?>
          <tr>
            <td><?php echo $product_names[$i]; ?></td>
            <td><?php echo $product_notes[$i]; ?></td>
            <td>&#8369;<?php echo $prices[$i]; ?></td>
            <td><?php echo $stock[$i]; ?></td>
            <td><?php echo $labels[$i]; ?></td>
            <td><?php echo $order_qty[$i]; ?></td>
            <td class="<?php echo $classes[$i]; ?>">&#8369;<?php echo $line_total[$i]; ?></td>
          </tr>
          <?php } ?>       
        </tbody>
      </table>
      <p class="subtotal">Subtotal: &#8369;<?php echo $subtotal; ?></p>
  </div>
    

    <!-- Footer Here -->
     <footer><?php echo $name . " " . $city . " City";?>
    </footer>
    </div>
    

</body>
</html>