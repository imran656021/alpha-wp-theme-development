<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>
        <?php
        $title = get_bloginfo("name");
        echo strtoupper($title);

        ?>
    </title>
    <?php wp_head() ?>
</head>