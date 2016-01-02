$('#flash-overlay-modal').modal();
$('div.alert').not('.alert-important').delay(3000).slideUp();

if (typeof GitHubActivity !== 'undefined') {
    GitHubActivity.feed({
        username: "mattvb91",
        selector: "#feed",
        limit: 10
    });
}