/****************************** VALIDATE FORMS ******************************/
function validateForms() {
  $("#subForm").validate();
}

/****************************** REPLACE ALIGN ******************************/
  function replaceAlign() {
    if (!document.getElementsByTagName('img')) {
      return false;
    }
    $('img[align="left"]').addClass('left').removeAttr('align');
    $('img[align="right"]').addClass('right').removeAttr('align');
    $('img[align="middle"]').addClass('middle').removeAttr('align');
  }

/****************************** REPLACE TARGET ATTRIBUTE WITH CLASS ******************************/
  function replaceTarget() {
    if (!document.getElementsByTagName('a')) {
      return false;
    }
    $('a[target]').addClass('newwindow').removeAttr('target');
  }

/****************************** WEB STANDARD POP UPS ******************************/
  function strictNewWindow() {
    if (!document.getElementsByTagName('a')) {
      return false;
    }
    $('a.newwindow').click(function() {
      window.open($(this).attr('href'));
      return false;
    });
  }

$(document).ready(function(){
  validateForms();
  replaceAlign();
  replaceTarget();
  strictNewWindow();
});