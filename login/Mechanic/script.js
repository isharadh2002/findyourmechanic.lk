function isEmpty(id) {
    var value = document.getElementById(id).value;
    if (!value) {
        
        return true;

    }
    return false;


}
function onClick(emailid,passwordid) {
    
    var ids = Array[emailid, passwordid];
    for (let i = 0; i < ids.lenth; i++){
        
        if (isEmpty(ids[i])) {
            
            document.getElementById('msg').style.display = flex;
            return;

        }



    }


}