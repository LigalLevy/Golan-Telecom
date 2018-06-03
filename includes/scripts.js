
//remarks the selected article with bold font and red color
$(function() {
    $('#articles li').click(function() {
        $('#articles li').removeClass('selected-article');
        $(this).addClass('selected-article');

    });
});

$(function() {
    $('#nav-list li').click(function() {
        $('#nav-list li').removeClass('selected-nav');
        $(this).addClass('selected-nav');

    });
});

// Open article
function openArticle() {
    document.getElementById('myModal').style.display = "block";
}

// Close article
function closeArticle() {
    document.getElementById('myModal').style.display = "none";
}