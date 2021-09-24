function random(){
    var a = document.getElementById('carbrand').value;
    if(a === 'Mercedes'){

        var array = ["E220", "A200"];

    }
    else if(a === 'BMW'){
        var array = ["X1", "X3"];

    }
    else{
        var array = [];

    }

    var string ='';
    for(i=0;i<array.length;i++){
        string = string+'<option value = "' +array[i]+ '">'+array[i]+'</option>';
    }
    string="<select name ='carmodel'>"+string+"</select>"; 
    document.getElementById('carmodel').innerHTML=string;
}