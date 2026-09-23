function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}


function openWiki(evt, cityName) {
    var i, packagesbox, packageslinks;
    packagesbox = document.getElementsByClassName("packagesbox");
    for (i = 0; i < packagesbox.length; i++) {
        packagesbox[i].style.display = "none";
    }
    packageslinks = document.getElementsByClassName("packageslinks");
    for (i = 0; i < packageslinks.length; i++) {
        packageslinks[i].className = packageslinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();