function ge(el){
  return document.getElementById(el);
}

function ajax_changetab_and_send_data(php_file, el, send_data){
  var hr=new XMLHttpRequest();
  hr.open('POST', php_file, true);
  hr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

  hr.onreadystatechange=function(){
      if(hr.readyState==4 && hr.status==200){
          ge(el).innerHTML=hr.responseText;
      }
  };

  hr.send(send_data);
}


function quote(){

  ge('quote_data').innerHTML="<div class='alert-list'><div class='alert alert-info' role='alert'><i class='fa fa-info-circle'></i> Generating Your Quote . . .</div></div>";

  var f_name=ge('f_name').value;
  var mail=ge('mail').value;
  var address=ge('address').value;
  var detail=ge('detail').value;
  
  var send_data1=
      "&f_name="+f_name+
      "&mail="+mail+
      "&address="+address+
      "&detail="+detail;

    ajax_changetab_and_send_data('pages/quote.php', 'quote_data', send_data1);
      
}

function contact(){

  ge('contact_data').innerHTML="<div class='alert-list'><div class='alert alert-info' role='alert'><i class='fa fa-info-circle'></i> Sending Message . . .</div></div>";

  var full_name=ge('full_name').value;
  var email=ge('email').value;
  var message=ge('message').value;
  
  var send_data1=
      "&full_name="+full_name+
      "&email="+email+
      "&message="+message;

    ajax_changetab_and_send_data('pages/contact.php', 'contact_data', send_data1);
      
}