      
      // JavaScript Document
      
      // Función para recoger los datos de PHP según el navegador, se usa siempre.
      function objetoAjax(){
      var xmlhttp=false;
      try {
      xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
      } catch (e) {
      
      try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (E) {
      xmlhttp = false;
      }
      }
      
      if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
      xmlhttp = new XMLHttpRequest();
      }
      return xmlhttp;
      }
      
      //Función para recoger los datos del formulario y enviarlos por post  
      function enviarDatosUsuario(){
      
      //div donde se mostrará lo resultados
      divResultado = document.getElementById('resultado');
      //recogemos los valores de los inputs
      nombres=document.nuevo_usuario.nombres.value;
      apellidos=document.nuevo_usuario.apellidos.value;
      dni=document.nuevo_usuario.dni.value;
      password=document.nuevo_usuario.password.value;
      area=document.nuevo_usuario.area.value;
      //instanciamos el objetoAjax
      ajax=objetoAjax();
      
      //uso del medotod POST
      //archivo que realizará la operacion
      //registro.php
      ajax.open("POST", "../registrar/usuario.php",true);
      //cuando el objeto XMLHttpRequest cambia de estado, la función se inicia
      ajax.onreadystatechange=function() {
      //la función responseText tiene todos los datos pedidos al servidor
      if (ajax.readyState==4) {
      //mostrar resultados en esta capa
      divResultado.innerHTML = ajax.responseText
      //llamar a funcion para limpiar los inputs
      LimpiarCampos();
      }
      }
      ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      //enviando los valores a registro.php para que inserte los datos
      ajax.send("nombres="+nombres+"&apellidos="+apellidos+"&dni="+dni+"&password="+password+"&area="+area)
      }
      
      //función para limpiar los campos
      function LimpiarCampos(){
      document.nuevo_usuario.nombres.value="";
      document.nuevo_usuario.apellidos.value="";
      document.nuevo_usuario.dni.value="";
      document.nuevo_usuario.password.value="";
      document.nuevo_usuario.area.value="";
      document.nuevo_usuario.nombres.focus();
      }