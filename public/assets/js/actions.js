function showModal(modal_id) {
    $('#' + modal_id).modal('show');
}

function showPopup(type, message) {
    $('body')
        .toast({
            class: type,
            showIcon: false,
            message: message
        });
}
$(document).ready(function() {
    $('.ui.accordion').accordion();
    $('.hwid-popup').popup();
});

function editKey(key_id){
    $.ajax({
        url: '/ajax/get_key_info',
        method: 'GET',
        data: {
            'id': key_id
        },
        success: function (data){
            if(data.status !== 'OK'){
                showPopup('error', data.error);
                return;
            }
            let form = $('#edit-key-form');
            form.find('input[name=product-key]').val(data.data.product_key);
            form.find('input[name=key-expire]').val(new Date(data.data.expire_in).toJSON().slice(0,16));
            form.find('input[name=id]').val(data.data.id);
            if(data.data.hwid === null){
                $('#reset-hwid-button').attr('disabled', 'disabled');
            }
            else{
                let resetButton = $('#reset-hwid-button');
                resetButton.removeAttr('disabled');
                resetButton.on("click", function (){
                    resetHWID(data.data.id);
                });
            }
            showModal('edit-key-modal');
        }
    });
}

function deleteKey(key_id){
    if(!confirm('Are you sure?'))
        return;

    $.ajax({
        url: '/ajax/delete_key',
        method: 'POST',
        data: {
            'id': key_id
        },
        success: function (data){
            if(data.status !== 'OK'){
                showPopup('error', data.error);
                return;
            }

            $('#key-' + key_id).remove();
        }

    });
}

function resetHWID(key_id){
    $.ajax({
        url: '/ajax/reset_hwid',
        method: 'POST',
        data: {
            'id': key_id
        },
        success: function (data){
            if(data.status !== 'OK'){
                showPopup('error', data.error);
                return;
            }

            let resetButton = $('#reset-hwid-button');
            resetButton.attr('disabled', 'disabled');
            resetButton.on("click", function (){});

            showPopup('success', 'HWID reset');
        }

    });
}

function enableDisableCheat(){
    $.ajax({
        url: '/ajax/enable_disable_cheat',
        method: 'POST',
        success: function (data){
            let warningMessage = $('#cheat-disabled-message');
            let enableDisableButton = $('#enable-disable-cheat-button');
            if(data.data === false){
                showPopup('success', 'Cheat enabled');
                warningMessage.addClass('hidden');
                enableDisableButton.removeClass('positive');
                enableDisableButton.addClass('negative');
                enableDisableButton.text('Disable cheat');
            }
            else{
                showPopup('warning', 'Cheat disabled');
                warningMessage.removeClass('hidden');
                enableDisableButton.addClass('positive');
                enableDisableButton.removeClass('negative');
                enableDisableButton.text('Enable cheat');
            }
        }
    });
}
