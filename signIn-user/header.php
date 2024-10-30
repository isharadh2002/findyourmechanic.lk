<?php
require_once("../shared/connect.php");

//
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>sign In|User</title>
  <style>
    body {
      background-color: bisque;
      margin: 1vh;
      opacity: 1;
      max-width: 100%;
      min-width: 300px;
    }

    ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      overflow: hidden;
      background-color: #f3f3f3;
      display: flex;
      border-radius: 5px;
      width: 100%;
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
      font-size: 18px;
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
        width: 100%;
      }
    }

    .container {
      width: 90%;
      margin-top: 6vh;
      display: flex;
      justify-content: center;
      align-items: center;
      margin-left: auto;
      margin-right: auto;
    }

    .formElements {
      background-color: aliceblue;
      width: 100%;
      max-width: 600px;
      padding: 40px 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      border-radius: 20px;
      border: 1px solid #ccc;
    }

    form {
      width: 100%;
      display: flex;
      flex-direction: column;
    }

    input {
      width: 100%;
      padding: 12px;
      font-size: 16px;
      border: none;
      border-bottom: 1px solid #333;
      margin-bottom: 20px;
      background-color: transparent;
      outline: none;
    }

    input[type='submit'] {
      background-color: #04aa6d;
      color: white;
      padding: 16px;
      font-size: 16px;
      text-align: center;
      cursor: pointer;
      border-radius: 10px;
      border: none;
      transition: background-color 0.3s ease;
    }

    input[type='submit']:hover {
      background-color: #037a56;
    }

    button {
      font-size: 16px;
      width: 300px;
      border-radius: 10px;
    }

    .center-message {
      text-align: center;
      font-size: 20px;
      background-color: white;
      color: green;
      padding: 20px;
      border-radius: 10px;
      opacity: 0;
      transition: opacity 0.3s ease;
    }

    .center-message.visible {
      opacity: 1;
    }
  </style>

</head>

<body>

  <ul class="navigation">

    <li><a class="active" href="#signup-User.php">User Registration</a></li>
    <li><a href="../SIgnIn-mechanic/SignIn-mec.php">Mechanic Registration</a></li>

  </ul>