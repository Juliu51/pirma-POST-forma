<?php 
function start() {
    session_start();
if(!isset($_SESSION['dienynas'])){
    $_SESSION['dienynas'] = [];
    $_SESSION['id'] = 1;                    //!Suzinot koks ID kad butu galima istrinti////
}
}

function newObject () {
    $list = [];
    $list['id'] = $_SESSION['id'];
    $list['name'] = $_POST['name'];
    $list['surname'] = $_POST['surname'];
    $list['score'] = $_POST['score'];
    $_SESSION['dienynas'][] = $list;

    $_SESSION['id']++;                      // !PRIskirti vis po 1++ prie id naujam kintamajam///
    header("location:./");                  ///! perkraunant viskas ok neprideda is naujo nieko////
    die;
}

function update() {
    foreach ($_SESSION['dienynas'] as $key => $list) {
        if($list['id'] == $_POST['id']) {
            $_SESSION['dienynas'][$key]['name'] = $_POST['name'];
            $_SESSION['dienynas'][$key]['surname'] = $_POST['surname'];
            $_SESSION['dienynas'][$key]['score'] = $_POST['score'];
            header("location:./");                  
            die;
        }
    }
}

function delete() {
    foreach ($_SESSION['dienynas'] as $key => $list) {
        if($list['id'] == $_POST['id']) {
            unset($_SESSION['dienynas'][$key]);
            header("location:./");                  
            die;
        }
    }
}
function id() {
    $list = [];
    foreach($_SESSION['dienynas'] as $key => $entry) {
        if($entry['id'] == $_GET['id']) {
            $list = $entry;
            break;
        }
    }
    return $list;
}
?>