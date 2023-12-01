function makeAjaxRequest(url, method, requestData, successCallback, errorCallback) {
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    requestData._token = csrfToken;
    $.ajax({
        type: method,
        url: url,
        data: requestData,
        success: function(response) {
            if (successCallback && typeof successCallback === 'function') {
                successCallback(response);
            }
        },
        error: function(error) {
            if (errorCallback && typeof errorCallback === 'function') {
                errorCallback(error);
            }
        }
    });
}

/* for toggle */
function toggleModal() {
    const modal = $('.modal-background');
    modal.css('display', 'block');
    modal.toggleClass('modal-visible');
    modal.toggleClass('expand');
    const share = $('.share-buttons');
    share.show();
}

function hideToggleModal() {
        const modal = $('.modal-background');
        modal.removeClass('modal-visible');
        const share = $('.share-buttons');
        share.hide();
}
