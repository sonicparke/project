/*jslint plusplus: true, maxerr: 50, indent: 4 */

$(function () {
    "use strict";
    var i, id, ids;
    ids = ["vendors", "products", "shows"];
    for (i = 0; i < ids.length; i++) {
        id = ids[i];
        // alert("Adding getoptions.php?category=" + id + " to #" + id);
        $("#" + id).autocomplete({
            source: "getoptions.php?category=" + id
        });
    }
});
