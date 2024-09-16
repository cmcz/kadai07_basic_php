// Load List of all Topics
export function loadTopicList() {
    $("#topic-list").empty();
    $.ajax({
        url: "read_place_list.php", 
        method: "POST",
        success: function(response) {
            $("#topic-list").html(response);
        },
        error: function(xhr, status, error) {
            console.error("An error occurred:", error);
        }
    });
}

// Load Msg of Selected Topic
export function loadTopicMessages(topic) {
    $("#discussion").empty();
    $.ajax({
        url: "read_place_detail.php", 
        method: "POST",
        data: { topic: topic }, 
        success: function(response) {
            $("#discussion").html(response);
        },
        error: function(xhr, status, error) {
            console.error("An error occurred:", error);
        }
    });

}

// Load Msg of Selected Topic
export function loadReview(place) {
    $("#reviewArea").empty();
    $.ajax({
        url: "read_review.php", 
        method: "POST",
        data: { place: place }, 
        success: function(response) {
            $("#reviewArea").html(response);
        },
        error: function(xhr, status, error) {
            console.error("An error occurred:", error);
        }
    });
}