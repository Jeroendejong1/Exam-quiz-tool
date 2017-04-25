var counter = 2;
var limit = 10;

function addInput(divName){

	
    if (counter == limit)  {
        alert("You have reached the limit of adding " + counter + " inputs");
    }
    else {
        var newdiv = document.createElement('div');
        newdiv.innerHTML = "<label for='"+ name +(counter + 1)+"'>" + name  + (counter + 1) + ": </label><input type='text' class='form-control' id='"+ name +"" +(counter + 1)+"' name='myInputs[]'><br>";
        document.getElementById(divName).appendChild(newdiv);
        counter++;
    }
}