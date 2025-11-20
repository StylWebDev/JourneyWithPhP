<?php
include './inc/functions.inc.php';
include './inc/images.inc.php';
global $imageTitles
?>
<?php include './views/header.php'; ?>

<div style="display: grid; grid-template-columns: 1fr 2fr 1fr; column-gap: 20px; ">
    <?php foreach ($imageTitles as $imgSrc => $imgTitle): ?>
        <div style="width: 20vw; display: flex; flex-direction: column; border: 3px solid black; gap: 40px; border-radius: 10px; background: #404040">
            <div style="text-align: center">
                <a style="font-size: 1.2rem; font-weight: bold" href="<?php echo e("./image.php?".buildQuery($imgTitle)); ?>"><?php echo $imgTitle ?></a>
            </div>
            <div style="width: 100%">
                <img style="object-fit: cover" src="<?php echo rawurldecode('./images/'.$imgSrc); ?>" alt="<?php echo $imgTitle; ?>">
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php include './views/footer.php'; ?>
