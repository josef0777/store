<?php
require_once "config.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="maps.css">

</head>
<body>
<?php
$showRecordPerPage = 10;
if(isset($_GET['page']) && !empty($_GET['page'])){
    $currentPage = $_GET['page'];
}else{
    $currentPage = 1;
}
$startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
$totalEmpSQL = "SELECT * FROM catalog";
$allEmpResult = mysqli_query($connect, $totalEmpSQL);
$totalEmployee = mysqli_num_rows($allEmpResult);
$lastPage = ceil($totalEmployee/$showRecordPerPage);
$firstPage = 1;
$nextPage = $currentPage + 1;
$previousPage = $currentPage - 1;
?>
<!--<h1>Witaj w sklepie internetowym</h1>-->
<div class="container">
    <form action="index.php" class="method" method="POST">
        <h1 class="page">Co potrzebujesz?</h1>
        <div class="select">
            <select name="select1" class="select_event">
                <option value="" selected="" disabled>Wybierz</option>
                <option value="value1" id="first">Malejąca cena</option>
                <option value="value2">Rosnąca cena</option>
                <option value="value3">Rosnąca ilość</option>
                <option value="value4">Malejąca ilość</option>
            </select>
        </div>
        <input type="submit" class="submit2" name="submit2" value="kliknij" id="primary">
    </form>
    <script>
        const selectElement = document.querySelector('.select_event');
        selectElement.addEventListener('change', (event) => {
            document.getElementById("primary").click();
        });
    </script>
    <form action="index.php" method="POST">
        <input type="text" class="event-loop" name="search" pattern="^[a-zA-Z]+$" placeholder="Czego szukasz?">
        <input type="submit" class="submit" name="submit_two" value="SZUKAJ">
    </form>
    <?php
    if(isset($_POST['submit_two'])) {
        $search = strip_tags(trim($_POST['search']));
        $items = mysqli_query($connect, "SELECT * FROM `catalog` WHERE title = '$search' LIMIT $startFrom, $showRecordPerPage");

        if (!empty(mysqli_fetch_array($items))){
            foreach ($items as $item) {
                ?>
                <div class="block">
                    <div class="price">
                        <?php
                        echo ' ';
                        print_r($item['title']);
                        ?>
                    </div>
                    <div class="title">
                        <?php
                        echo 'Price: ';
                        print_r('$' . $item['price']);
                        ?>
                    </div>
                    <div class="qnt">
                        <?php
                        echo 'Qnt: ';
                        print_r($item['qnt']);
                        ?>
                    </div>
                </div>
                <?php
            }
        }else {
            ?>
               <div class="test">
                   <?php
                   echo 'Nie znaleziono!'
                   ?>
               </div>
            <?php
            $items = mysqli_query($connect, "SELECT * FROM `catalog` LIMIT $startFrom, $showRecordPerPage");
            foreach ($items as $item) {
                ?>
                <div class="block">
                    <div class="price">
                        <?php
                        echo ' ';
                        print_r($item['title']);
                        ?>
                    </div>
                    <div class="title">
                        <?php
                        echo 'Price: ';
                        print_r('$' . $item['price']);
                        ?>
                    </div>
                    <div class="qnt">
                        <?php
                        echo 'Qnt: ';
                        print_r($item['qnt']);
                        ?>
                    </div>
                </div>
                <?php
            }
        }
    }elseif(isset($_POST['submit2'])) {
        $select1 = $_POST['select1'];
        switch ($select1) {
            case 'value1';
                $items = mysqli_query($connect, "SELECT * FROM `catalog` ORDER BY price DESC LIMIT $startFrom, $showRecordPerPage");
                foreach ($items as $item) {
                    ?>
                    <div class="block">
                        <div class="price">
                            <?php
                            echo ' ';
                            print_r($item['title']);
                            ?>
                        </div>
                        <div class="title">
                            <?php
                            echo 'Price: ';
                            print_r('$' . $item['price']);
                            ?>
                        </div>
                        <div class="qnt">
                            <?php
                            echo 'Qnt: ';
                            print_r($item['qnt']);
                            ?>
                        </div>
                    </div>
                    <?php
                }
                break;

            case 'value2';
                $items = mysqli_query($connect, "SELECT * FROM `catalog` ORDER BY price ASC LIMIT $startFrom, $showRecordPerPage");
                foreach ($items as $item) {
                    ?>
                    <div class="block">
                        <div class="title">
                            <?php
                            echo ' ';
                            print_r($item['title']);
                            ?>
                        </div>
                        <div class="price">
                            <?php
                            echo 'Price: ';
                            print_r('$' . $item['price']);
                            ?>
                        </div>
                        <div class="qnt">
                            <?php
                            echo 'Qnt: ';
                            print_r($item['qnt']);
                            ?>
                        </div>
                    </div>
                    <?php
                }
                break;

            case 'value3';
                $items = mysqli_query($connect, "SELECT * FROM `catalog` ORDER BY qnt ASC LIMIT $startFrom, $showRecordPerPage");
                foreach ($items as $item) {
                    ?>
                    <div class="block">
                        <div class="title">
                            <?php
                            echo ' ';
                            print_r($item['title']);
                            ?>
                        </div>
                        <div class="price">
                            <?php
                            echo 'Price: ';
                            print_r('$' . $item['price']);
                            ?>
                        </div>
                        <div class="qnt">
                            <?php
                            echo 'Qnt: ';
                            print_r($item['qnt']);
                            ?>
                        </div>
                    </div>
                    <?php
                }
                break;

            case 'value4';
                $items = mysqli_query($connect, "SELECT * FROM `catalog` ORDER BY qnt DESC LIMIT $startFrom, $showRecordPerPage");
                foreach ($items as $item) {
                    ?>
                    <div class="block">
                        <div class="title">
                            <?php
                            echo ' ';
                            print_r($item['title']);
                            ?>
                        </div>
                        <div class="price">
                            <?php
                            echo 'Price: ';
                            print_r('$' . $item['price']);
                            ?>
                        </div>
                        <div class="qnt">
                            <?php
                            echo 'Qnt: ';
                            print_r($item['qnt']);
                            ?>
                        </div>
                    </div>
                    <?php
                }
                break;
        }
    }else{
        $items = mysqli_query($connect, "SELECT * FROM `catalog` LIMIT $startFrom, $showRecordPerPage");
        foreach ($items as $item) {
            ?>
            <div class="block">
                <div class="title">
                    <?php
                    echo ' ';
                    print_r($item['title']);
                    ?>
                </div>
                <div class="price">
                    <?php
                    echo 'Price: ';
                    print_r('$' . $item['price']);
                    ?>
                </div>
                <div class="qnt">
                    <?php
                    echo 'Qnt: ';
                    print_r($item['qnt']);
                    ?>
                </div>
            </div>
            <?php
        }
    }
    ?>
    <nav aria-label="Page navigation">
        <ul class="pagination">
            <?php if($currentPage != $firstPage) { ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $firstPage ?>" tabindex="-1" aria-label="Previous">
                        <span aria-hidden="true">First</span>
                    </a>
                </li>
            <?php } ?>
            <?php if($currentPage >= 2) { ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo $previousPage ?>"><?php echo $previousPage ?></a></li>
            <?php } ?>
            <li class="page-item active"><a class="page-link" href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a></li>
            <?php if($currentPage != $lastPage) { ?>
                <li class="page-item"><a class="page-link" href="?page=<?php echo $nextPage ?>"><?php echo $nextPage ?></a></li>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $lastPage ?>" aria-label="Next">
                        <span aria-hidden="true">Last</span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </nav>
</div>
</body>
</html>




