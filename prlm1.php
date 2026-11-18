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

    $classes = ["out", "low", "ok"]; //stock level classes

    //Status label of items
    $labels = ["Sold out", "Low stock", "Available"];

    $level[0] = ($stock[0] > 0) + ($stock[0] > 5);
    $level[1] = ($stock[1] > 0) + ($stock[1] > 5);
    $level[2] = ($stock[2] > 0) + ($stock[2] > 5);
    $level[3] = ($stock[3] > 0) + ($stock[3] > 5);
    $level[4] = ($stock[4] > 0) + ($stock[4] > 5);
    $level[5] = ($stock[5] > 0) + ($stock[5] > 5);
    $level[6] = ($stock[6] > 0) + ($stock[6] > 5);
    $level[7] = ($stock[7] > 0) + ($stock[7] > 5);
    $level[8] = ($stock[8] > 0) + ($stock[8] > 5);

    $can_order[0] = ($stock[0] > 0) && ($quantity[0] <= $stock[0]);
    $can_order[1] = ($stock[1] > 0) && ($quantity[1] <= $stock[1]);
    $can_order[2] = ($stock[2] > 0) && ($quantity[2] <= $stock[2]);
    $can_order[3] = ($stock[3] > 0) && ($quantity[3] <= $stock[3]);
    $can_order[4] = ($stock[4] > 0) && ($quantity[4] <= $stock[4]);
    $can_order[5] = ($stock[5] > 0) && ($quantity[5] <= $stock[5]);
    $can_order[6] = ($stock[6] > 0) && ($quantity[6] <= $stock[6]);
    $can_order[7] = ($stock[7] > 0) && ($quantity[7] <= $stock[7]);
    $can_order[8] = ($stock[8] > 0) && ($quantity[8] <= $stock[8]);

    //Multiplying by 1 keeps the quantity, multiplying by 0 cancels it
    $order_qty[0] = $quantity[0] * $can_order[0];
    $order_qty[1] = $quantity[1] * $can_order[1];
    $order_qty[2] = $quantity[2] * $can_order[2];
    $order_qty[3] = $quantity[3] * $can_order[3];
    $order_qty[4] = $quantity[4] * $can_order[4];
    $order_qty[5] = $quantity[5] * $can_order[5];
    $order_qty[6] = $quantity[6] * $can_order[6];
    $order_qty[7] = $quantity[7] * $can_order[7];
    $order_qty[8] = $quantity[8] * $can_order[8];

    //Line total = price x quantity ordered
    $line_total[0] = $prices[0] * $order_qty[0];
    $line_total[1] = $prices[1] * $order_qty[1];
    $line_total[2] = $prices[2] * $order_qty[2];
    $line_total[3] = $prices[3] * $order_qty[3];
    $line_total[4] = $prices[4] * $order_qty[4];
    $line_total[5] = $prices[5] * $order_qty[5];
    $line_total[6] = $prices[6] * $order_qty[6];
    $line_total[7] = $prices[7] * $order_qty[7];
    $line_total[8] = $prices[8] * $order_qty[8];

    //Subtotal: += adds each line total to the running total
    $subtotal = 0;
    $subtotal += $line_total[0];
    $subtotal += $line_total[1];
    $subtotal += $line_total[2];
    $subtotal += $line_total[3];
    $subtotal += $line_total[4];
    $subtotal += $line_total[5];
    $subtotal += $line_total[6];
    $subtotal += $line_total[7];
    $subtotal += $line_total[8];
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $name; ?></title>
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
          <tr>
            <td><?php echo $product_names[0]; ?></td>
            <td><?php echo $product_notes[0]; ?></td>
            <td>&#8369;<?php echo $prices[0]; ?></td> 
            <td><?php echo $stock[0]; ?></td>
            <td><?php echo $labels[$level[0]]; ?></td> 
            <td><?php echo $order_qty[0]; ?></td>
            <td class="<?php echo $classes[$level[0]]; ?>">&#8369;<?php echo $line_total[0]; ?></td>
          </tr>
          <tr>
            <td><?php echo $product_names[1]; ?></td>
            <td><?php echo $product_notes[1]; ?></td>
            <td>&#8369;<?php echo $prices[1]; ?></td>
            <td><?php echo $stock[1]; ?></td>
            <td><?php echo $labels[$level[1]]; ?></td>
            <td><?php echo $order_qty[1]; ?></td>
            <td class="<?php echo $classes[$level[1]]; ?>">&#8369;<?php echo $line_total[1]; ?></td>
          </tr>
          <tr>
            <td><?php echo $product_names[2]; ?></td>
            <td><?php echo $product_notes[2]; ?></td>
            <td>&#8369;<?php echo $prices[2]; ?></td>
            <td><?php echo $stock[2]; ?></td>
            <td><?php echo $labels[$level[2]]; ?></td>
            <td><?php echo $order_qty[2]; ?></td>
            <td class="<?php echo $classes[$level[2]]; ?>">&#8369;<?php echo $line_total[2]; ?></td>
          </tr>
          <tr>
            <td><?php echo $product_names[3]; ?></td>
            <td><?php echo $product_notes[3]; ?></td>
            <td>&#8369;<?php echo $prices[3]; ?></td>
            <td><?php echo $stock[3]; ?></td>
            <td><?php echo $labels[$level[3]]; ?></td>
            <td><?php echo $order_qty[3]; ?></td>
            <td class="<?php echo $classes[$level[3]]; ?>">&#8369;<?php echo $line_total[3]; ?></td>
          </tr>
          <tr>
            <td><?php echo $product_names[4]; ?></td>
            <td><?php echo $product_notes[4]; ?></td>
            <td>&#8369;<?php echo $prices[4]; ?></td>
            <td><?php echo $stock[4]; ?></td>
            <td><?php echo $labels[$level[4]]; ?></td>
            <td><?php echo $order_qty[4]; ?></td>
            <td class="<?php echo $classes[$level[4]]; ?>">&#8369;<?php echo $line_total[4]; ?></td>
          </tr>
          <tr>
            <td><?php echo $product_names[5]; ?></td>
            <td><?php echo $product_notes[5]; ?></td>
            <td>&#8369;<?php echo $prices[5]; ?></td>
            <td><?php echo $stock[5]; ?></td>
            <td><?php echo $labels[$level[5]]; ?></td>
            <td><?php echo $order_qty[5]; ?></td>
            <td class="<?php echo $classes[$level[5]]; ?>">&#8369;<?php echo $line_total[5]; ?></td>
          </tr>
          <tr>
            <td><?php echo $product_names[6]; ?></td>
            <td><?php echo $product_notes[6]; ?></td>
            <td>&#8369;<?php echo $prices[6]; ?></td>
            <td><?php echo $stock[6]; ?></td>
            <td><?php echo $labels[$level[6]]; ?></td>
            <td><?php echo $order_qty[6]; ?></td>
            <td class="<?php echo $classes[$level[6]]; ?>">&#8369;<?php echo $line_total[6]; ?></td>
          </tr>
          <tr>
            <td><?php echo $product_names[7]; ?></td>
            <td><?php echo $product_notes[7]; ?></td>
            <td>&#8369;<?php echo $prices[7]; ?></td>
            <td><?php echo $stock[7]; ?></td>
            <td><?php echo $labels[$level[7]]; ?></td>
            <td><?php echo $order_qty[7]; ?></td>
            <td class="<?php echo $classes[$level[7]]; ?>">&#8369;<?php echo $line_total[7]; ?></td>
          </tr>
          <tr>
            <td><?php echo $product_names[8]; ?></td>
            <td><?php echo $product_notes[8]; ?></td>
            <td>&#8369;<?php echo $prices[8]; ?></td>
            <td><?php echo $stock[8]; ?></td>
            <td><?php echo $labels[$level[8]]; ?></td>
            <td><?php echo $order_qty[8]; ?></td>
            <td class="<?php echo $classes[$level[8]]; ?>">&#8369;<?php echo $line_total[8]; ?></td>
          </tr>
        </tbody>
      </table>
    </div>
    
<p>Subtotal: &#8369;<?php echo $subtotal; ?></p>
  </div>
    

    <!-- Footer Here -->
     <footer><?php echo $name . " " . $city . " City";?>
    </footer>
</body>
</html>