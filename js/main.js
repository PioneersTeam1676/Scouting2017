console.log("Loaded main.js");

var pages = 
   [document.getElementById("div_loginPage"),
    document.getElementById("div_scoutingPage"),
    document.getElementById("div_usersPage"),
    document.getElementById("div_rawDataPage"),
    document.getElementById("div_teamsPage"),
    document.getElementById("div_contactPage")];

//Pre: The page number that the user is changing to
//Post: Changes to the page selected
function changePage(pageNum){
    console.log("Changing to page : " + pageNum);
    for (var i = 0; i < pages.length; i++){
        pages[i].style.visibility = "hidden";
        pages[i].style.display = "none";
    }
    
    pages[pageNum].style.visibility = "visible";
    pages[pageNum].style.display = "block";
}


// ON BOOT METHODS :

changePage(0);