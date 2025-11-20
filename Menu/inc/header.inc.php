<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/simple.css" />
    <link rel="stylesheet" href="./styles/custom.css" />
    <title>Culinary Cove &bull; <?php if(!empty($pageTitle)) echo $pageTitle; else echo 'Food'; ?></title>
</head>
<body>
  <header class="header-with-background" style="background-image: url(<?php if (!empty($headerImg)) { echo "$headerImg"; } else echo 'data/pexels-julia-volk-5273044.jpg'; ?>); ">
    <h1>Culinary Cove</h1>
    <p>Your sanctuary for exceptional flavors</p>
    <nav>
      <a <?php if ($pageKey === 'mission'): ?>class="active"<?php endif ?> href="our-mission.php">Our mission</a>
      <a <?php if ($pageKey === 'ingredients'): ?>class="active"<?php endif ?> href="ingredients.php">Ingredients</a>
      <a <?php if ($pageKey === 'menu'): ?>class="active"<?php endif ?> href="menu.php">Menu</a>
    </nav>
  </header>

  <main>
