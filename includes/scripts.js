
//remarks the selected article with bold font and red color
$(function() {
    $('#articles li').click(function() {
        $('#articles li').removeClass('selected-article');
        $(this).addClass('selected-article');

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