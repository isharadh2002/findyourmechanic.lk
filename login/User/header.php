<?php
require_once("../../shared/connect.php");
//
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Log In|User</title>
  <style>
    body {
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
      background-color: #0295f1bd;
    }

    .remeberContainer{
      display:flex;
      align-items: center;
      justify-content: space-between;
    }

    .remeberContainer input[type="checkbox"]{
      margin: 0px;
    }

    .remeberContainer label{
      min-width: 100px;
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
      justify-content: center;
      align-items: center;
      display: flex;
      float: inline-end;
      margin-left: auto;
    }

    .formElements {
      width: 30%;
      height: auto;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      box-shadow: 2vh;
      border-style: outset;
      border-radius: 36px;
      background-color: #fff;
    }

    .formElements h1 {

      color: #0295f1bd;

    }

    form {
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
      padding: 10px;
      font-size: 16px;
      width: 300px;
      border-radius: 10px;
    }

    .submitButton {
      background-color: #0295f1bd;

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
      display: none;


    }

    .submitButton:hover {
      background-color: #0295f1e6;
    }
  </style>

</head>

<body>

  <ul class="navigation">

    <li><a class="active" href="#login.php">User Login</a></li>
    <li><a href="../Mechanic/login.php">Mechanic Login</a></li>

  </ul>