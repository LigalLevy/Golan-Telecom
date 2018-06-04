/*ARTICLES NAV SELECTED FUNCTION
* remarks the selected article with bold font and red color*/
$(function() {
    $('#articles li').click(function() {
        $('#articles li').removeClass('selected-article');
        $(this).addClass('selected-article');

    });
});

/*NAV SELECTED FUNCTION
* remarks the selected AREA with class .selected-nav */
$(function() {
    $('#nav-list li').click(function() {
        $('#nav-list li').removeClass('selected-nav');
        $(this).addClass('selected-nav');

    });
});


/*MOBILE VERSION nav and MAIN
* Opens a menu like an accordion */
var acc = document.getElementsByClassName("nav-list-mobile");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}

// Open article
function openArticle() {
    document.getElementById('myModal').style.display = "block";
}

// Close article
function closeArticle() {
    document.getElementById('myModal').style.display = "none";
}