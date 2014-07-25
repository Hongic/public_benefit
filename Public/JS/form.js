function  doSubmit() {
    if (document.form.name.value == "") {
        alert("用户不能为空！");
        form.name.focus();
        return false;
    }
    if (document.form.pwd.value == "") {
        alert("密码不能为空！");
        form.pwd.focus();
        return false;
    }
    if (document.form.newpwd.value == "") {
        alert("重输密码不能为空！");
        form.newpwd.focus();
        return false;
    }
    if (document.form.newpwd.value != document.form.pwd.value) {
        alert("两次密码不统一！");
        form.pwd.focus();
        return false;
    }
    if (document.form.title.value == "") {
        alert("标题不能为空！");
        form.title.focus();
        return false;
    }
    if (document.form.content.value == "") {
        alert("内容不能为空！");
        form.content.focus();
        return false;
    }
    if (document.form.site.value == "") {
        alert("网站不能为空！");
        form.site.focus();
        return false;
    }

    if (document.form.school.value == "") {
        alert("网站不能为空！");
        form.school.focus();
        return false;
    }
    if (document.form.company.value == "") {
        alert("公司名不能为空！");
        form.company.focus();
        return false;
    }
    if (document.form.address.value == "") {
        alert("公司名不能为空！");
        form.address.focus();
        return false;
    }

}