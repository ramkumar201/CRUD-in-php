var citesBystate ={
    Kerala: ["Thiruvananthapuram","Kozhikode","Kochi","Kollam"],
    TamilNadu: ["Chennai","Coimbatore","Madurai"]
}

function makecities(value){
    if(value.length == 0) document.getElementById("city").innerHTML = "<option></option>";
    else{
        var cityOption = "";
        for (cityId in citesBystate[value])
        {
            cityOption+= "<option>"+ citesBystate[value][cityId] +"</option>";
        }
        document.getElementById("city").innerHTML = cityOption;
    }
}

function resetcites(){
    document.getElementById("state").selectedIndex = 0;
    document.getElementById("city").selectedIndex = 0;
}