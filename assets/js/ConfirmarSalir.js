cancel = false;
window.onbeforeunload = confirmExit;
  function confirmExit()
  {
      if(cancel==true)
      {return "Ha intentado salir de esta pagina. Si ha realizado algun cambio en los campos sin hacer clic en el boton Guardar, los cambios se perderan. Seguro que desea salir de esta pagina? ";}
    
  }