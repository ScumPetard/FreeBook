/**
 * 邮箱输入事件
 * @param object
 */
function checkEmailUnique(object) {
    var email = $(object).val();
    var pattern = /^([\.a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/;
    if (!pattern.test(email)) {
        $('#EmailErrorMessage').text('请输入正确的邮箱地址').show();
        $('#submitForm').attr('disabled','disabled');
        return false;
    }
    else {
        $('#submitForm').removeAttr('disabled');
        $('#EmailErrorMessage').hide();
    }
    $.get(
        '/api/member/emailunique',
        {'email': email},
        function (data) {
            if (data['code']) {
                $('#submitForm').removeAttr('disabled');
                $('#EmailErrorMessage').hide();
                $('#EmailSuccessMessage').text(data['message']).show();
            }
            else {
                $('#submitForm').attr('disabled','disabled');
                $('#EmailSuccessMessage').hide();
                $('#EmailErrorMessage').text(data['message']).show();
            }
        }, 'json');

}

/**
 * 密码输入
 * @param object
 */
function checkPassword(object) {
    if ($(object).val().length <6) {
        $('#PasswordErrorMessage').text('密码最小为6位哟~').show();
        $('#submitForm').attr('disabled','disabled');
        return false;
    }
    else {
        $('#submitForm').removeAttr('disabled');
        $('#PasswordErrorMessage').hide();
    }
}

/**
 * 确认密码输入
 * @param object
 */
function checkConfirmPassword(object) {
    var password = $('#memberPassword').val();
    var confirmPassword = $('#memberConfirmPassword').val();
    if (password !== confirmPassword) {
        $('#submitForm').attr('disabled','disabled');
        $('#ConfirmPasswordErrorMessage').text('两次输入的密码不相同~').show();
    }
    else {
        $('#submitForm').removeAttr('disabled');
        $('#ConfirmPasswordErrorMessage').hide();
    }
}