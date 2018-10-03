function like(articleId,userId) {
    $.ajax({
        type: 'GET',
        url: '/news/article/like?articleId=' + articleId + '&userId=' + userId,
        complete: function () {
            location.reload();
        }
    });
}