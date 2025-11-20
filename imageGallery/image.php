<?php
include './inc/functions.inc.php';
include './inc/images.inc.php';
global $imageDescriptions;
global $imageTitles;

if (!isset($_GET['image']))  header('Location:'.'gallery.php');
?>
<?php include './views/header.php'; ?>

<div>
    <?php if((!empty($_GET) && $_GET["image"] && in_array( $_GET["image"], $imageTitles))): ?>
        <?php $imgURL = array_keys($imageTitles)[array_search($_GET["image"], array_values($imageTitles))];?>
        <h2><?php echo $_GET["image"]; ?></h2>
            <div style="width: 60vw; display: flex; flex-direction: column; border: 3px solid black; gap: 40px; border-radius: 10px;">
                    <img style="object-fit: cover" src="<?php echo e('./images/'.$imgURL); ?>" alt="<?php echo $_GET["image"];?>">
            </div>
            <p>
                <?php echo $imageDescriptions[$imgURL] ?>
            </p>
    <?php endif; ?>
    <button type="button"><a style="color: #1a1a1a" href="./<?php echo rawurlencode('gallery.php') ?>">Back to Gallery</a></button>
</div>

<?php include './views/footer.php'; ?>
