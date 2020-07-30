"use strict";

const flashData = $('.flash-data').data('flashdata');
if (flashData) {
  swal({
    type: "success",
    title: "Successfully",
    text: flashData,
    buttonsStyling: !1,
    confirmButtonClass: "btn btn-success",
  });
}