<?php
// ========= 関数ファイルの読込み ============
include 'function.php';
// ========= 関数ファイルの読込み ============

// ========== プレビューと本番の差異読込み ==============================
// コース
$elem = "course";
$result_from_courses = compare_test_to_performance($elem)[0];
$result_to_courses = compare_test_to_performance($elem)[1];
$consistency_courses = compare_test_to_performance($elem)[2];
$msg_courses = compare_test_to_performance($elem)[3];
$tmp_from_courses = compare_test_to_performance($elem)[4];
$tmp_to_courses = compare_test_to_performance($elem)[5];

// オプション
$elem = "option";
$result_from_options = compare_test_to_performance($elem)[0];
$result_to_options = compare_test_to_performance($elem)[1];
$consistency_options = compare_test_to_performance($elem)[2];
$msg_options = compare_test_to_performance($elem)[3];
$tmp_from_options = compare_test_to_performance($elem)[4];
$tmp_to_options = compare_test_to_performance($elem)[5];

// お知らせ記事
$elem = "announce";
$result_from_announces = compare_test_to_performance($elem)[0];
$result_to_announces = compare_test_to_performance($elem)[1];
$consistency_announces = compare_test_to_performance($elem)[2];
$msg_announces = compare_test_to_performance($elem)[3];
$tmp_from_announces = compare_test_to_performance($elem)[4];
$tmp_to_announces = compare_test_to_performance($elem)[5];

// ========== 反映ボタン動作設定 ========================================
if (isset($_POST['go_course'])) {
    $elem = "course";
    release_json($elem);
} else if (isset($_POST['go_option'])) {
    $elem = "option";
    release_json($elem);
    header('Location: index.php');
} else if (isset($_POST['go_announce'])) {
    $elem = "announce";
    release_json($elem);
}

?>

<!DOCTYPE html>
<html>

<?php include "./template/admin_head.php"; ?><!-- 管理用ヘッド -->

<body>
    <div class="container">
        <?php
        $title = "サイト管理";
        include "./template/admin_header.php"
        ?>

        <div class="mb-5 p-3 bg-light" style="height:calc(100vh - 300px);">
            <h3 class="mb-3">管理フィールド</h3>
            <div class="d-flex justify-content-around gap-3">
                <div class="col-3">
                    <a class="w-100 btn btn-outline-dark btn-lg" href="main_course.php">コース管理</a>
                    <div>
                        <p class="mt-3 text-center">テスト⇒本番の反映状況 ： <?php echo $msg_courses; ?></p>
                        <div class="d-flex justify-content-center gap-4 mb-3">
                            <?php if ($consistency_courses == True) { ?>
                                <button disabled class="go-btn btn btn-sm btn-primary" type="button">反映する</button>
                            <?php } else { ?>
                                <form class="go-btn" action="index.php" method="post">
                                    <button class="w-100 btn btn-sm btn-danger" type="submit" name="go_course" onclick="return confirm('反映しますか？')">反映する</button>
                                </form>
                            <?php } ?>
                            <!-- <form action="index.php" method="post">
                                <button class="go-btn btn btn-sm btn-danger" type="submit" name="return_course" onclick="return confirm('一つ戻しますか？')">一つ戻す</button>
                            </form> -->
                        </div>
                        <div class="text-center">
                            <h6>*****&emsp;未反映部分&emsp;*****</h6>
                        </div>
                        <?php if ($consistency_courses == False) { ?>
                            <div class="d-flex mb-5 overflow-auto" style="height:35vh">
                                <div class="col text-center pe-2 border-end">
                                    <h6>
                                        << テスト>>
                                    </h6>
                                    <?php
                                    foreach ($result_from_courses as $result_from_course) :
                                        echo $result_from_course['course'] . ' : ' . $result_from_course['stamp'] . '<br>';
                                    endforeach;
                                    ?>
                                </div>
                                <div class="col text-center">
                                    <h6>
                                        << 本番>>
                                    </h6>
                                    <?php
                                    foreach ($result_to_courses as $result_to_course) :
                                        echo ($result_to_course['course'] . ' : ');
                                        echo ($result_to_course['stamp'] . '<br>');
                                    endforeach;
                                    ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-3">
                    <a class="w-100 btn btn-outline-dark btn-lg" href="main_option.php">オプション管理</a>
                    <div>
                        <p class="mt-3 text-center">テスト⇒本番の反映状況 ： <?php echo $msg_options; ?></p>
                        <div class="d-flex justify-content-center gap-4 mb-3">
                            <?php if ($consistency_options == True) { ?>
                                <button disabled class="go-btn btn btn-sm btn-primary" type="button">反映する</button>
                            <?php } else { ?>
                                <form class="go-btn" action="index.php" method="post">
                                    <button class="w-100 btn btn-sm btn-danger" type="submit" name="go_option" onclick="return confirm('反映しますか？')">反映する</button>
                                </form>
                            <?php } ?>
                            <!-- <form action="index.php" method="post">
                                <button class="go-btn btn btn-sm btn-danger" type="submit" name="return_option" onclick="return confirm('一つ戻しますか？')">一つ戻す</button>
                            </form> -->
                        </div>
                        <div class="text-center">
                            <h6>*****&emsp;未反映部分&emsp;*****</h6>
                        </div>
                        <?php if ($consistency_options == false) { ?>
                        <div class="d-flex mb-5 overflow-auto" style="height:35vh">
                            <div class="col text-center pe-2 border-end">
                                <h6>
                                    << テスト>>
                                </h6>
                                <?php
                                foreach ($result_from_options as $result_from_option) :
                                    echo $result_from_option['option'] . ' : ' . $result_from_option['stamp'] . '<br>';
                                endforeach;
                                ?>
                            </div>
                            <div class="col text-center">
                                <h6>
                                    << 本番>>
                                </h6>
                                <?php
                                foreach ($result_to_options as $result_to_option) :
                                    echo ($result_to_option['option'] . ' : ');
                                    echo ($result_to_option['stamp'] . '<br>');
                                endforeach;
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <div class="col-6">
                    <a class="w-100 btn btn-outline-dark btn-lg" href="main_announce.php">お知らせ記事管理</a>
                    <div>
                        <p class="mt-3 text-center">テスト⇒本番の反映状況 ： <?php echo $msg_announces; ?></p>
                        <div class="d-flex justify-content-center gap-4 mb-3">
                            <?php if ($consistency_announces == True) { ?>
                                <button disabled class="go-btn btn btn-sm btn-primary" type="button">反映する</button>
                            <?php } else { ?>
                                <form class="g-btn" action="index.php" method="post">
                                    <button class="w-100 btn btn-sm btn-danger" type="submit" name="go_announce" onclick="return confirm('反映しますか？')">反映する</button>
                                </form>
                            <?php } ?>
                            <!-- <form action="index.php" method="post">
                                <button class="go-btn btn btn-sm btn-danger" type="submit" name="return_announce" onclick="return confirm('一つ戻しますか？')">一つ戻す</button>
                            </form> -->
                        </div>
                        <div class="text-center">
                            <h6>*****&emsp;未反映部分&emsp;*****</h6>
                        </div>
                        <?php if ($consistency_announces == false) { ?>
                            <div class="d-flex mb-5 overflow-auto" style="height:35vh">
                                <div class="col text-center pe-2 border-end">
                                    <h6>
                                        << テスト>>
                                    </h6>
                                    <?php
                                    foreach ($result_from_announces as $result_from_announce) :
                                        echo '<div class="d-flex"><p class="col-8 pe-3 text-start">' . $result_from_announce['title'] . '</p><p class="col-4">' . $result_from_announce['stamp'] . '</p></div>';
                                    endforeach;
                                    ?>
                                </div>
                                <div class="col text-center ps-2 pe-3">
                                    <h6>
                                        << 本番>>
                                    </h6>
                                    <?php
                                    foreach ($result_to_announces as $result_to_announce) :
                                        echo '<div class="d-flex"><p class="col-8 pe-3 text-start">' . $result_to_announce['title'] . '</p><p class="col-4">' . $result_to_announce['stamp'] . '</p></div>';
                                    endforeach;
                                    ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-3">
            <div class="d-flex gap-5">
                <div class="ms-auto col-3">
                    <div class="d-flex justify-content-around gap-3">
                        <div class="col">
                            <a class="w-100 btn btn-outline-dark btn-lg" href="../index.php">プレビュー</a>
                        </div>
                        <div class="col">
                            <a class="w-100 btn btn-outline-dark btn-lg" href="../../index.php" target="_BLANK">本番サイト</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</body>

</html>