function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "nav navbar-nav toolbar pull-right topnav") {
        $("#myTopnav").addClass("responsive");
    } else {
        $("#myTopnav").removeClass("responsive")
    }
}