
/* add user listing */
function add_book() {
  $(document).on("click", "#btn-add-book", function (e) {
    e.preventDefault();

    var title = $("#title").val();
    var author = $("#author").val();
    var publisher = $("#publisher").val();
    var publicationplace = $("#publicationplace").val();

    if (title == "" && author == "" && publisher == "" &&  publicationplace == "" ) {
      Swal({
        title: "Warning!",
        text: "EMpty Fields",
        type: "Warning",
        confirmButtonText: "OK",
        closeOnConfirm: false,
      });
    } else {
      
        var fields = {
          add_book: "add_book",
          title: title,
          author: author,
          publisher: publisher,
          publicationplace: publicationplace,
        };

        jQuery.ajax({
          url: base_url + "controller/add-book", 
          type: "POST",
          dataType: "JSON",
          data: fields,
          success: function (data) {
            if (data.success == true) {
              Swal({
                title: "Success!",
                text: "Added User.",
                type: "success",
                confirmButtonText: "OK",
                closeOnConfirm: false,
              }).then((result) => {
                if (result.value) {
                  window.location.href = base_url + "home";
                }
              });
            } else {
              Swal({
                title: "Error!",
                text: "Email is Already Taken",
                type: "error",
                confirmButtonText: "OK",
                closeOnConfirm: false,
              }).then((result) => {
                if (result.value) {
                  // location.reload();
                }
              });
            }
          },
        });
    }
  });
}
/* end of add user listing */


jQuery(function () {
  add_book();
});
