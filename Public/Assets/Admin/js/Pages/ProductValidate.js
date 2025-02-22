
function skuValidate() {
    let isValid = true;

    $('.sku-item').each(function () {
        const skuIndex = $(this).data('sku-index');
        const sku = $(`input[name="sku[${skuIndex}][sku]"]`).val().trim();
        const price = $(`input[name="sku[${skuIndex}][price]"]`).val().trim();
        const quantity = $(`input[name="sku[${skuIndex}][quantity]"]`).val().trim();
        const images = $(`input[name="sku[${skuIndex}][images]"]`).val();

        if (!sku) {
            isValid = false;
            $(`input[name="sku[${skuIndex}][sku]"]`).siblings('.text-danger').show();
            $(`input[name="sku[${skuIndex}][sku]"]`).addClass('border-danger');
        } else {
            $(`input[name="sku[${skuIndex}][sku]"]`).siblings('.text-danger').hide();
            $(`input[name="sku[${skuIndex}][sku]"]`).removeClass('border-danger');

        }

        if (!price || parseFloat(price) <= 0) {
            isValid = false;
            $(`input[name="sku[${skuIndex}][price]"]`).siblings('.text-danger').show();
            $(`input[name="sku[${skuIndex}][price]"]`).addClass('border-danger');
        } else {
            $(`input[name="sku[${skuIndex}][price]"]`).siblings('.text-danger').hide();
            $(`input[name="sku[${skuIndex}][price]"]`).removeClass('border-danger');
        }

        if (!quantity || parseInt(quantity) <= 0) {
            isValid = false;
            $(`input[name="sku[${skuIndex}][quantity]"]`).siblings('.text-danger').show();
            $(`input[name="sku[${skuIndex}][quantity]"]`).addClass('border-danger');

        } else {
            $(`input[name="sku[${skuIndex}][quantity]"]`).siblings('.text-danger').hide();
            $(`input[name="sku[${skuIndex}][quantity]"]`).removeClass('border-danger');

        }

        if (!images) {
            isValid = false;
            $(`input[name="sku[${skuIndex}][images]"]`).siblings('.text-danger').show();
            $(`input[name="sku[${skuIndex}][images]"]`).addClass('border-danger');

        } else {
            $(`input[name="sku[${skuIndex}][images]"]`).siblings('.text-danger').hide();
            $(`input[name="sku[${skuIndex}][images]"]`).removeClass('border-danger');
        }

        if($(`select[name="sku[${skuIndex}][option][][option_id]"]`).length == 0) {
            $(`#propertyCheck-${skuIndex}`).show();
            isValid = false;
        } else {
            $(`#propertyCheck-${skuIndex}`).hide();
            $(`input[name="sku[${skuIndex}][option][][value_name]"]`).each(function() {
                if ($(this).val().trim() === '') {
                    isValid=false;
                    $(this).addClass('border-danger')
                    $(this).next('.text-danger').show();
                } else {
                    $(this).removeClass('border-danger')
                    $(this).next('.text-danger').hide(); 
                }
            })
            $(`select[name="sku[${skuIndex}][option][][option_id]"]`).each(function() {
                if ($(this).val().trim() === '') {
                    isValid=false;
                    $(this).addClass('border-danger')
                } else {
                    $(this).removeClass('border-danger')
                }
            })
        }
    });

    return isValid;
}
$('#productAddForm').on('submit', (e) => {
    if (!validationAddForm()) {
        e.preventDefault();
    }
    if($('.sku-item').length > 0) {
        if(skuValidate() === false) {
            e.preventDefault();
        }
    }
})




