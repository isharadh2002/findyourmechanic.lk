function refresh(event) {
    

    event.preventDefault();
    location.reload();//



}
function submitValues(event) {
    if (document.getElementById("username").value==='') {
    
        if (document.getElementById("email").value==='') {
            if (document.getElementById("password").value==='') {


                if (document.getElementById("contactNumber").value==='') {


                    if (document.getElementById("address").value==='') {


                        document.getElementById("afterSigninMsg").value = "";
                        document.getElementById("afterSigninMsg").innerHTML = "Submit Sucessful";



                    }
                    else {
                        


                        window.alert("Addess is Required!");
                    }
                } else {
                    

                    window.alert("Contact Number is Required!");


                }

            } else {
                


                window.alert("Password is Required!");

            }
        
        } else {
            



            window.alert("Email is Required!");


        }



        window.alert("Name is Required!");



    }





}





