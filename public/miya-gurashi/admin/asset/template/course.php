<?php
$JsonFile = './asset/post/json/' . $JsonName;
$courses = read_Json($JsonFile);
$ids = array_column($courses, 'course');
array_multisort($ids, SORT_ASC, $courses);
$course_imgFolder_path = './asset/post/images/course/';
?>
<div class="subtitle fadeInTrigger">
    <img src="./asset/images/course/eraberu-course.png" alt="選べる3コース">
</div>
<section class="content_wrap position-relative">
    <div id="course-vale" class="d-none"></div>
    <?php
    $courseCount = 0;
    $timeDelay = 0;
    foreach ($courses as $course) :
        if ($course['release'] == 'release') {
            $sectionWidth = "";
            $mode = $course['release'];
            include './asset/template/course_format.php';
            $courseCount += 1;
            $timeDelay += 3;
        }
    endforeach;
    ?>
</section>

<?php
// ======= コース数引き渡し（php->javascript） =======
$param = array("courseNum" => $courseCount);
$param_json = json_encode($param);
?>

<?php include "./asset/template/course_script.php" ?>