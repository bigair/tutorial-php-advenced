<?php

include 'Auth.php';
include 'Group.php';
include 'User.php';

$userGroup = new Group('Backend Users');
$adminGroup = new Group('Admin Users');
$managerGroup = new Group('Managers');

$user1 = new User('jaceju');
$user2 = new User('johnwu');
$user3 = new User('justinlin');

$adminGroup->add($user1);
$adminGroup->add($user2);

$managerGroup->add($user3);
$userGroup->add($adminGroup);
$userGroup->add($managerGroup);

$userGroup->display();