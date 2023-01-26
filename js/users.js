$(function () {
    get_users();

    $(".form-check-input").on("click", function () {
        get_users();
    });

});

function get_users() {

    let form = $("#multi-filters");

    $.ajax(
        {
            type: "POST",
            url: "filters.php",
            data: form.serialize(),
            success: function (data) {
                $("#filters-result").html("");


                $.each(JSON.parse(data), function (key, User) {
                    let row = "" +
                        "<tr>" +
                        "<td>" + key + "</td>" +
                        "<td>" + User.apellido + " " + User.nombre + "</td>" +
                        "<td>" + User.email + "</td>" +
                        "<td>" + User.status + "</td>" +
                        "<td><div class='text-center text-white'>" +
                        "<a href ='pdf.php?id=" + key + "' class='btn btn-danger'><i class='fas fa-file-pdf'></i> </a>" +
                        "<a href ='user.php?id=" + key + "' class='btn btn-primary bg-primary'><i class='fas fa-search'></i></a>" +
                        "<a href ='dataUpdate.php?id=" + key + "' class='btn btn-success bg-success text-white'><i class='fas fa-pencil-alt'></i></a>" +
                        "</td>" +
                        "</tr>";

                    $("#filters-result").append(row);


                });

            }
        }
    )
}