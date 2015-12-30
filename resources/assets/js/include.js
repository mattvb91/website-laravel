$('#flash-overlay-modal').modal();
$('div.alert').not('.alert-important').delay(3000).slideUp();

GitHubActivity.feed({
    username: "mattvb91",
    selector: "#feed",
    limit: 10
});