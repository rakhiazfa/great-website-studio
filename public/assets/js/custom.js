/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

const pageLoader = document.querySelector(".page-loader");

$(document).ready(function () {
    /**
     * Preload
     *
     */

    setTimeout(function () {
        pageLoader.remove();
    }, 500);

    $(".custom-file-input").on("change", function (e) {
        const file = this.files[0];
        const fileName = file.name;

        $(this).next(".custom-file-label").html(fileName);
    });

    /**
     * Add Product Page
     */

    $("#upload-image-button").on("click", function () {
        //

        $("#image-field").click();
    });

    $("#image-field").on("change", function (e) {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function (event) {
                $("#preview-image").attr("src", event.target.result);
            };

            reader.readAsDataURL(file);
        }
    });
});
