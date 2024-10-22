<?php
require_once("../shared/connect.php");



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>sign In|Mechanics</title>
  <style>
    body {
      background-color: bisque;
      min-width: 1165px;
      margin: 1vh;
    }

    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #f3f3f3;
      border-radius: 1px;
      display: flex;
    }

    .navigation li {
      flex: 1;
      min-height: 8vh;
    }

    li a {
      display: block;
      color: #666;
      text-align: center;
      padding: 20px 0;
      text-decoration: none;
    }

    li a:hover:not(.active) {
      background-color: #ddd;
    }

    li a.active {
      color: white;
      background-color: #04aa6d;
    }


    @media screen and (max-width: 400px) {
      ul.navigation {
        flex-direction: column;
      }

      ul.navigation li a {
        text-align: center;
        float: none;
        width: 100%;
      }
    }

    .container {

      width: 100%;
      margin-top: 6vh;
      margin-right: 14vh;
      justify-content: right;
      align-items: center;
      display: flex;
      float: inline-end;
      margin-left: auto;
    }

    .formElements {
      background-color: aliceblue;
      width: 30%;
      height: auto;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      box-shadow: 2vh;
      border-style: outset;
      border-radius: 36px;
    }

    form input[type='file'] {
      display: flex;
      flex-direction: column;
      flex-wrap: wrap;
    }

    input {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: none;
      border-bottom: 1px solid #333;
      outline: none;
      background-color: transparent;
    }

    button {

      font-size: 16px;
      width: 300px;
      border-radius: 10px;
    }

    input[type='submit'],
    [type='file'] {
      background-color: #04aa6d;
      align-items: center;

      color: white;
      padding: 16px 32px;
      text-decoration: none;
      margin: 4px 2px;
      cursor: pointer;
      border-radius: 10px;
      border: none;
    }

    input[type='file'] {

      background-color: #C4E1F6;
      align-items: center;

      color: white;
      padding: 16px 32px;
      text-decoration: none;
      margin: 4px 2px;
      cursor: pointer;
      border-radius: 10px;
      border: none;
    }

    #msg {

      text-align: center;
      color: blue;



    }
  </style>

</head>

<body>

  <ul class="navigation">
    <li><a href="../signIn-user/signup-User.php">User Registration</a></li>
    <li><a class="active" href="#SignIn-mec.php">Mechanic Registration</a></li>

  </ul>