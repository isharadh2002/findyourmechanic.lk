

<?php



?>
ul.navigation {
list-style-type: none;
margin: 0;
padding: 0;
width: 19%;
background-color: #f1f1f1;
position: fixed;
height: 100%;
overflow: auto;
}

ul.navigation li a {
display: block;
color: #000;
padding: 8px 16px;
text-decoration: none;
}

ul.navigation li a.active {
background-color: white;
color: rgb(62, 60, 60);
}

ul.sidenav li a:hover:not(.active) {
background-color: #555;
color: white;
}

div.content {
margin-left: 25%;
padding: 1px 16px;
height: 1000px;
}

@media screen and (max-width: 900px) {
ul.navigation {
width: 100%;
height: auto;
position: relative;
}

ul.navigation li a {
float: left;
padding: 15px;
}

div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
ul.sidenav li a {
text-align: center;
float: none;
}
}
.container {
    width: 71%;
    margin: 5vh;
    justify-content: center;
    align-items: center;
    display: flex;
    float: inline-end;
    margin-left: auto;
}

.formElements {
width: 40%;
height: auto;
display: flex;
justify-content: center;
align-items: center;
flex-direction: column;
box-shadow: 2vh;
border-style: outset;
border-radius: 10px;
}
form {
display: flex;
flex-direction: column;
gap: 2vh;
margin: 5vh;
}
input {
width: 100%;
padding: 10px;
font-size: 16px;
border: none;
border-bottom: 2px solid #333;
outline: none;
background-color: transparent;
}


button {
padding: 10px;
font-size: 16px;
width: 300px;
}