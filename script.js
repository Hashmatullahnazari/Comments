function getComments() {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'get-comments.php');
  xhr.onload = function() {
    if (xhr.status === 200) {
      document.querySelector('#comments').innerHTML = xhr.responseText;
    } else {
      console.log('Error getting comments.');
    }
  };
  xhr.send();
}

document.addEventListener('DOMContentLoaded', function() {
  // Call getComments() when the page loads
  getComments();

  // handle form submission
  var form = document.querySelector('#comment-form');
  form.addEventListener('submit', function(e) {
    e.preventDefault();
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'submit-comment.php');
    xhr.onload = function() {
      if (xhr.status === 200) {
        form.reset();
        getComments();
      } else {
        console.log('Error submitting comment.');
      }
    };
    xhr.send(new FormData(form));
  });
});


$(document).on('click', '.reply-btn', function() {
  var commentId = $(this).data('comment-id');
  var formHtml = '<form class="reply-form" data-comment-id="' + commentId + '">';
  formHtml += '<div><label for="comment">Reply:</label><textarea id="comment" name="comment" required></textarea></div>';
  formHtml += '<button type="submit">Submit</button></form>';
  $(this).parent().append(formHtml);
});






//$(document).ready(function() {
//  // Call getComments() when the page loads
//  getComments();
//
//  // handle form submission
//  $("#comment-form").submit(function(e) {
//    e.preventDefault();
//    $.ajax({
//      url: "submit-comment.php",
//      type: "POST",
//      data: $(this).serialize(),
//      success: function() {
//        $("#comment-form")[0].reset();
//        getComments();
//      },
//      error: function() {
//        console.log("Error submitting comment.");
//      }
//    });
//  });
//});
//
//function getComments() {
//  $.ajax({
//    url: 'get-comments.php',
//    method: 'GET',
//    success: function(response) {
//      // Update the comments on the page with the latest data
//      $('#comments').html(response);
//    },
//    error: function() {
//      console.log("Error getting comments.");
//    }
//  });
//}
