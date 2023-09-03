function callAjax(event){
    if (event.target.checked) {
        var form = "#add-category-form";
        console.log(this);
        var url = $(form).attr("data-action");
        data = new FormData();
        data.append("title", event.target.value);
        data.append("parent_id", event.target.name.split("_")[1]);
        data.append(
            "_token",
            $(form).find('input[name="_token"]')[0].value
        );
        $.ajax({
            url: url,
            method: "POST",
            data: data,
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                response.forEach(addCheckBoxes);
            },
            error: function (response) {},
        });
    }
}
function addCheckBoxes(item) {
    item.id;
    item.title;
    var box = '<div class="form-check">';
    box +=
        '<input class="form-check-input category" type="checkbox" onchange="callAjax(event)" value="' +
        item.title +
        '" id="category_' +
        item.id +
        '" name="category_' +
        item.id +
        '">';
    box +=
        '<label class="form-check-label" for="category_' +
        item.id +
        '">' +
        item.title +
        "</label></div>";
        $("#body-form").append(box);
}
