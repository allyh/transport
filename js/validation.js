function CheckEmpty(field_id) {
    var MyValue = document.getElementById(field_id).value;
    if(MyValue == "" || MyValue == null) {
        alert("you can't leave this empty");
    }
}

