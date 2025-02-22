
function getForm(formId) {
    let userInput = false;
    if (formId === 'brandEdit' && !$('input[name="image"]').val().trim()) {
        userInput = {
            name: $('input[name="name"]').val().trim(),
            description: $('textarea[name="description"]').val().trim(),
            status: $('select[name="status"]').val(),
        };
    } else {
        userInput = {
            name: $('input[name="name"]').val().trim(),
            image: $('input[name="image"]').val().trim(),
            description: $('textarea[name="description"]').val().trim(),
            status: $('select[name="status"]').val(),
        }
    }

    return userInput;
}

$(() => {
    $('#brandAdd, #brandEdit').on('submit', (e) => {
        let formId = e.target.id;
        let is_valid = true;
        let input = getForm(formId);

        Object.entries(input).forEach(([key, value]) => {
            if (!value) {
                $(`#${key}-validate`).show();
                is_valid = false;
            } else {
                $(`#${key}-validate`).hide();
            }
        })
        if (!is_valid) {
            e.preventDefault()
        }
    })
})


function deleteBrand(id) {
    if(confirm('Bạn chắc chứ?')) {
        window.location.href = `/admin/delete-brand/${id}`;
    }
}