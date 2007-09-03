/**
 * Update "Port" textbox at login page.
 */
function updateLoginPort() {
  var form = document.getElementById("nocc_webmail_login");
  if (form.servtype.options[form.servtype.selectedIndex].value == 'imap') {
    form.port.value = 143;
  }
  else if (form.servtype.options[form.servtype.selectedIndex].value == 'notls') {
    form.port.value = 143;
  }
  else if (form.servtype.options[form.servtype.selectedIndex].value == 'ssl') {
    form.port.value = 993;
  }
  else if (form.servtype.options[form.servtype.selectedIndex].value == 'ssl/novalidate-cert') {
    form.port.value = 993;
  }
  else if (form.servtype.options[form.servtype.selectedIndex].value == 'pop3') {
    form.port.value = 110;
  }
  else if (form.servtype.options[form.servtype.selectedIndex].value == 'pop3/notls') {
    form.port.value = 110;
  }
  else if (form.servtype.options[form.servtype.selectedIndex].value == 'pop3/ssl') {
    form.port.value = 995;
  }
  else if (form.servtype.options[form.servtype.selectedIndex].value == 'pop3/ssl/novalidate-cert') {
    form.port.value = 995;
  }
}

/**
 * Update login page.
 */
function updateLoginPage() {
  var form = document.getElementById("nocc_webmail_login");
  if (form.user.value == "" && form.passwd.value == "") {
    if (form.theme && form.lang) {
      var lang_page = "index.php?theme=" + form.theme[form.theme.selectedIndex].value + "&lang=" + form.lang[form.lang.selectedIndex].value;
      self.location = lang_page;
    }
    if (!form.theme && form.lang) {
      var lang_page = "index.php?lang=" + form.lang[form.lang.selectedIndex].value;
      self.location = lang_page;
    }
    if (form.theme && !form.lang) {
      var lang_page = "index.php?theme=" + form.theme[form.theme.selectedIndex].value;
      self.location = lang_page;
    }
    if (!form.theme && !form.lang) {
      var lang_page = "index.php";
      self.location = lang_page;
    }
  }
}

/**
 * Invert checked messages.
 */
function InvertCheckedMsgs() {
  var form = document.getElementById('delete_form');
  for (var i = 0; i < form.elements.length; i++) {
    if (form.elements[i].name.substr( 0, 4 ) == 'msg-') {
      form.elements[i].checked = !(form.elements[i].checked);
    }
  }
}