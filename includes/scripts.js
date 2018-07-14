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
        $('#nav-list p').removeAttr('id','p-hover');
        $(this).addClass('selected-nav');
        $(this).children().first().attr('id','p-hover');

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

/*SMOOTH ANIMATE - only for wide screen*/
$(function(){
    // Add smooth scrolling to all links
    $("a").on('click', function(event) {
        if ((window.screen.availWidth >=900)) {
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function(){

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });        }

        } // End if
    });
});


/*MODAL ARTICLES*/
var pickedID = null;
$('#articles').on("click", "li", function() {
    pickedID = '0' + this.id;

    modal.style.display = "block";
    span.style.display = "block";

    var content = document.getElementById(pickedID);
    content.classList.add("modal-content");

});

// Get the modal
var modal = document.getElementById('myModal');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
    span.style.display = "none";

    $('aside article').removeClass('modal-content');

}

/* END OF MODAL */


//Extract data from JSON file
var sHTML = "";
function fetchJson(fileName){
    $.getJSON(fileName,function(data){
        $.each(data, function(index,value) {
            sHTML += "<article class=" + '"entrepreneurs"' + ">";
            sHTML += "<h5>" + value.name;
            sHTML += "<span> || </span>";
            sHTML += "<span>" + value.job + "</span></h5>";
            sHTML += "<p>" + value.desc[0] + "</p>";
            if(value.desc.length > 1) {
                sHTML += "<br><p>" + value.desc[1] + "</p>";
            }
            sHTML += "</article>";
        });

        $('#entrep-mobile').append(sHTML);
        $('#entrep-area').append(sHTML);
    });
}

/*
$('.save').on("click", function() {
    var article = $(this).closest('article');
    var id = article["0"].id;
    var field = article["0"].children[2].childNodes["0"].data;
    var job = article["0"].children[4].childNodes["0"].data;
    var description = article["0"].children[7].childNodes["0"].data;
    var req = article["0"].children[10].childNodes["0"].data;
    var lig = $.ajax({
        type: "POST",
        url: "try.php",
        data: {
                id: id,
                field: field,
                job: job,
                description: description,
                req: req
        },
    });
    $.post("try.php", {
        id: id,
        field: field,
        job: job,
        description: description,
        req: req
    });

});*/
