import { loadTopicList, loadTopicMessages , loadReview} from './_interface.js';

$(document).ready(function () {

    /////////////////// Default Setting ///////////////////
    $("#topic-modal").hide();
    $("#reviewFormDiv").hide();
    $("body").removeClass("modal-active");
    loadTopicList();

    var currTopic = $('#currTopic').text(); 
    loadReview(currTopic);

    // Check for the query parameter
    const urlParams = new URLSearchParams(window.location.search);
    const loadReviewTopic = urlParams.get('loadReview');

    // If the parameter exists, call the function
    if (loadReviewTopic) {
        $("#currTopic").text(loadReviewTopic);
        loadTopicMessages(loadReviewTopic);
        loadReview(loadReviewTopic);
    }

    /////////////////// New Topic ///////////////////
    // Show pop-up for adding new topic
    $('#show-modal-btn').on('click', function () {
        $('#topic-modal').show();
    });

    // Close the pop-up without submitting
    $('#close-modal-btn').on('click', function () {
        $('#topic-modal').hide();
    });


    /////////////////// New Review ///////////////////
    // Show pop-up for adding new topic
    $('#show-modal-review-btn').on('click', function () {
        $('#reviewFormDiv').show();
    });

    // Close the pop-up without submitting
    $('#close-modal-review-btn').on('click', function () {
        $('#reviewFormDiv').hide();
    });
        
    $('#reviewForm').on('submit', function() {
        var currTopic = $('#currTopic').text(); 
        $('#hiddenPlaceValue').val(currTopic); 
        loadReview(currTopic);
    });

    /////////////////// Mark only Checked Icon ///////////////////
    $("input[name='user-icon']").change(function() {
        $("input[name='user-icon']").siblings("img").removeClass("border-blue-400");
        $("input[name='user-icon']:checked").siblings("img").addClass("border-blue-400");
        $("input[name='user-icon']:checked").siblings("img").addClass("border-4");
    });

    $("input[name='new-user-icon']").change(function() {
        $("input[name='new-user-icon']").siblings("img").removeClass("border-blue-400");
        $("input[name='new-user-icon']:checked").siblings("img").addClass("border-blue-400");
        $("input[name='new-user-icon']:checked").siblings("img").addClass("border-4");
    });
    
    /////////////////// Load Msg of Topic ///////////////////
    $('#topic-list').on('click', 'li', function () {
        const selectedTopic = $(this).attr("data-topic");
        if (selectedTopic) {
            $("#currTopic").text(selectedTopic);
            loadTopicMessages(selectedTopic);
            loadReview(selectedTopic);
        } else {
            console.error("selectedTopic is not defined. Please make sure it is set before this action.");
        }

    });
});
