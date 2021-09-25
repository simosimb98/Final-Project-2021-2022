var brandYear = {
    "BMW": {
      "X1": ["2017", "2018", "2019", "2020"]
    },
    "Mercedes": {
        "E220": ["2017", "2018", "2019", "2020"]
    }
  }
  window.onload = function() {
    var brandSel = document.getElementById("carbrand");
    document.getElementById("carbrand").style.display = "block"; 
    var modelSel = document.getElementById("carmodel");
    document.getElementById("carmodel").style.display = "block"; 
    var yearSel = document.getElementById("year");
    document.getElementById("year").style.display = "block"; 
    for (var x in brandYear) {
      brandSel.options[brandSel.options.length] = new Option(x, x);
    }
    brandSel.onchange = function() {
      //empty Chapters- and Topics- dropdowns
      yearSel.length = 1;
      modelSel.length = 1;
      //display correct values
      for (var y in brandYear[this.value]) {
        modelSel.options[modelSel.options.length] = new Option(y, y);
      }
    }
    modelSel.onchange = function() {
      //empty Chapters dropdown
      yearSel.length = 1;
      //display correct values
      var z = brandYear[brandSel.value][this.value];
      for (var i = 0; i < z.length; i++) {
        yearSel.options[yearSel.options.length] = new Option(z[i], z[i]);
      }
    }
  }