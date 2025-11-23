<?php
if (!isset($_GET['name'])) {
    header('Location: ../index.php');
    die();
}else {
    require_once  '../layout/header.php';
    require_once  '../functions/getInfo.inc.php';
    $name = $_GET['name'];
    $offset = (int) (isset($_GET['offset'])) ? $_GET['offset'] : 0;
    $connection = connect();
    $data = getInfo($connection, $name);
}
?>
<main class="flex flex-col items-center justify-start mt-10">
    <div>
        <h1 class="text-7xl font-bold ">Names Starting With <?php echo e($name)?></h1>
    </div>
    <div class="mt-16 relative rounded h-[600px] overflow-y-auto">
        <table class=" relative overflow-hidden  w-[40vw] text-white text-xl font-semibold ">
            <thead class="w-2/3 bg-neutral-900 sticky top-0 text-green-500">
                <tr class="text-center text-2xl">
                    <th>Year</th>
                    <th class="capitalize">Total babies born </th>
                </tr>
            </thead>
            <tbody class="w-1/3 bg-neutral-600">
                <?php foreach ($data as $row): ?>
                <tr class="text-center border-b">
                        <td class="border-r bg-indigo-800 font-bold text-yellow-400"><?php echo $row['year']?></td>
                        <td><?php echo $row['count']?> Babies</td>
                </tr>
             <?php endforeach; ?>
            </tbody>

        </table>
    </div>

</main>