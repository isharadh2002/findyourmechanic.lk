<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="3.1.css">
</head>
<body>
    <style>
        * {
    margin:0;
    padding:0;
    box-sizing: border-box;
    font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

}
.container {
    display:flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: #1f242d;
    padding: 25px;
    
}

.container form{
    width: 700px;
    padding: 40px;
    background: #fff;;
    border-radius: 10px;
}
form .row{
    display:flex;
    gap: 15px;
    flex-wrap: wrap;
}
.row .column{
    flex:1 1 250px;
     
}
.column .title{
    font-size: 20px;
    color: #333;
    text-transform: uppercase;
    margin-bottom: 5px;

}
.column .input-box{
    margin: 15px 0;
}
.input-box span{
    display:block;
    margin-bottom: 10px;
   
}
.input-box input{
    width: 100%;
    padding: 10px 15px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 15px;
}

.column .flex{
    display:flex;
    gap: 15px;
}
.flex .input-box{
    margin-top:5px;
}
.input-box img{
    height: 34px;
    margin-top: 5px;
    filter: drop-shadow(0 0 1px #000);
}
form .btn{
    width: 100%;
    padding: 12px;
    background: #8175d3;
    border: none;
    outline: none;
    border-radius: 6px;
    font-size: 17px;
    color: #fff;
    margin-top: 5px;
    cursor: pointer;
    transition: 5s;


}
form .btn:hover{
    background: #6a5acd;
}

    </style>
    <div class="container">
        <form action="">
            <div class="row">
                <div class="column">
                    <h3 class="title">Billing Address</h3>
                    <div class="input-box">
                        <span>Full Name:</span>
                        <input type="text" placeholder="gobijana">
                    </div>
                    <div class="input-box">
                        <span>Email:</span>
                        <input type="text" placeholder="Example@gmail.com">
                    </div>
                    <div class="input-box">
                        <span>Address:</span>
                        <input type="text" placeholder="Room-street-locality">
                    </div>
                    <div class="input-box">
                        <span>City:</span>
                        <input type="text" placeholder="colombo">
                    </div>
                    <div class="flex">
                        <div class="input-box">
                            <span>State:</span>
                            <input type="text" placeholder="srilanka">
                        </div>
                        <div class="input-box">
                            <span>Zip code:</span>
                            <input type="number" placeholder="123 456">
                        </div>
                    </div>
                    


                    <h3 class="title">Payment</h3>
                    <div class="input-box">
                        <span>Cards Accepted:</span>
                        <input type="text" placeholder="gobijana">
                    </div>
                    <div class="input-box">
                        <span>Name On Card:</span>
                        <input type="text" placeholder="Mr.Jacbo Aiden">
                    </div>
                    <div class="input-box">
                        <span>Credit Card Number:</span>
                        <input type="number" placeholder="1111 2222 3333 4444">
                    </div>
                    <div class="input-box">
                        <span>Exp. Month:</span>
                        <input type="text" placeholder="August">
                    </div>
                    <div class="flex">
                        <div class="input-box">
                            <span>Exp. Year:</span>
                            <input type="number" placeholder="2025">
                        </div>
                        <div class="input-box">
                            <span>CVV:</span>
                            <input type="number" placeholder="123">
                        </div>
                    </div>
                   
                </div>
            </div>
              <button type="submit" class="btn">Submit</button>
        </form>
    </div>
</body>
</html>